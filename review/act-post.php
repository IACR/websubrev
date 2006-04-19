<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
  $needsAuthentication=true;
require 'header.php'; // defines $pcMember=array(id, name, email, discussFlag)
$revId = (int) $pcMember[0];
$revName = htmlspecialchars($pcMember[1]);
$revEmail= htmlspecialchars($pcMember[2]);
$disFlag = (int) $pcMember[3];
$threaded= (int) $pcMember[4];

// Check that this reviewer is allowed to discuss submissions
if ($disFlag != 1) exit("<h1>$revName cannot discuss submissions yet</h1>");
if (defined('CAMERA_PERIOD'))
   exit("<h1>Site closed: cannot post new comments</h1>");

if (isset($_POST['subId'])) { $subId = (int) trim($_POST['subId']); }
else exit("<h1>No Submission specified</h1>");

// Make sure that this submission exists and the reviewer does not have
// a conflict with it. 
$cnnct = db_connect();
$qry = "SELECT a.assign FROM submissions s 
      LEFT JOIN assignments a ON a.revId='$revId' AND a.subId='$subId'
      WHERE s.subId='$subId'";
$res = db_query($qry, $cnnct);
if (!($row = mysql_fetch_row($res)) || $row[0]==-1) {
  exit("<h1>Submission does not exist or reviewer has a conflict</h1>");
}

$qry = "INSERT INTO posts SET subId='$subId', revId='$revId',";

if (isset($_POST['parent']))
  $qry .= "parentId='". my_addslashes(trim($_POST['parent']), $cnnct). "',\n";

if (isset($_POST['subject']))
  $qry .= "  subject='".my_addslashes(trim($_POST['subject']), $cnnct)."',\n";

if (isset($_POST['comments']))
  $qry.= "  comments='".my_addslashes(trim($_POST['comments']), $cnnct)."',\n";

$qry .= "  whenEntered=NOW()";

if (!empty($_POST['subject']) || !empty($_POST['comments'])) {
  db_query($qry, $cnnct);

  // Touch the entry to update the 'lastModified' timestamp
  $qry = "UPDATE submissions SET lastModified=NOW() WHERE subId='$subId'";
  db_query($qry, $cnnct);
}

// if this was reply to a previous post, return to that post
if (!empty($_POST['parent']))
     $anchor = 'p'.trim($_POST['parent']);
else $anchor = "endDiscuss"; // return to the end of the page

header("Location: discuss.php?subId=$subId#".$anchor);
?>
