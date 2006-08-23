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
$qry = "SELECT subId, title, authors FROM submissions WHERE status!='Withdrawn' ORDER BY subId";
$res = db_query($qry, $cnnct);
if (!$res || nysql_num_rows($res)==0) die("<h1>No submissions found</h1>")

header('Content-Disposition: attachment; filename="'.CONF_SHORT.CONF_YEAR$.'submissions.xls"');
print "subId\tTitle\tAuthors\n";
while ($row = mysql_fetch_row($res)) {
  print $row[0]."\t".$row[1]."\t".$row[2]."\n";
}
?>