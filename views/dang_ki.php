<?php

if(isset($_POST['btnSignup'])){
	$fullname = $_POST['name'];
	$email = $_POST['email'];
	$password = trim($_POST['password']);
	$passwordAgain = trim($_POST['passwordAgain']);
	if($password != $passwordAgain || $password==''){
		$error = 'Mật khẩu không giống nhau';
		
	}
	else{
		$c = new UserController;
		$c->postRegister($fullname,$email,$password);
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
				  	<h2 style="margin-bottom: 20px">Đăng kí</h2>
				  	
				  	
				  	<?php
				  	if(isset($error) || isset($_COOKIE['loi'])){
				  		$error = isset($_COOKIE['loi']) ? $_COOKIE['loi'] : $error;
				  	?>
				  	<div class="alert alert-danger"><?=$error?></div>
				  	<?php
				  	}
				  	?>

				  	<div class="panel-body">
				    	<form method="POST" >
				    		<div>
				    			<label>Full name</label>
							  	<input type="text" class="form-control" placeholder="Họ tên" name="name" aria-describedby="basic-addon1" required value="<?=@$fullname?>">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" required value="<?=@$email?>">
							</div>
							<br>	
							<div>
				    			<label>Enter Password</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1" required minlength="6" maxlength="10">
							</div>
							<br>
							<div>
				    			<label>Re enter password</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1" required minlength="6" maxlength="10">
							</div>
							<br>
							<button type="submit" class="btn btn-success" name="btnSignup">Đăng kí
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