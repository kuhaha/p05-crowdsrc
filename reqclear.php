<?php
  include('page_header.php');
  include 'db_inc.php';
  $rid = $_GET["rid"];
  $sql = "SELECT * FROM  tb_request NATURAL JOIN tb_receive WHERE requestid=" . $rid;
  $rs = mysql_query($sql, $conn);
  if (!$rs) die ('エラー: ' . mysql_error());
  $row = mysql_fetch_array($rs);
  $point = $row['point'];
?>

<h2>依頼名:</h2>
<a href="reqlist.php" class="div"><?php echo $row['rname']?></a><br><br>
<form action="reqclear_save.php" method="post">
<input type="hidden" name="rid" value="<?php echo $rid; ?>">
<input type="hidden" name="point" value="<?php echo $point; ?>">
<h2>収入</h2>
<form action="pointsave2.php" method="post">
<table>
  <tr><td>受注者</td><td>納品ファイル</td><td>コメント</td><td>達成者</td></tr>
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

<?php include('page_footer.php'); ?>