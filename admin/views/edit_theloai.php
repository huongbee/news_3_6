<div class="panel panel-default">
  <div class="panel-heading"><b>Sửa thông tin thể loại <?=$data->name?></b>
  </div>
  <div class="panel-body">
  	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
  		<div class="form-group">
		    <label class="control-label col-sm-2" for="email">Tên thể loại:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="name" value="<?=$data->name?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Chọn hình:</label>
		    <div class="col-sm-5"> 
		      <input type="file" name="hinh" class="form-control">
		    </div>
		    <div class="col-sm-5"> 
		      <img src="../public/images/tintuc/<?=$data->image?>"  width="100px">
		    </div>
		  </div>
		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Lưu</button>
		    </div>
		  </div>
  	</form>
  </div>
 </div>