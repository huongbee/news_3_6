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

<script src="public/js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$('.delete').click(function(){
			$('.error').html('')
			var alias_theloai = $(this).attr('dataAlias')
			if(alias_theloai!=''){
				$('#btnAccept').click(function(){
					console.log(alias_theloai)

					$.ajax({
						url:"delete_theloai.php",
						type:"GET",
						data:{
							alias:alias_theloai //alias: biến truyền qua ctl, 
						},
						success:function(result){
							if($.trim(result)=="true"){
								$('.error').html('Xóa thành công')
								setTimeout(function(){ 								
									window.location.reload(true)
								}, 3000);
								
							}
							else{
								$('.error').html('Không thể xóa loại tin này')
								alias_theloai = '';
							}
						}
					})
				})
			}
			if(alias_theloai==''){
				$('.error').html('')
			}
			//alias_theloai = '';

		})
	})
</script>