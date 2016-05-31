<?php
include('page_header.php');
require_once('db_inc.php');  //データベース接続

echo "<h2>学生一覧</h2>";
$where = 'WHERE post=1'; // 条件なしSQLのWHERE部分を作る
$sql = "SELECT * FROM tb_user " . $where;//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) {
    die ('エラー: ' . mysql_error());
}

$row = mysql_fetch_array($rs) ;

echo '<table class="table table-striped table-hover">';
echo '<tr><th>学籍番号</th><th>氏名</th><th>所属</th><th>ポイント利用</th><th>ポイントチャージ</th></tr>';
while ($row) {
 echo '<tr>';
 echo '<td>' . $row['userid'] . '</td>';
 echo '<td>' . $row['uname']. '</td>';

  $depts = array( 'jk'=>'情報科学科', 'te'=>'電気情報工学科', 'at'=>'芸術学部','es'=>'商学部','mg'=>'経営学部');
  $r= $row['dept'];
  $dept = $depts [ $r ];
  echo '<td>' . $dept . '</td>';

// echo '<td>' . $row['dept'] . '</td>';

  echo '<td>' ;
  echo '<a href="gs_pointcheck.php?uid='.$row['userid'] .'">利用</a>';
  echo '</td>';

// echo '</tr>';

  echo '<td>' ;
  echo '<a href="gs_pointcharge.php?uid='.$row['userid'] .'">チャージ</a>';
  echo '</td>';

 echo '</tr>';

 $row = mysql_fetch_array($rs) ;

}
echo '</table>';

include('page_footer.php');  //画面出力終了
?>