<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

echo "<h2>レジ精算</h2>";
echo date('Y年m月d日');
 if (isset($_GET['uid'])){
 	$uid = $_GET['uid'];
 	$sql ="SELECT sum(pchange) as  point FROM tb_point WHERE userid='{$uid}'";
 	$rs = mysql_query($sql, $conn);
 	if (!$rs) die ('エラー: ' . mysql_error()); 	
 	$point = 0;
 	$row = mysql_fetch_array($rs) ;
 	if($row) $point = $row['point'];
	$sql = "SELECT * FROM tb_user WHERE userid='{$uid}'";
	$rs = mysql_query($sql, $conn);
	if (!$rs) die ('エラー: ' . mysql_error());
	$row = mysql_fetch_array($rs) ;
	echo '<form action="gs_pointsave.php" method="post">';
	echo '<input type="hidden" name="userid" value="' . $uid. '">';
	echo '<input type="hidden" name="plus" value="-">';
	echo '<input type="hidden" name="reason" value="ポイント利用">';
	if($row){
	 	echo '<br>' . $row['uname'] . '(' . $uid.')'.'<br>' ;
	 	echo '<h3>買い上げ明細</h3>';
	 	echo '<textarea class="form-control" name="kanso" rows="5" cols="40">
1.おにぎり：100円＊2=200円
2.ティシュペーパー:230*1=230円
3.アイス:120*1=120円
4.お茶:120*1=120円
	 </textarea>';
	 	echo'<br>金額'.'<input type="text" class="form-control" name="dummy" value="" />';
	 	echo'利用可能ポイント:'.$point.'<br>';
	 	echo'<br>利用ポイント'.'<input type="text" class="form-control" name="point" value="" />'.'<br>';
	 	echo'<input type="submit" name="a" value="送信"/>
<input type="reset" value="取消"/>';
	}
	echo '</form>';
}
include('page_footer.php');  //画面出力終了
?>