<?php

if(isset($_POST['btnLuu'])){
	$c = new TheLoaiController;
	$c->postAddTheloai();
}
?>

<div class="panel panel-default">
  <div class="panel-heading"><b>Thêm thể loại mới</b>
  </div>
  <div class="panel-body">
  <div class="row">
  	<?php
  	if(isset($_COOKIE['thatbai'])){
  	?>
  		<div class="col-md-4">
	  		<div class='alert alert-danger'>
	  			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  			<p><?=$_COOKIE['thatbai']?></p>
	  		</div>
	  	</div>
  	<?php
  	}
  	?>
  </div>
  	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
  		<div class="form-group">
		    <label class="control-label col-sm-2" for="name">Tên thể loại:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control"  name="nameTL" placeholder="Nhập tên thể loại">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Chọn hình:</label>
		    <div class="col-sm-5"> 
		      <input type="file" name="hinh" class="form-control" required  onchange="showMyImage(this)" >
		    </div>
		    <div class="col-sm-5"> 
		      <img id="thumbnil" width="100px">
		    </div>
		  </div>
		  <input type="hidden" name="name_img" value="<?=$data->image?>">
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" name="btnLuu" class="btn btn-default">Thêm</button>
		    </div>
		  </div>
  	</form>
  </div>
 </div>