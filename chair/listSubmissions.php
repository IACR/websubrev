<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
 $needsAuthentication = true; 
require 'header.php';
$cName = CONF_SHORT.' '.CONF_YEAR;
$links = show_chr_links();

$title = defined('CAMERA_PERIOD') ? 'Accepted Submissions' : 'Submission List';
print <<<EndMark
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<style type="text/css">
h1 {text-align: center;}
tr {vertical-align: top;}
div {width: 90%;}
.fixed { font: 14px monospace; }
div.indented {position: relative; left: 25px;}
</style>
<title>$cName $title</title>
</head>
<body>
$links
<hr />

EndMark;

// Prepare an array of submissions
$cnnct = db_connect();

$subOrder = isset($_GET['subOrder']) ? trim($_GET['subOrder']) : 'subId';
$subOrder = my_addslashes($subOrder, $cnnct);

$condition = defined('CAMERA_PERIOD') ? "status='Accept'"
                                      : "status!='Withdrawn'";

$qry = "SELECT subId, title, authors, affiliations, contact, abstract, 
     category, keyWords, comments2chair, format, subPwd, status
  FROM submissions
  WHERE {$condition}
  ORDER BY $subOrder";
$res = db_query($qry, $cnnct);
$subArray = array();
while ($row = mysql_fetch_assoc($res)) {
  $subArray[] = $row;
}

// in some cases, provide a count per category
$countByCat = ($subOrder=='status'
	       || $subOrder=='category' || $subOrder=='format');
if ($countByCat) {
  $qry = "SELECT $subOrder, COUNT(*) FROM submissions WHERE {$condition} GROUP BY $subOrder";
  $res = db_query($qry, $cnnct);
  $countArray = array();
  while ($row = mysql_fetch_row($res)) {
    $cat = $row[0];
    if (!isset($cat) || empty($cat)) $cat = "No $subOrder specified";
    $countArray[$cat] = $row[1];
  }
  print "<h1>$cName $title (ordered by $subOrder)</h1>\n";
}
else print "<h1>$cName $title</h1>\n";

$lastCat = 'zzz@zzz';
foreach($subArray as $sb) {
  $subId = (int) $sb['subId'];
  $title = htmlspecialchars($sb['title']);
  $authors = htmlspecialchars($sb['authors']);
  $affiliations = htmlspecialchars($sb['affiliations']);
  $contact = htmlspecialchars($sb['contact']);
  $abstract = htmlspecialchars($sb['abstract']);
  $category = htmlspecialchars($sb['category']);
  if (empty($category)) $category='*';
  $keyWords = htmlspecialchars($sb['keyWords']);
  if (empty($keyWords)) $keyWords='*';
  $comments = htmlspecialchars($sb['comments2chair']);
  $format = htmlspecialchars($sb['format']);
  $subPwd = htmlspecialchars($sb['subPwd']);
  $status = htmlspecialchars($sb['status']);

  if (defined('CAMERA_PERIOD')) 
       $downld = SUBMIT_DIR."/final/$subId.$format";
  else $downld = SUBMIT_DIR."/$subId.$format";

  $reviewTime = defined('REVIEW_PERIOD') ? REVIEW_PERIOD : false;
  if (!$reviewTime && file_exists($downld))
       $downld = '<a href="../'.$downld.'" title="download"><img src="../review/download.gif" alt="download" border=0></a>';
  else $downld = '';

  if ($countByCat) {
    $cat = empty($sb[$subOrder]) ? "No $subOrder specified" : $sb[$subOrder];
    if ($lastCat != $cat) {
      $lastCat = $cat;
      print "<h2 style=\"color: green;\">$cat: ".$countArray[$cat]." submissions</h2>\n";
    }
  }
  print "<table><tbody><tr><td>$downld</td>
  <td style=\"width: 20px;\"><big><strong>{$subId}.</strong></big></td>
  <td><big><strong>$title</strong></big>\n";

  if ($reviewTime) { // let the chair revise/withdraw submisstins
    print <<<EndMark
  <td style="width: 50px;"><span style="background: lightgrey;">
    [<a href="../revise.php?subId={$subId}&amp;subPwd={$subPwd}">Revise</a>]
  </span></td>
  <td style="width: 50px;"><span style="background: lightgrey;">
    [<a href="../withdraw.php?subId={$subId}&amp;subPwd={$subPwd}">Withdraw</a>]
  </span></td>

EndMark;
  }
  print "</tbody></table>\n";

  print "<div class=\"indented\"><i>"
    . $authors ."</i>\n</div>\n";
  if (USE_AFFILIATIONS && !empty($affiliations)) {
    print "<div class=\"indented\"><b>Affiliations:</b> "
      . $affiliations ."\n</div>\n";
  }
  print "<div class=\"indented\"><b>Contact:</b> "
    . $contact ."\n</div>\n";

  print "<div class=\"indented\">"
    . "<b>Category/Keywords:</b> " . $category
    . ' / ' . $keyWords . "\n</div>\n";
  print "<div class=\"indented\"><b>Abstract:</b>
    <br /><span class=\"fixed\">" . nl2br($abstract) ."</span>\n</div>\n";
  if (!empty($comments)) {
    print "<div class=\"indented\">
  <b>Comments:</b><br />" . nl2br($comments) ."\n</div>\n";
  }
  print "<br />\n";
}

print "<hr />\n{$links}\n</body></html>\n";
?>
