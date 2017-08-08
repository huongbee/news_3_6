<div class="banner-bottom">
		<div class="container">
			<!-- news-and-events -->
		<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<h2>Login</h2>
				  	<?php
				  	if(isset($_COOKIE['thanhcong'])){
				  	?>

				  	<div class="alert alert-success"><?=$_COOKIE['thanhcong']?></div>

				  	<?php
				  	}
				  	?>
				  	<div class="panel-body">
				    	<form>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email">
							</div>
							<br>	
							<div>
				    			<label>Password</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="button" class="btn btn-success">Submit
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="clearfix" style="margin-bottom: 100px"></div>
			<!-- //news-and-events -->
		</div>
	</div>