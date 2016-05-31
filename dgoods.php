<?php
include('page_header.php');
include 'db_inc.php';
$userid = $_SESSION['userid'];
if (isset($_GET['rid'])){
	$rid = $_GET['rid'];
}
$sql = "SELECT * FROM  tb_request where requestid ={$rid} ";//検索条件を適用するSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());
$people = array();
$row = mysql_fetch_array($rs);
$rname  = $row['rname'];
$edate = $row['edate'];
$contents =$row['contents'];
?>
<h2>納品</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
<table class="table table-striped table-hover">
	<tr><td>依頼名:</td><td><?php echo $rname;?></td></tr>
	<tr><td>締切日:</td><td><?php echo $edate;?></td></tr>
	<tr><td>依頼内容:</td><td><?php echo $contents;?>	</td></tr>
	<tr><td>納品内容:</td><td><textarea class="form-control" name="contents" cols=50 rows=4></textarea></td>	</tr>
  <tr><td>ファイル：</td><td><input type="file" name="upfile" size="30" /></td></tr>
</table>
<input type="hidden" name="rid" value="<?php echo $rid;?>">
<input type="submit" value="納品" /><input type="reset" value="取消"/>
</form>

<?php include('page_footer.php');  ?>