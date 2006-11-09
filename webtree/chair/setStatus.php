<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
 $needsAuthentication = true;
require 'header.php';
$subId=0;

$cnnct = db_connect();
foreach ($_POST as $key => $val) {
  if (strncmp($key, 'subStts', 7)!=0 || empty($val))
    continue;

  $subId = (int) substr($key, 7);
  if ($subId<=0) continue;

  $status = my_addslashes(trim($val), $cnnct);
  $qry = "UPDATE submissions SET status='$status', lastModified=NOW() WHERE subId={$subId} AND status!='$status'";
  db_query($qry, $cnnct);

  // insert an entry to the acceptedPapers table if needed
  if ($status='Accept') {
    $qry = "SELECT 1 from acceptedPapers where subId={$subId}";
    $res = db_query($qry, $cnnct);
    if (mysql_num_rows($res)<=0) {
      db_query("INSERT INTO acceptedPapers SET subId={$subId}", $cnnct);
    }
  }
}

if ($subId>0 && !isset($_POST['noAnchor']))
     $anchor="#stts{$subId}";
else $anchor="";
return_to_caller('index.php', '', $anchor);
?>