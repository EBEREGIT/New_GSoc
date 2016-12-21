
<!--Sign Up-->

<div class="row">

<div class="col-sm-3 col-lg-3">

</div>
	<div class="col-sm-6 col-lg-6">
		<div class="logout">

			<form action="index.php?admin_sign" method="post" enctype="multipart/form-data" >
			  <div class="row" style="padding: 100px; padding-top: 0px;"> 
			  	<h2 style="background: white; color: #993300;">Admin Sign Up</h2>

			  	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="name" name="name" class="form-control" size="50%" placeholder="Enter name"> 
			   	</div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" name="num" class="form-control" placeholder="phone number"> 
			   </div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="email" name="email" class="form-control" size="50%" placeholder="Enter email"> 
			   	</div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="password" id="" name="pass" class="form-control" placeholder="Password"> 
			   </div> 


			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="file" name="photo" class="form-control" placeholder="Passport"> 
			   </div> 

			   <button type="submit" name="sign_up" class="btn btn-default" style="float: right;">Sign Up</button>
			 
			  </div>
		  
			</form>

		</div>
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


 ?>