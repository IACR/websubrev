<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
$needsAuthentication = true; 
require 'header.php';

$cnnct = db_connect();

$qry = "SELECT version FROM paramsBckp WHERE version=".(PARAMS_VERSION-1);
$res = db_query($qry, $cnnct);
$canUndo = (mysql_num_rows($res)>0);

$qry = "SELECT version FROM paramsBckp WHERE version=".(PARAMS_VERSION+1);
$res = db_query($qry, $cnnct);
$canRedo = (mysql_num_rows($res)>0);

if (isset($_GET['undoLast']) && $canUndo) { // undo last change
  $version = PARAMS_VERSION-1;
  $qry = "REPLACE parameters SELECT * FROM paramsBckp WHERE version=$version";
  $res = db_query($qry, $cnnct);
  if (mysql_affected_rows()>0) { // success
    $qry = "REPLACE paramsBckp SELECT * FROM parameters WHERE version=".PARAMS_VERSION;
    mysql_query($qry, $cnnct);
    $qry = "DELETE FROM parameters WHERE version=".PARAMS_VERSION;
    db_query($qry, $cnnct);
  }
  header("Location: index.php");
  exit();
}

if (isset($_GET['redoLast']) && $canRedo) { // redo last change
  $version = PARAMS_VERSION+1;
  $qry = "REPLACE parameters SELECT * FROM paramsBckp WHERE version=$version";
  $res = db_query($qry, $cnnct);
  if (mysql_affected_rows()>0) { // success
    $qry = "REPLACE paramsBckp SELECT * FROM parameters WHERE version=".PARAMS_VERSION;
    mysql_query($qry, $cnnct);
    $qry = "DELETE FROM parameters WHERE version=".PARAMS_VERSION;
    db_query($qry, $cnnct);
  }
  header("Location: index.php");
  exit();
}

if (!$canUndo&& !$canRedo) exit("<h1>No Undo/Redo Information Available</h1>");

$links= show_chr_links(4);

if ($canUndo)
     $bkButton = '<input type=submit name=undoLast value="Undo Last Change">';
else $bkButton = '';

if ($canRedo)
     $fwButton = '<input type=submit name=redoLast value="Redo Last Change">';
else $fwButton = '';

print <<<EndMark
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style type="text/css">
h1 {text-align: center;}
h2 {text-align: center;}
</style>
<title>Undo/Redo Last Change</title>
</head>
<body>
$links
<hr/>
<h1>Undo/Redo Last Change</h1>
Use this form to Undo the last change that you did from the administration
page (or redo the last change that you un-did from this page). Note that
the only modifications that can be un-done from this page are moving between
different phases of the site. For example, if you closed the submissions
site and activated review, you can use this functionality to re-open the
submissions.
<br/><br/>
<b>Warning:</b> The undo functionality reverts all the system parameters to
their setting at the end of the last phase. (System parameters are all the
things that are not individual submissions, reviews, or discussions. For
example the email setting, the deadlines, etc.)
If you made any modifications to system parameters since the last phase, all
these modifications will be reverted when you use the undo functionality.
<br/><br/>
<form action="undoLast.php" method=get>
$bkButton
$fwButton
</form>
<hr/>
$links
</body>
</html>
EndMark;
?>
