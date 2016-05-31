<?php
include('page_header.php');
include 'db_inc.php';
$userid = $_SESSION['userid'];
echo "<h2>受注一覧</h2>";
$sql = "SELECT requestid, count(*) as people FROM  tb_receive group by requestid ";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$people = array();
while ( $row = mysql_fetch_array($rs) ) {
	$rid  = $row['requestid'];
	$people[$rid ] = $row['people'];
}
$where = " where userid='{$userid}'";
$sql = "SELECT * FROM  tb_request NATURAL JOIN tb_receive  " . $where;//検索条件を適用するSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
echo '<table class="table table-striped table-hover">';
echo '<tr><th>依頼番号</th><th>依頼名</th><th>締切</th><th>ポイント</th>';
echo '<th>応募人数</th><th>納品状態</th><th>納品</th>';
while ( $row = mysql_fetch_array($rs) ) {
	echo '<tr>';
	$rid = $row['requestid'];
	echo '<td>' . $row['requestid'] . '</td>';
	echo '<td>' . $row['rname'] . '</td>';
	echo '<td>' . $row['edate'] . '</td>';
	echo '<td>' . $row['point']   . '</td>';
	echo '<td>' ;
	echo isset($people[$rid]) ? $people[$rid] : 0;
	echo  '</td>';
	$eday = $row['eday'];
	echo '<td>' . $eday .'</td>';
	echo '<td><a href="dgoods.php?rid=' . $row['requestid']   . '">納品</a></td>';
	echo '</tr>';
}
echo '</table>';

include('page_footer.php');
?>