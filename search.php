<?php
include('page_header.php');
include 'db_inc.php';
?>
<h2>検索</h2>
<form class="form-horizontal" action="index.php" method="post">
  <div class="form-group">
    <label for="rname" class="control-label col-sm-2">依頼名：</label>
    <div class="col-sm-10">
      <input type="text" id="rname"  name="rname" value="" class="form-control">
    </div>
  </div>
   <div class="form-group">
    <label for="genre" class="control-label col-sm-2">ジャンル：</label>
    <div class="col-sm-10">
      <select name="genre" class="form-control">
      <option value=1>ポスター・ロゴ</option>
      <option value=2>キャッチコピー</option>
      <option value=3>オススメ</option>
      <option value=4>勉強</option>
      <option value=5>食事</option>
      <option value=6>その他</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="rname" class="control-label col-sm-2">期限：</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="sdate" value="<?php echo date('Y/m/d');?>" size=15>
    </div>
    <label for="rname" class="control-label col-sm-2">～</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="edate" value="<?php echo date('Y/m/d');?>" size=15>
    </div>
  </div>
  <div class="form-group">
    <label for="point" class="control-label col-sm-2">ポイント：</label>
    <div class="col-sm-10">
      <input type="text" id="point"  name="point" value="" class="form-control">
    </div>
  </div> 
  <div class="form-group">
    <label for="amethod" class="control-label col-sm-2">配分方法：</label>
    <div class="col-sm-10">
      <select name="amethod" class="form-control">
      <option value=1>全額配分</option>
      <option value=2>分割配分</option>
      <option value=3>順位付け配分</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="vs" class="control-label col-sm-2"></label>
    <div class="col-sm-10">
       <input type=submit value="検索" class="btn btn-block btn-info">
    </div>
  </div>
 
</form>


<?php include('page_footer.php'); ?>