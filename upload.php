<?php
include 'db_inc.php';
$userid = $_SESSION['userid'];
if (isset($_POST['rid'])){
	$rid    = $_POST['rid'];
	$contents    = $_POST['contents'];
	$sql = "UPDATE tb_receive SET comment = '{$contents}' ,eday = CURRENT_TIMESTAMP WHERE requestid = $rid and userid = '{$userid}'";
	$rs = mysql_query($sql, $conn); //SQL文を実行
}
header('Location:reclist.php');
?>