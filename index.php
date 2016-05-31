<?php
include('page_header.php');
include 'db_inc.php';
echo "<h2>依頼一覧</h2>";
$sql = "SELECT requestid, count(*) as people FROM  tb_receive group by requestid "; 
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$people = array();
while ( $row = mysql_fetch_array($rs) ) {
	$rid  = $row['requestid'];
	$people[$rid ] = $row['people'];
}
$sql = "SELECT * FROM  tb_request " ;
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());

echo '<table class="table table-striped table-hover">';
echo '<tr><th>番号</th><th>依頼名</th><th>締切</th><th>ポイント</th><th>応募人数</th>';
//受注・依頼できるのはワーカーのみ
$order = (isset($_SESSION['post']) and $_SESSION['post']==1) ? true : false;
if ($order) echo '<th>受注</th>';
echo '</tr>';
$no = 1;
while ( $row = mysql_fetch_array($rs) ) {
	echo '<tr>';
	$rid = $row['requestid'];
	echo '<td>' . ($no++) . '</td>';
	echo '<td>' . $row['rname'] . '</td>';
	echo '<td>' . $row['edate'] . '</td>';
	echo '<td>' . $row['point'] . '</td>';
	echo '<td>' ;
	if (isset($people[$rid])) {
		echo $people[$rid];
	}else {
		echo 0;
	}
	echo  '</td>';
	if ($order)
		echo '<td><a href="recieve.php?rid=' . $row['requestid']   . '">受注</a></td>';
	echo '</tr>';
}
echo '</table>';

include('page_footer.php');
?>