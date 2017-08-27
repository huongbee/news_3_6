<?php

$loaitin = $data['loaitin'];
$theloai = $data['theloai'];

?>
<div class="panel panel-default">
  <div class="panel-heading"><b>Danh sách loại tin thuộc thể loại <span style="color: red"><?=$theloai->name?></span></b></div>
  <div class="panel-body">
  	<?php
  	if(isset($_COOKIE['thanhcong'])){
  	?>
  		<div class="col-md-4">
	  		<div class='alert alert-success'>
	  			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  			<p><?=$_COOKIE['thanhcong']?></p>
	  		</div>
	  	</div>
  	<?php
  	}
  	?>
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
      <table class="table table-hover">
      	<thead>
	      <tr>
	        <th>STT</th>
	        <th>Tên loại tin</th>
	        <th>Danh sách tin tức</th>
	        <th>#</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php
	    $stt = 1;
	    foreach($loaitin as $tl):
	    ?>
	      <tr>
	        <td><?=$stt?></td>
	        <td><?=$tl->name?></td>
	        <td><a href="#">Xem tin tức</a></td>
	        <td>
	        	<a href="edit_theloai.php?alias=<?=$tl->alias?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
	        	<a href="#" class="delete" dataAlias="<?=$tl->alias?>"  data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
	        </td>
	      </tr>
	    <?php
	    $stt++;
	    endforeach
	    ?>
	    </tbody>
      </table>
  </div>
</div>
<!-- delete_theloai.php?alias=<?=$tl->alias?> -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Bạn có chắc chắn xóa hay không?</p>
        <p style="color: red" class="error"></p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-success btn-sm" id="btnAccept" >OK</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
