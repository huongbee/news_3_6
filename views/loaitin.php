<?php

$tintuc = $data['tintuc'];
$theloai_loaitin = $data['theloai_loaitin'];
$pageHTML = $data['pageHTML'];
$trang = 'https://www.facebook.com/myphamhuyenco96/';
//print_r($theloai_loaitin);

?>
<div class="banner-bottom">
		<div class="container">
			<!-- news-and-events -->
				<div class="news">
					<div class="news-grids">
						<div class="col-md-8 news-grid-left">
							<h3><?=$theloai_loaitin->tenTheloai.' / '.$theloai_loaitin->tenLoaitin;?></h3>
							<ul>
								<?php 
								foreach($tintuc as $news):
								?>
								<li>
									<div class="news-grid-left1">
										<img src="public/images/tintuc/<?=$news->image?>" alt=" " class="img-responsive" />
									</div>
									<div class="news-grid-right1">
										<h4><a href="single.html"><?=$news->title?></a></h4>
										<h5><i><?=date('d-m-Y', strtotime($news->created_at))?></i></h5>
										<p><?=$news->summary?></p>
									</div>
									<div class="clearfix"> </div>
								</li>
								<?php endforeach?>
							</ul>
							<div class="col-md-12"><?=$pageHTML?></div>
						</div>
						<div class="col-md-4 upcoming-events-right">
							<div class="fb-page" data-href="<?=$trang?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$trang?>" class="fb-xfbml-parse-ignore"><a href="<?=$trang?>">Mỹ phẩm online</a></blockquote></div>
							
					</div>
				</div>
			<!-- //news-and-events -->
		</div>
	</div>