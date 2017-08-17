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
				  	
				  	<div class="notification">
				  	
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
				  	</div>

				  	<div class="panel-body">
				    	<form method="POST" >
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="<?=$_GET['email']?>" id="email" name="email" aria-describedby="basic-addon1" required readonly>
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
							<button type="button" class="btn btn-primary" id="btnResetPasscode">Quên mã kích hoạt?
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

<script>
	$(document).ready(function(){
		$('#btnResetPasscode').click(function(){
			//$('#loading-img').css('display','block');
			$('#loading-img').show();
			var email = $('#email').val();
			console.log(email);
			$.ajax({
				type:'GET',
				url:"ajax/forget_passcode.php",
				data:{mail:email}, //biến gửi đi qua php:giá trị của biến
				success:function(ketquatuphp){
					//$('#loading-img').css('display','none');
					$('#loading-img').hide();
					ketquatuphp = ketquatuphp.trim().slice(1);
					
					if(ketquatuphp=='true'){
						$('.notification').html('<div class="alert alert-success">Vui lòng check mail để nhận passcode</div>');
						$('#btnResetPasscode').attr('disabled','false')
						
						return
					}
					console.log('lỗi php')
					$('.notification').html('<div class="alert alert-danger"><p>Email chưa đăng kí tài khoản</p><div><a href="register.php">Đăng kí ngay</a></div></div>');

				},
				error:function(){
					console.log('lỗi ajax')
				}
			})
		})
	})

</script>