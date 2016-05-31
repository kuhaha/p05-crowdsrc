<?php
$menu1 = array(  //ワーカーメニュー
  '依頼一覧'  => 'index.php' ,
  '依頼作成'  => 'request.php'  ,
  '受注一覧'  => 'reclist.php' ,
	'ポイント一覧'  => 'point.php' ,
 	'納品物一覧'  => 'delist.php' ,
 	'検索'  => 'search.php' ,
);
$menu2 = array(  //業者メニュー
 '学生一覧'  => 'gs_students.php' ,
 'ポイント利用'  => 'gs_students.php' ,
 'ポイントチャージ'  => 'gs_students.php' ,
);
$menu3 = array(  //管理者メニュー
 'アカウント登録'  => 'user_add.php' ,
 'アカウント一覧'  => 'user_list.php' ,
 'パスワード変更'  => 'user_passwd.php'
);

$menu8 = array(  //共通メニュー: ログイン中
  'ログアウト'  => 'logout.php',
);
$menu9 = array(  //共通メニュー: ログイン前
  'ユーザ登録'  => 'user_add.php',
  'ログイン'  => 'login.php',
);
echo '<ul class="nav navbar-nav">';
echo '<li><a href="index.php">ホーム</a></li>';
if(isset($_SESSION['post']) ){
  $i = $_SESSION['post'];
  $s = array(1=>'ワーカー',8=>'業者',9=>'管理者');
  echo '<li class="dropdown">';
  echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $s[$i] . 'ニュー<span class="caret"></span></a>';
  echo '<ul class="dropdown-menu">';
  $menu = array();
  if( $_SESSION['post']==1) $menu = $menu1;   //ワーカーメニュー
  if( $_SESSION['post']==8) $menu = $menu2;   //業者メニュー
  if( $_SESSION['post']==9) $menu = $menu3;   //管理者メニュー
  foreach($menu as $label=>$url) 
    echo "<li><a href=\"{$url}\">{$label}</a></li>";
  echo '</ul>';
  echo '</li>';
}
echo '</ul>';
echo '<ul class="nav navbar-nav navbar-right">';
if(isset($_SESSION['post']) ){//共通メニュー: ログイン中
  echo '<li><a>' . $_SESSION['uname'] . 'さんがログイン中</a></li>';
  foreach($menu8 as $label=>$url)
    echo '<li><a href="' .$url. '">' . $label . '</a></li>';
}else{ //共通メニュー: ログイン前
  foreach($menu9 as $label=>$url) 
    echo '<li><a href="' .$url. '">' . $label . '</a></li>';
}
echo '</ul>';