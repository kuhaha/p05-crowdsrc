<?php
session_start();
include('page_header.php');
include 'menu1.php';
//include 'reqmenu.php';
include 'db_inc.php';
$rid = $_GET["rid"];
$sql = "SELECT * FROM  tb_request NATURAL JOIN tb_receive WHERE requestid=" . $rid;//検索条件を適用するSQL文を作成
//echo $sql;
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs);
$point = $row['point'];

?>
<style>
table {
	border-collapse: collapse;
}
td {
	border: solid 1px;
	padding: 0.5em;
}
</style>
<p>依頼名:<A Href="http://localhost/crowdsourcing/reqlist.php" class="div"><?php echo $row['rname']?></A><br><br>
<form action="reqclear_save.php" method="post">
<input type="hidden" name="rid" value="<?php echo $rid; ?>">
<input type="hidden" name="point" value="<?php echo $point; ?>">
<h2>収入</h2>
<FORM ACTION="pointsave2.php" METHOD="POST">
<table>
  <tr>
    <td>受注者</td>
    <td>納品ファイル</td>
    <td>コメント</td>
    <td>達成者</td>
  </tr>
  <?php
   while ( $row ) {
	echo '<tr>';
	$rid = $row['requestid'];
	echo '<td>' . $row['userid'] . '</td>';
	echo '<td>  </td>';
	echo '<td>' . $row['comment'] . '</td>';
	echo '<td><input type="checkbox" name="q[]" value="'. $row['userid']. '"> </td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs);
}
  ?>

</table>
<p><input type="submit" value="決定"></p>
</form>

<?php
?>