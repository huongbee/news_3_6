<?php
require('inc/functions.php');
$tintuc = $data['tintuc'];
$comments = $data['comment'];
$relatedNews = $data['relatedNews'];
// echo'<pre>';
// print_r($comments);
// echo'</pre>';

?>
<div class="single">
		<div class="container">
			<div class="single-grid">
				<div class="col-md-8 blog-left">
					<div class="blog-left-grid">
						<div class="blog-leftl">
							<h4><?=parseMonth(date('m',strtotime($tintuc->created_at)))?><span><?=date('d',strtotime($tintuc->created_at))?></span></h4>
							<a href="#"><i class="glyphicon glyphicon-tags" aria-hidden="true"></i>10</a>
						</div>
						<div class="blog-leftr">
							<img src="public/images/tintuc/<?=$tintuc->image?>" alt=" " class="img-responsive" />
							<p><?=$tintuc->content?></p>
							<ul>
								<li><a href="#"><i class="glyphicon glyphicon-comment" aria-hidden="true"></i><?=count($comments)?> bình luận</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						
						<div class="response">
							<h4>Các bình luận</h4>
							<div id="result_comment"></div>
							<?php
							foreach($comments as $cmt){
							?>
							<div class="media response-info">
								<div class="media-left response-text-left">
									<a href="#">
										<img class="media-object" src="public/images/icon1.png" alt=""/>
									</a>
									<h5><a href="#"><?=$cmt->name?></a></h5>
								</div>
								<div class="media-body response-text-right">
									<p><?=$cmt->content?></p>
									<ul>

										<li><?=date('d-m-Y',strtotime($cmt->created_at))?></li>

									</ul>		
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php }?>
						</div>	
						<div class="coment-form">
							<h4>Viết bình luận</h4>
							<?php
							if(!isset($_SESSION['username'])){
								echo '<p style="color: red">Vui lòng đăng nhập để thêm bình luận</p>';
							}
							?>
							<form>
								<textarea type="text" required id="txtComment"></textarea>
								<input type="button" value="Gửi bình luận" id="btnSendComment" >
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 blog-right">
					
					<div class="recent">
						<h3>Tin cùng loại</h3>
						<div class="recent-grids">
							<?php foreach($relatedNews as $tincungloai){?>
							<div class="recent-grid">
								<div class="wom">
									<a href="detail.php?id=<?=$tincungloai->id?>&id_loai=<?=$tincungloai->id_loaitin?>"><img src="public/images/tintuc/<?=$tincungloai->image?>" alt=" " class="img-responsive" /></a>
								</div>
								<div class="wom-right">
									<h4><a href="detail.php?id=<?=$tincungloai->id?>&id_loai=<?=$tincungloai->id_loaitin?>"><?=$tincungloai->title?></a></h4>
									<p><?=$tincungloai->summary?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php } ?>
						</div>
					</div>
				
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p class="modal-title">Gửi bình luận thành công</p>
        </div>
      </div>
      
    </div>
  </div>
<script>
	$(document).ready(function(){
		$('#btnSendComment').click(function(){
			var content = $('#txtComment').val();
			var id_user = "<?=@$_SESSION['id_user']?>";
			var name_user = "<?=@$_SESSION['username']?>";
			var id_tin = "<?=@$_GET['id']?>";
			//console.log(content)
			var commentHTML = '<div class="media response-info"><div class="media-left response-text-left"><a href="#"><img class="media-object" src="public/images/icon1.png" alt=""/></a><h5><a href="#">'+name_user+'</a></h5></div><div class="media-body response-text-right"><p>'+content+'</p><ul><li>Vừa xong</li></ul></div><div class="clearfix"> </div></div>'
			$.ajax({
				type:'POST',
				url:"ajax/add_comment.php",
				data:{
					content: content, //biến gửi đi:giá trị
					id_user: id_user,
					id_tin: id_tin
				},
				success:function(data){
					if(data=='false'){
						console.log('lỗi php');
						return;
					}
					//console.log('thành công')
					$('#result_comment').append(commentHTML)
					$('#txtComment').val('')
				},
				error:function(data){
					console.log('lỗi ajax')
				}
			})
		})
	})
</script>