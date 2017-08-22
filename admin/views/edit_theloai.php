<?php

if(isset($_POST['btnLuu'])){
	$c = new TheloaiController();
	echo $result = $c->postEditTheloai();
}

?>

<div class="panel panel-default">
  <div class="panel-heading"><b>Sửa thông tin thể loại <?=$data->name?></b>
  </div>
  <div class="panel-body">
  	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
  		<div class="form-group">
		    <label class="control-label col-sm-2" for="name">Tên thể loại:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="nameTL" value="<?=$data->name?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Chọn hình:</label>
		    <div class="col-sm-5"> 
		      <input type="file" name="hinh" class="form-control"  onchange="showMyImage(this)" >
		    </div>
		    <div class="col-sm-5"> 
		      <img id="thumbnil" src="../public/images/tintuc/<?=$data->image?>"  width="100px">
		    </div>
		  </div>
		  <input type="hidden" name="name_img" value="<?=$data->image?>">
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="btnLuu" class="btn btn-default">Lưu</button>
		    </div>
		  </div>
  	</form>
  </div>
 </div>