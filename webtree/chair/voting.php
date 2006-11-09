<?php
/* Web Submission and Review Software
 * Written by Shai Halevi
 * This software is distributed under the terms of the open-source license
 * Common Public License (CPL) v1.0. See the terms in the file LICENSE.txt
 * in this package or at http://www.opensource.org/licenses/cpl1.0.php
 */
$needsAuthentication = true; 
require 'header.php';

$voteId = isset($_GET['voteId']) ? intval($_GET['voteId']) : 0; // 0 for generic form
$cnnct = db_connect();

$chkAll = $chkSome = $chkOther = '';
$chkAC = $chkMA = $chkDI = $chkNO = $chkMR = $chkRE = '';
$voteBudget = $voteMaxGrade = $voteOnThese = $voteItems = '';
$voteFlags = 0;
$voteTitle = $voteDeadline = $voteInstructions = '';
$chooseVote= $gradeVote = '';
$allVotes = array();

if ($voteId > 0) { // If voteId is specified, get details of vote
  $qry = "SELECT * from votePrms WHERE voteId=$voteId";
  $res = db_query($qry,$cnnct);
  $voteDetails = mysql_fetch_array($res)
     or die("<h1>No vote with Vote-ID $voteId</h1>");

  $voteFlags = intval($voteDetails['voteFlags']);
  $voteTitle = htmlspecialchars($voteDetails['voteTitle']);
  $voteDeadline = htmlspecialchars($voteDetails['deadline']);
  $voteInstructions = htmlspecialchars($voteDetails['instructions']);
  $chooseVote= ($voteDetails['voteType']=='Choose')? 'checked="checked"' : '';
  $gradeVote = ($voteDetails['voteType']=='Grade') ? 'checked="checked"' : '';
  $voteBudget = trim($voteDetails['voteBudget']);
  if ($voteBudget<=0) $voteBudget='';
  else $voteBudget=" value=".intval($voteBudget);
  $voteMaxGrade = intval($voteDetails['voteMaxGrade']);
  if ($voteFlags & VOTE_ON_SUBS) {
    if ($voteFlags & VOTE_ON_ALL) $chkAll = 'checked="checked"';
    else {
      $chkSome = 'checked="checked"';
      if ($voteFlags & VOTE_ON_AC) $chkAC = 'checked="checked"';
      if ($voteFlags & VOTE_ON_MA) $chkMA = 'checked="checked"';
      if ($voteFlags & VOTE_ON_DI) $chkDI = 'checked="checked"';
      if ($voteFlags & VOTE_ON_NO) $chkNO = 'checked="checked"';
      if ($voteFlags & VOTE_ON_MR) $chkMR = 'checked="checked"';
      if ($voteFlags & VOTE_ON_RE) $chkRE = 'checked="checked"';
    }
    $voteOnThese = htmlspecialchars($voteDetails['voteOnThese']);
  } else {
    $chkOther = 'checked="checked"';
    $voteItems = htmlspecialchars($voteDetails['voteOnThese']);
  }
  $head2 = "Vote Parameters: $voteTitle";
}
else {             // Get a list of votes
  $head2 = "Set-up a new vote";
  $qry = "SELECT voteId, voteTitle, deadline, voteActive FROM votePrms ORDER BY voteId DESC";
  $res = db_query($qry, $cnnct);
  while ($row=mysql_fetch_array($res)) {
    $allVotes[] = $row;
  }
}

$links = show_chr_links();
print <<<EndMark
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style type="text/css">
h1 { text-align: center;}
tr { vertical-align: top; }
</style>
<title>Setup/Manage Voting</title>
</head>
<body>
$links
<hr />
<h1>Setup/Manage Voting</h1>

EndMark;

if (count($allVotes)>0) {// Generic form: print a list of votes

  print "<h2>List of ballots</h2>\n<table border=1><tbody>";
  print "<tr align=left><th>Title&nbsp;</th><th>Results</th><th>Deadline</th><th>Status</th><th colspan=2>Parameters</th></tr>\n";
  foreach ($allVotes as $v) {
    $vtId = $v['voteId'];
    $vTitle = isset($v['voteTitle']) ? trim($v['voteTitle']) : '';
    if (empty($vTitle)) $vTitle = "Ballot #$vtId";
    else if (strlen($vTitle)>50) $vTitle = substr($vTitle, 0, 48).'...';
    if (isset($v['voteActive']) && $v['voteActive']>0) {
      $vActive = 'In progress';
      $vEdit = '<a href="voting.php?voteId='.$vtId.'">Edit...</a>';
      $vClose = '<form action="doVoting.php" enctype="multipart/form-data" method=post>
  <input type="hidden" name="voteId" value="'.$vtId.'">
  <input type="submit" name="closeVote" value="Close vote">
  </form>';
    } else {
      $vActive = 'Closed';
      $vEdit = $vClose = '';
    }
    print <<<EndMark
<tr><td>$vTitle</td>
  <td><a href="voteDetails.php?voteId=$vtId">View...</a></td>
  <td>{$v['deadline']}</td><td>$vActive</td>
  <td>$vEdit</td>
  <td>$vClose</td>
</tr>

EndMark;
  }
  print "</tbody></table>\n";
}


print <<<EndMark
<h2>$head2</h2>
There are two types of votes that you can set-up:
<ul>
<li>One is simple "Choose vote"
in which you specify a list of submissions and every PC member needs to
choose some number of them. For example, "Choose up to three of the
submissions in 'Maybe Reject' category to move back to the 'Discuss' pile."
<br /><br /></li>
<li>The other type is a "Grade vote" in which you specify a list of submissions
and every PC member needs to grade these submissions on some scale. For
example, "Grade each of the remaining submissions in the 'Discuss' category
on a scale of zero to three."
<small>(Technically, a "Choose vote" is a special case of a "Grade vote"
with the scale being 0-1, but the interface that the PC member sees for
a "Choose vote" is slightly simpler than for a "Grade vote".)</small>
</li>
</ul>
In either type of vote, the tally is the sum of votes that each submission
received. (In the "Choose vote" this is the number of PC members that chose
that submission.)<br/>
<br/>
<form action="doVoting.php" enctype="multipart/form-data" method=post>
<b>Title:</b>&nbsp; <input type="text" name="voteTitle" size=60
   value="$voteTitle"> (used to distinguish this ballot from others)<br/>
<b>Deadline:</b> <input type="text" name="voteDeadline" size=56
   value="$voteDeadline"> (displayed on the voting page)<br/>
<br/>
<b>Instructions for PC members</b> (displayed on the voting page):<br/>
<textarea name="voteInstructions" rows=7 cols=80>$voteInstructions</textarea>

<h3>Vote type</h3>
<input type="radio" name="voteType" value="Choose" $chooseVote>
A simple "Choose vote"<br/>
<input type="radio" name="voteType" value="Grade" $gradeVote>
A "Grade vote" on a scale of 0 to
<input type="text" name="voteMaxGrade" size=1 value=$voteMaxGrade>
(max-grade cannot be more than 9).<br/>
<br />
Every PC member has "voting budget" of 
<input type="text" name="voteBudget" size=1{$voteBudget}> (empty or zero
for unlimited budget). For a "Choose vote", the budget is the number of
submissions that the PC member can choose. For a "Grade vote", it
is the sum of all grades that this PC member can assign.

<h3>What is included in this vote?</h3>
<b>Note:</b> PC members can only vote on submissions after you set their
"discuss" flags from the <a href="overview.php#progress">progress overview
page</a>. Until then they can only participate in "votes on other things"
as per the third option below.<br/>
<br/>
<input type="radio" name="voteOnWhat" value="all" $chkAll>
Include all submissions.
<br/>
<input type="radio" name="voteOnWhat" value="some" $chkSome>
Include only the submissions that are specified below
(<a href="../documentation/chair.html#votes" target="_blank">more info</a>):
<br/>
<table><tbody>
<tr><td></td>
    <td style="text-align: right;">&nbsp; &nbsp;submissions in the:</td>
    <td><input type="checkbox" name="voteOnAC" $chkAC>'Accept' category,</td>
    <td><input type="checkbox" name="voteOnMA" $chkMA>'Maybe Accept' category,</td>
</tr>
<tr><td></td><td></td>
    <td><input type="checkbox" name="voteOnDI" $chkDI>'Discuss' category,</td>
    <td><input type="checkbox" name="voteOnNO" $chkNO>'None' category,</td>
</tr>
<tr><td></td><td></td>
    <td><input type="checkbox" name="voteOnMR" $chkMR>'Maybe Reject' category,</td>
    <td><input type="checkbox" name="voteOnRE" $chkRE>'Reject' category</td>
</tr>
<tr><td> &nbsp; &nbsp; </td>
    <td style="text-align: right;">..and also these submission IDs:</td>
    <td colspan=2><input type="text" name="voteOnThese" value="$voteOnThese" size=80><br/>comma-separated list of submission-IDs</td>
</tr>
</tbody></table>
<br />
<input type="radio" name="voteOnWhat" value="other" $chkOther>
Vote on things other than submissions (e.g., invited speaker):
<textarea name="voteItems" rows=5 cols=80>$voteItems</textarea><br />
A <b>semi-colon separated</b> list of items to vote on. For example, to let
the PC members choose their main course for the PC dinner, you can use a line
such as <tt>"Maine Lobster; Australian barramundi; Squab breast; Medallions of
Millbrook venison; Lamb rack 'au sautoir'"</tt>.<br/>
<br/>
EndMark;

if (!empty($voteOnThese) || !empty($voteItems)) print <<<EndMark
<b>Note:</b>
If you modify the list of submission-IDs or the list of "other things" in
mid-vote, make sure that you <i>do not modify the order of items</i>, since
the software identifies vote-items with their position in the list. 
For example, swapping the order of two items will result in each of them
being assigned the tally of the other. <br/>
<br/>
EndMark;


print <<<EndMark

<input type="hidden" name="voteId" value=$voteId>
<input type="submit" name="setup" value="Set/Change Vote Parameters">
</form>
<hr />
$links
</body>
</html>

EndMark;

function print_vote_results($inProgress, $voteOnSubmissions, $voteTitles)
{
  $cnnct = db_connect();
  $noVotes = true;

  if ($voteOnSubmissions) {
    $qry = "SELECT s.subId, SUM(v.vote) sum, title
    FROM submissions s, votes v WHERE s.subId=v.subId
    GROUP BY s.subId ORDER BY sum DESC, s.subId ASC";
    $res = db_query($qry, $cnnct);

    $voteItems = array();
    while ($row=mysql_fetch_row($res)) {
      if ($row[1] == 0) continue;
      else $noVotes = false;
      $voteItems[] = $row;
    }
  } else {
    $qry = "SELECT subId, SUM(vote) sum
    FROM votes GROUP BY subId ORDER BY sum DESC, subId ASC";
    $res = db_query($qry, $cnnct);

    $voteItems = array();
    while ($row=mysql_fetch_row($res)) {
      if ($row[1] == 0) continue;
      else $noVotes = false;

      $vId = (int) $row[0];
      $voteItems[] = array($vId, $row[1], $voteTitles[$vId]);
    }
  }

  if ($noVotes) {
    print $inProgress ?
      "<h2>Vote in Progress, No Results Yet</h2>\n" :
      "<h2>No Vote in Progress, No Results Recorded</h2>\n" ;
  }
  else {
    if ($inProgress) print "<h2>Vote in Progress, Current Results:</h2>\n";
    else             print "<h2>Results From Last Vote</h2>\n";

    print "<table><tbody>\n<tr>
  <th>Tally</th><th>Num</th><th style=\"text-align: left;\">&nbsp; Title</th>\n</tr>\n";

    foreach ($voteItems as $vItem) {
      $itemId = (int) $vItem[0];
      $tally  = (int) $vItem[1];
      $title  = isset($vItem[2]) ? htmlspecialchars($vItem[2]) : '';
      if ($tally==0) continue;
      if ($voteOnSubmissions)
	$title = '<a href="../review/submission.php?subId='.$itemId.'">'
	  . $title . '</a>';

      print "<tr><td style=\"text-align: center;\">". $tally ."</td>";
      print "<td style=\"text-align: center;\">$itemId.</td><td>$title</td>\n";
      print "</tr>\n";
    }
    print "</tbody></table>\n";
    print "All other items (if any) got zero votes. <a href=\"voteDetails.php\">See detailed results.</a><br/><br/>\n";
  }
  if ($inProgress) { print <<<EndMark
<form action="doVoting.php" enctype="multipart/form-data" method=post>
<input type="hidden" name="voteClose" value="yes">
<input type="submit" value="Close this vote">
</form>

EndMark;
  }
}
?>