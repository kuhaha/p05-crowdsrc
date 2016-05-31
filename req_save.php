<?php
include 'db_inc.php';
$requestid = -1 ;
if (isset($_POST['requestid'])){
	$requestid    = $_POST['requestid'];
}
if (isset($_POST['rname'])){
	$rname  = $_POST['rname'];
	$genre    = $_POST['genre'];
	$contents  = $_POST['contents'];
	$point  = $_POST['point'];
	$amethod = $_POST['amethod'];
	$sdate    = $_POST['sdate'];
	$edate     = $_POST['edate'];
	$perpicient = $_POST['perpicient'];
	if ($requestid < 0){ //新規。idは自動生成されるため、INSERTではidを指定しない
		$sql = "INSERT INTO tb_request(rname,genre,contents,point,sdate,amethod,edate,perpicient) VALUES"
		. "('{$rname}',{$genre},'{$contents}',{$point},'{$sdate}',{$amethod},'{$edate}',{$perpicient})";
	}else {     //編集
		$sql = "UPDATE tb_request SET " .
         "rname='{$rname}',genre={$genre},contents='{$contents}',"
		."point={$point},sdate='{$sdate}',amethod='{$amethod}',edate='{$edate}',perpicient='{$perpicient}' ".
         " WHERE requestid={$requestid}";
	}
	$rs = mysql_query($sql, $conn); //SQL文を実行
	header('Location:index.php');//一覧へ画面遷移
}
?>