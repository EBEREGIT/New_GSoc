<!--Sign in-->
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<div class="login">

			<form class="" action="index.php?admin_sign" method="post" enctype="multipart/form-data" >
			  <div class="row" style="padding: 100px; padding-top: 15px;"> 
			  	<h2 style="background: white; color: #993300;">Admin Sign In</h2>
			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;">

			   	<label class="sr-only" for="email">Email address</label> 
			   		<input type="email" name="email" class="form-control" size="50%" placeholder="Enter email"> 
			   	</div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		<label class="sr-only" for="pass">Password</label> 
			   		<input type="password" onkeyup="hashpassword()" name="pass" id="loginpass" class="form-control" placeholder="Password"> 
			   </div> 
			   	<a href="index.php?forget">Forgot Password?</a>
			  <button type="submit" class="btn btn-default" name="login" style="float: right;">Sign in</button>
			  </div>

			  
			</form>

			<?php 

					if (isset($_GET['forget'])) {
						include('forget.php');
			}

				?>

		</div>
	</div>
		<div class="col-sm-6 col-lg-6">

	<?php include('slide_dish.php'); ?>
	</div>
</div>

<?php 
	
	if(isset($_POST['sign_up'])){

		$ip = getIp();

		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$num = $_POST['num'];
		$photo = $_FILES['photo']['name'];
		$photo_tmp = $_FILES['photo']['tmp_name'];

		move_uploaded_file ($photo_tmp, "images/$photo");

		$insert = "insert into admin (ip, name, email, password, image, number)
					values('$ip', '$name', '$email', '$pass', '$photo', '$num')";

		$insert_a = mysqli_query($conn, $insert);

		if($insert_a){
			echo "<script>alert('Created')</script>";
		}
	}



	if(isset($_POST['login'])){
	
	$email = $_POST['email'];
	
	$pass = $_POST['pass'];
	
	$ip = getIp();
	
	$sel_log = "select * from admin where password = '$pass' AND email = '$email'";
	
	$run_sel_log = mysqli_query($conn, $sel_log);
	
	$check_log = mysqli_num_rows ($run_sel_log);
	
		
	
	if($check_log == 0){
	
	echo "<script>alert('Invalid Entry. Please Try Again!')</script>";
	echo "<script>window.open('index.php?admin_sign','_self')</script>";

	}
	
	 else{
	 
			$_SESSION['email'] = $email;
			
			echo "<script>alert('You are now Loggedin! Thanks!!!')</script>";
			
			echo "<script>window.open('index.php','_self')</script>";
	 
	 }
	}
 ?>
	