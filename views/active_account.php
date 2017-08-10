<?php

if(isset($_POST['btnActive'])){
	$email = $data ;//$_GET['email']; //$data lấy từ phương thức loadView()
	$passcode = trim($_POST['passcode']);
	if($passcode==''){
		$error = 'Vui lòng nhập mã kích hoạt';
		
	}
	elseif(strlen($passcode)!=6){
		$error = 'Mã kích hoạt phải có 6 kí tự';
	}
	else{
		$c = new UserController;
		$c->postActiveAccount($email,$passcode);
	}
}



?>	
	<div class="banner-bottom">
		<div class="container">
			<!-- news-and-events -->
				<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<h2 style="margin-bottom: 20px">Kích hoạt tài khoản</h2>
				  	
				  	
				  	<?php
				  	if(isset($error) || isset($_COOKIE['loi'])){
				  		$error = isset($_COOKIE['loi']) ? $_COOKIE['loi'] : $error;
				  	?>
				  	<div class="alert alert-danger"><?=$error?></div>
				  	<?php
				  	}
				  	?>
				  	<?php
				  	if(isset($_COOKIE['thanhcong'])){
				  		
				  	?>
				  	<div class="alert alert-success"><?=$_COOKIE['thanhcong']?></div>
				  	<?php
				  	}
				  	?>

				  	<div class="panel-body">
				    	<form method="POST" >
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="<?=$_GET['email']?>" name="email" aria-describedby="basic-addon1" required readonly>
							</div>
							<br>	
							<div>
				    			<label>Mã kích hoạt</label>
							  	<input type="text" class="form-control" name="passcode" aria-describedby="basic-addon1" required minlength="6" maxlength="6">
							</div>
							<br>
							<br>
							<button type="submit" class="btn btn-success" name="btnActive">Kích hoạt
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="clearfix"></div>
        </div>
			<!-- //news-and-events -->
		</div>
	</div>