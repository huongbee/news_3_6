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
							<h4>Leave your comment</h4>
							<form>
								<input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="email" value="Email (will not be published)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
								<input type="text" value="Website" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
								<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
								<input type="submit" value="Submit Comment" >
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 blog-right">
					<h3>Categories</h3>
					<ul>
						<li><a href="#">Aliquam erat volutpat</a></li>
						<li><a href="#">Integer rutrum ante eu lacus</a></li>
						<li><a href="#">Cum sociis natoque penatibus</a></li>
						<li><a href="#">Mauris fermentum dictum magna</a></li>
						<li><a href="#">Sed laoreet aliquam leo</a></li>
						<li><a href="#">Cum sociis natoque penatibus</a></li>
					</ul>
					<div class="recent">
						<h3>Tin cùng loại</h3>
						<div class="recent-grids">
							<?php foreach($relatedNews as $tincungloai){?>
							<div class="recent-grid">
								<div class="wom">
									<a href="#"><img src="public/images/tintuc/<?=$tincungloai->image?>" alt=" " class="img-responsive" /></a>
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
					<div class="footer-top-grid1">
						<h3>Recent Tags</h3>
						<ul class="tag2">
							<li><a href="#">awesome</a></li>
							<li><a href="#">strategy</a></li>
							<li><a href="#">development</a></li>
						</ul>
						<ul class="tag2">
							<li><a href="#">css</a></li>
							<li><a href="#">photoshop</a></li>
							<li><a href="#">photography</a></li>
							<li><a href="#">html</a></li>
						</ul>
						<ul class="tag2">
							<li><a href="#">awesome</a></li>
							<li><a href="#">strategy</a></li>
							<li><a href="#">development</a></li>
						</ul>
						<ul class="tag2">
							<li><a href="#">css</a></li>
							<li><a href="#">photoshop</a></li>
							<li><a href="#">photography</a></li>
							<li><a href="#">html</a></li>
						</ul>
						<ul class="tag2">
							<li><a href="#">awesome</a></li>
							<li><a href="#">strategy</a></li>
							<li><a href="#">development</a></li>
						</ul>
					</div>
					<div class="poll">
						<h3>Poll</h3>
							<div class="progress p">
							  <div class="progress-bar bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								60%
							  </div>
							</div>
							<div class="progress p">
							  <div class="progress-bar bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
								80%
							  </div>
							</div>
							<div class="progress p">
							  <div class="progress-bar bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
								90%
							  </div>
							</div>
							<div class="progress p">
							  <div class="progress-bar bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
								40%
							  </div>
							</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>