<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
$needsAuthentication = true; // Just a precaution
require 'header.php';

if (PERIOD==PERIOD_FINAL) exit("<h1>The Site is Closed</h1>");

// Manage access to the review cite
if (isset($_POST['reviewSite'])) {
  $mmbrs2remove = isset($_POST['mmbrs2remove'])? $_POST['mmbrs2remove']: NULL;
  if (is_array($mmbrs2remove)) {
    $stmt = $db->prepare("DELETE from {$SQLprefix}committee WHERE revId=?");
    foreach ($mmbrs2remove as $revId => $x) {
      if (is_chair($revId)) continue;    // Cannot remove the chair(s)
      $stmt->execute(array($revId));
    }
  }

  // Compare PC member details from the databse with the details from
  // the _POST array, and update the database whenever these differ
  $members = $_POST['members'];

  if (is_array($members)) { 

    $res = pdo_query("SELECT revId,revPwd,name,email,flags FROM {$SQLprefix}committee ORDER BY revId");
    while ($row = $res->fetch(PDO::FETCH_NUM)) {
      $revId = (int) $row[0];
      $m = $members[$revId]; // $m = array(name, email, reset-flag, isChair)
      if (isset($m)) {
	$nm = isset($m[0]) ? trim($m[0]) : NULL;
	$eml = isset($m[1]) ? strtolower(trim($m[1])) : NULL;
	$reset = isset($m[2]);
	$isChair = isset($m[3])? FLAG_IS_CHAIR: 0;
	$oldPw = $row[1];
	$oldNm = $row[2];
	if ($isChair) $flags = FLAG_IS_CHAIR | (int) $row[4];
	else          $flags = (~FLAG_IS_CHAIR) & (int) $row[4];
	$oldEml= strtolower($row[3]);
	if ($nm!=$oldNm || $eml!=$oldEml || $reset || $flags!=$row[4]) {
	  update_committee_member($nm, $eml, $revId,
				  $oldPw, $oldNm, $oldEml, $reset, $flags);
	}
      }
    }
  }
  $mmbrs2add = isset($_POST['mmbrs2add']) ?
                                  explode(';', $_POST['mmbrs2add']) : NULL;
  if (is_array($mmbrs2add)) foreach ($mmbrs2add as $m) {
    if ($m = parse_email($m))
      update_committee_member($m[0], $m[1]);
  }
} // if (isset($_POST['reviewSite']))

header("Location: index.php");
exit();

function update_committee_member($name, $email,
				 $revId=false, $revPwd=NULL,
				 $oldName=NULL, $oldEml=NULL,
				 $reset=false, $flags=0)
{
  global $SQLprefix;

  if (!empty($email))
    $email = strtolower(trim($email));

  if (!$revId) { // insert a new member
    if (empty($email)) return;  // member cannot have an empty email

    if (empty($name)) { // set to username from email address if missing
      $name = substr($email, 0, strpos($email, '@'));
      if (empty($name)) return; // email address without '@' ??
    }
    
    $pwd = sha1(uniqid(rand()).mt_rand());          // returns hex string
    $pwd = alphanum_encode(substr($pwd, 0, 15));   // "compress" a bit
    $pw = sha1(CONF_SALT. $email . $pwd);
    
    $qry = "INSERT INTO {$SQLprefix}committee SET name=?,email=?,revPwd=?,flags=?";
    pdo_query($qry, $array($name,$email,$pw,$flags),
	      "Cannot add PC member $name <$email>: ");
    email_password($email, $pwd);
    return;
  }

  // Modify an existing member: first get current details
  $prms = array();
  $updates = $comma = '';
  if (empty($revPwd)) $reset=true;                   // Set initial password
  if (isset($email) && $email!=$oldEml) $reset=true; // Change email address

  if ($reset) { // reset pwd
    $pwd = sha1(uniqid(rand()).mt_rand());       // returns hex string
    $pwd = alphanum_encode(substr($pwd, 0, 15)); // "compress" a bit
    $pw = sha1(CONF_SALT. $email . $pwd);
    $updates .= "revPwd=?";
    $prms[] = $pw;
    $comma = ",";
  }

  if (!empty($name) && $name!=$oldName) {
    $updates .= $comma . "name=?";
    $prms[] = $name;
    $comma = ",";
  }

  if (!empty($email) && $email!=$oldEml) {
    $updates .= $comma . "email=?";
    $prms[] = $email;
    $comma = ",";
  }
  $canDiscuss = ($flags & FLAG_IS_CHAIR)? 1: 0;  

  $qry = "UPDATE {$SQLprefix}committee SET $updates{$comma} flags=?, canDiscuss=$canDiscuss WHERE revId=?";
  $prms[] = $flags;
  $prms[] = $revId;
  pdo_query($qry, $prms, "Cannot update PC member $name <$email>: ");
  if ($reset) email_password($email, $pwd, $flags & FLAG_IS_CHAIR);
}

function email_password($emailTo, $pwd, $isChair=false)
{
  $shortName = CONF_SHORT;
  $confYear = CONF_YEAR;
  
  $prot = (defined('HTTPS_ON') || isset($_SERVER['HTTPS'])) ? 'https' : 'http';
  $baseURL = $prot.'://'.BASE_URL;
  
  if ($isChair) $cc = array(ADMIN_EMAIL);
  else          $cc = chair_emails();
  
  $sbjct = "New/reset password for submission and review site for $shortName $confYear";

  $msg =<<<EndMark
You now have access to the submission and review site for $shortName $confYear.
The review start page is

  {$baseURL}review/

EndMark;

  if ($isChair)
    $msg .= "\nThe start page for administration is\n\n  {$baseURL}chair/\n\n";

  $msg .= <<<EndMark

To login to the review site, use as username your email address
$emailTo, together with the password $pwd

EndMark;

  my_send_mail($emailTo, $sbjct, $msg, $cc, "password $pwd to $emailTo");
}
?>