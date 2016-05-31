<?php
include('page_header.php');
echo "<h2>受注一覧</h2>";
$sql = "SELECT * FROM  tb_receive 	natural join tb_request order by requestid";
include 'db_inc.php';
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
echo '<table  class="table table-striped table-hover">';
echo '<tr><th class="number" title="クリックで並び替え">受注番号</th><th>依頼名</th><th class="number" title="クリックで並び替え">納品内容</th><th class="number" title="クリックで並び替え">納品日</th>';
while ( $row = mysql_fetch_array($rs) ) {
	echo '<tr>';
	echo '<td>' . $row['requestid'] . '</td>';
	echo '<td><a href = "reqclear.php?rid='. $row['requestid'].'">' . $row['rname'] . '</a></td>';
	echo '<td>' . $row['comment'] . '</td>';
	echo '<td>' . $row['eday']   . '</td>';
	echo '</tr>';
}
echo '</table>';
include('page_footer.php');
?>