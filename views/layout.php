<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Trendy Blog a Blogging Category Bootstrap Responsive Website Template  | Home :: w3layouts</title>
<base href="http://localhost/news3_6/">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trendy Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />


<!-- Custom Theme files -->
<link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="public/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1738968019748570";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- menu -->
	<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
			<div class="logo">
				<a class="navbar-brand" href="index.html"><span>H</span></a>
				<form method="GET" style="float: left;margin: 20px 10px" action="search.php">
					<input type="text" name="q" class="form-control" style="float: left;width: 75%">
					<button type="submit" style="float: left;margin-left: 5px" class="btn btn-success">Tìm</button>
				</form>
			</div>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav cl-effect-18" id="cl-effect-18">
				<li class="act"><a href="index.html" class="effect1 active">Home</a></li>
				<?php
				foreach ($menu as $value) {
				$loaitin = $value->LoaiTin;
				$arrLoaitin = explode(',', $loaitin);
				//print_r($arrLoaitin)
				?>
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  <?=$value->name?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					<?php
					foreach($arrLoaitin as $loai){
						//$lt = explode('--', $loai);
						//print_r($lt)
						list($id, $name, $alias) = explode('--', $loai);
						?>
					  <li><a href="type.php?id=<?=$id?>"><?=$name?></a></li>
					<?php
					}
					?>
					</ul>
				</li>
				<?php
				}
				?>
				<?php if(isset($_SESSION['username'])){ ?>

					<li  role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Chào bạn, <?=$_SESSION['username']?> 
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="dangxuat">Đăng xuất</a></li>
						</ul>
					</li>
					
				<?php } else{ ?>
					
					<li><a href="dangki">Đăng kí</a></li>
					<li><a href="dangnhap">Đăng nhập</a></li>
				
				<?php } ?>
				

			</ul>
		</div>
	</nav>

<!-- //menu -->
	
	<?php


	include("$view.php");

	?>

	<div id="loading-img"><img src="public/images/loading-icon.gif"></div>
<!-- footer -->
	
	<div class="footer">
		<div class="container">
			<div class="footer-bottom">
				<div class="footer-bottom-left-whtree-agileinfo">
					<p>&copy 2017 Trendy Blog. All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts.</a></p>
				</div>
				<div class="footer-bottom-right-whtree-agileinfo">
					<ul>
						<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
						<li><a href="#" class="icon-button google"><i class="icon-google"></i><span></span></a></li>
						<li><a href="#" class="icon-button v"><i class="icon-v"></i><span></span></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="public/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>