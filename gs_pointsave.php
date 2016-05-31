<?php
include 'db_inc.php';
$requestid = -1 ;
if (isset($_POST['userid'])){
	$userid    = $_POST['userid'];
	$point    = $_POST['point'];
	$plus    =   $_POST['plus'];
	$reason  =   $_POST['reason'];
	if ($plus !='+') $point = -$point;
	$sql ="insert into tb_point (pchange ,detail,userid) values($point, '{$reason}', '{$userid}')";
	$rs = mysql_query($sql, $conn);
	$url = "point.php?uid=" . $userid;
	header('Location:' . $url);
}
?>