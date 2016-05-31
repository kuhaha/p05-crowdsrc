<?php
session_start();
include 'db_inc.php';
$userid = $_SESSION['userid'];
if (isset($_GET['rid'])){
	$rid    = $_GET['rid'];
	$sql = "INSERT INTO tb_receive(requestid,userid,rday) VALUES ($rid,'{$userid}',CURRENT_TIMESTAMP)";
	//echo $sql;

	// データベースへ接続
	$conn = mysql_connect("localhost","root",""); //接続IDを変数$connに代入
	mysql_select_db("crowdsourcing", $conn);       // データベースを指定
	mysql_query('set names utf8', $conn);         //接続時の文字コードをutf8に設定


	$rs = mysql_query($sql, $conn); //SQL文を実行
}
// 画面遷移
header('Location:reclist.php');//一覧へ画面遷移

?>