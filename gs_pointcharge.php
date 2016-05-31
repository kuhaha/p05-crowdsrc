<?php
include('page_header.php');
require_once('db_inc.php');
$uid = $_GET['uid'];
$sql = "SELECT * FROM tb_user WHERE userid='{$uid}'";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
if($row){
	$uname = $row['uname'];
}else{
	die ('エラー: 存在しないユーザＩＤ');
}
$sql ="SELECT sum(pchange) as  point FROM tb_point WHERE userid='{$uid}'";
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$row = mysql_fetch_array($rs) ;
$point = ($row) ? $row['point'] : 0;
?>
<h2>ポイントチャージ</h2>
<form action="gs_pointsave.php" method="post">
<input type="hidden" name="userid" value="<?php echo $uid;?>">
<input type="hidden" name="plus" value="+">
<input type="hidden" name="reason" value="ポイントチャージ">
<table class="table table-striped table-hover">
<tr><td>ユーザ名</td><td><?php echo $uname;?></td></tr>
<tr><td>残高</td><td><?php echo $point;?></td></tr>
<tr><td>ポイント数</td><td><input type="text" class="form-control" name="point" size=20 ></td></tr>
<tr><td></td>
<td><input type="submit" value="チャージ" class="btn btn-primary btn-block" ></td></tr>
</table>
</form>

<?php include_once('page_footer.php');?>