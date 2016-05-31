<?php
include('page_header.php');

$requestid = $_GET[''];
$rname = '';
$sdate = date('Y-n-d');
$edate = date('Y-n-d');
$point = 100;
$genre = 3;
$amethod = '1';
$contents = '';
$perpicient = 1;
?>

<h2>納品物入力</h2>
<form action="req_save.php" method="post"><input type="hidden"
	name="requestid" value="<?php echo $requestid;?>">
<table border=1>
	<tr><td>依頼名</td><td><input type="text" name="rname" value="<?php echo $rname;?>"
			size=50></td>
	</tr>
	<tr><td>開始日</td> <td><input type="text" name="sdate" value="<?php echo $sdate;?>"
			size=20></td>
	</tr>
	<tr><td>終了日</td><td><input type="text" name="edate" value="<?php echo $edate;?>"
			size=20></td>
	</tr>

	<tr><td>内容</td><td><textarea name="contents" cols=50 rows=4><?php echo $contents;?></textarea>
		</td>
	</tr>

	<tr><td>ポイント</td><td><input type="text" name="point" value="<?php echo $point;?>"
			size=50></td>
	</tr>

	<tr><td>ジャンル</td><td><select name="genre">
		<?php
		$g = array( 'ポスター・ロゴ', 'キャッチコピー', 'オススメ', '勉強',  '食事', 'その他',
		);
		foreach ($g as $i=>$n) {
			$sel = ($i==$genre) ? "selected" : "";
			echo "<option value={$i} {$sel}>$n</option>\n";
		}
		?>
		</select></td>
	</tr>

	<tr><td>達成者人数</td>	<td><input type="text" name="perpicient"
			value="<?php echo $perpicient;?>" size=50></td>
	</tr>

	<tr><td>ポイント配分方法</td><td><select name="amethod">
		<?php
		$g = array('全額配布', '分割配布', '順位付け配布', );
		foreach ($g as $i=>$n) {
			$sel = ($i==$amethod) ? "selected" : "";
			echo "<option value={$i} {$sel}>$n</option>\n";
		}
		?>
		</select></td></tr>
	<tr>td></td><td><input type=submit value="保存"><input type=reset value="取消"></td>
	</tr>
</table>
</form>
