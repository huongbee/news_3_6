<?php
$patterns = array();
$ucfirst = ucfirst($_GET['q']);
$ucwords = ucwords($_GET['q']);
$strtoupper = mb_strtoupper($_GET['q']);
$strtolower = strtolower($_GET['q']);
$patterns[0] = "/$ucfirst/";
$patterns[1] = "/$strtoupper/";
$patterns[2] = "/$strtolower/";
$patterns[3] = "/$ucwords/";
$replacements = array();
$replacements[3] = $replacements[2] = $replacements[1] = $replacements[0] ="<b>$strtolower</b>";
//preg_replace($patterns, $replacements, 'Bộ Văn hóa Thể thao và Du lịch ');

?>

<div class="banner-bottom">
		<div class="container">
			<!-- news-and-events -->
				<div class="news">
					<div class="news-grids">
						<div class="col-md-12 news-grid-left">
							<div class="row">Tìm thấy <b><?=count($data)?></b> kết quả cho <b><?=$_GET['q']?></b></div>
							<ul>
								<?php 
								foreach($data as $news):
								?>
								<li>
									<div class="news-grid-left1">
										<img src="public/images/tintuc/<?=$news->image?>" alt=" " class="img-responsive" />
									</div>
									<div class="news-grid-right1">
										<h4><a href="detail.php?id=<?=$news->id?>&id_loai=<?=$news->id_loaitin?>"><?=preg_replace($patterns, $replacements, $news->title);?></a></h4>
										<h5><i><?=date('d-m-Y', strtotime($news->created_at))?></i></h5>
										<p><?=preg_replace($patterns, $replacements, $news->summary);?></p>
									</div>
									<div class="clearfix"> </div>
								</li>
								<?php endforeach?>
							</ul>
							
						</div>
						
				</div>
			<!-- //news-and-events -->
		</div>
	</div>