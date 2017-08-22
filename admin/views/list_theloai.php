<?php
$theloai = $data;

?>

<div class="panel panel-default">
  <div class="panel-heading"><b>Danh sách thể loại</b></div>
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
      <table class="table table-hover">
      	<thead>
	      <tr>
	        <th>STT</th>
	        <th>Tên thể loại</th>
	        <th>Hình</th>
	        <th>Danh sách loại tin</th>
	        <th>#</th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php
	    $stt = 1;
	    foreach($theloai as $tl):
	    ?>
	      <tr>
	        <td><?=$stt?></td>
	        <td><?=$tl->name?></td>
	        <td><img src="../public/images/tintuc/<?=$tl->image?>" width="100px"></td>
	        <td><a href="#">Xem loại tin</a></td>
	        <td>
	        	<a href="edit_theloai.php?alias=<?=$tl->alias?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
	        	<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
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