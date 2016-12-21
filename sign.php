<!DOCTYPE html>
<?php

session_start();

include ("functions/functions.php");

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign Up/Sign In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

	<style>
.dropbtn {
    background-color: white;
    color: ;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
</head>
<body>
<div class="container">

<!--header_section-->
<header >
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a href="index.php"><img src="images/np.jpg" alt="logo" width="200px" height="150px" style="padding: 0px; margin: 0px;"></a>	
	</div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<!--menu_bar-->
<div class="nav nav-pills row navbar-right" role="navigation">
	<div class="nav-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>


	<div class="collapse navbar-collapse" id="collapse">
		<ul class="nav nav-tabs">
			<li ><a href="index.php">Home</a></li>
			<li><a href="all_dishes.php">All Dishes</a></li>
			<li><a href="add_dish.php">Suggest Dishes</a></li>
			<li><a href="index.php">About Us</a></li>
			<li><a href="index.php">Contact Us</a></li>
			<?php
		
		if (!isset($_SESSION['email'])){
			
			echo "<li class='active'><a href='Sign.php'>Sign up/Sign In</a></li>";
				
		}
		
		else{
		
			echo "
			<li><a href='Sign.php'>User Profile</a></li>
			<li class='active'><a href='Sign_out.php'>Sign Out</a></li>";
		
		}
			
		
		?>
		</ul>
	
<a href="index.php"><h1 style="font-family: wide latin; font-weight: bolder; color:#993300; font-stretch: expanded; text-align: center; ">TheNigerianPot</h1></a>		</div>
	</div>
</header>



<!--menu_bar_2-->
<div class="row">
<!--menu-->
	<div class="col-sm-8 col-lg-8">
	<div class="nav nav-pills navbar-justified row">
		<div class="nav-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse " id="collapse">
			<ul class="nav nav-tabs">

			<li><a href="all_dishes.php">Tribes </span></a></li>
			<li class="dropdown">
				<a onclick="myFunction()" class="dropbtn" href="#">Restaurants <span class="caret"></span></a>
					<div id="myDropdown" class="dropdown-content dropdown-menu">
				  <?php 
				   
					$get_rest = "select * from restaurants";
					$run_rest = mysqli_query($conn, $get_rest);
					
					while($row_rest = mysqli_fetch_array($run_rest)){
						$rest_id = $row_rest["rest_id"];
						$rest_title = $row_rest["rest_title"];
					echo " <a href='#'>$rest_title</a>";
					}

				 ?> 
					</div> 
				</li>
			</div>
			
			</ul>
		</div>
	</div>


<!--search form-->
<div class="col-sm-4 col-lg-4">

	<form method="get" action="search.php" class="navbar-form navbar-right" role="search"> 
		<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;">
		<input type="text" class="form-control" name="user_query" placeholder="Search"> 
		</div> 
		<button type="submit" class="btn btn-default" name="search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</button> 
	</form>
	</div>
</div>


<!--Sign in-->
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<div class="login">

			<form class="" action="sign.php" method="post" enctype="multipart/form-data" >
			  <div class="row" style="padding: 100px; padding-top: 15px;"> 
			  	<h2 style="background: white; color: #993300;">Sign In</h2>
			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;">

			   	<label class="sr-only" for="email">Email address</label> 
			   		<input type="email" name="email" class="form-control" size="50%" placeholder="Enter email"> 
			   	</div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		<label class="sr-only" for="pass">Password</label> 
			   		<input type="password" onkeyup="hashpassword()" name="pass" id="loginpass" class="form-control" placeholder="Password"> 
			   </div> 
			   <a href="sign.php?forget">Forgot Password?</a>
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

	

<!--Sign Up-->


	<div class="col-sm-6 col-lg-6">
		<div class="logout">

			<form action="sign.php" method="post" enctype="multipart/form-data" >
			  <div class="row" style="padding: 100px; padding-top: 0px;"> 
			  	<h2 style="background: white; color: #993300;">Sign Up</h2>

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
			   		
			   		<input type="password" onkeyup="hashpassword()" id="" name="pass" class="form-control" placeholder="Password"> 
			   </div> 


			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="file" name="photo" class="form-control" placeholder="Passport"> 
			   </div> 

			   <div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" name="add" class="form-control" size="50%" placeholder="Enter Address"> 
			   	</div> 

			  <button type="submit" name="sign_up" class="btn btn-default" style="float: right;">Sign Up</button>
			 
			  </div>
		  
			</form>

		</div>
	</div>


</div>

<!--footer starts here-->
<div class="row">
	<div class="col-md-12">
		<footer id="colophon" class="site-footer" role="contentinfo">
		<hr>
		      <a href="#" title="Copyright">Copyright</a> © 2016 The Nigerian Pot
		      <span class="termsLinks lang-en">
		         <a href="#">TERMS OF USE</a>
		         &nbsp;|&nbsp;
		         <a href="#">PRIVACY POLICY</a>
		         <p>Powered By <a style="color:#4D75A8" href="#/">ebysoft solutions</a></p>
		      </span>
		   
		</footer>
	</div>
</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


function hashpassword(){
	$(document).ready(function() {
		$('#loginpass').onkeyup(function() {
			$('#loginpass').value(****);
		});
	});
}
// Make a text field with a hidden property
// 


</script>

<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/bootsrap.min.js"></script>

</div>
</body>
</html>



<?php

	if(isset($_POST['sign_up'])){
	
		$ip = getIp();
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$num = $_POST['num'];
		$address = $_POST['add'];
		$photo = $_FILES['photo']['name'];
		$photo_tmp = $_FILES['photo']['tmp_name'];
		
		move_uploaded_file ($photo_tmp, "visitors/visitor_images/$photo");
	
		$insert = "insert into visitors
		(visitor_ip, visitor_name, visitor_number, visitor_email, visitor_pass, visitor_image, visitor_address)
		values 
		('$ip','$name' ,'$num','$email','$pass', '$photo' ,'$address')";

		$insert_v = mysqli_query($conn, $insert);

		if($insert_v){
			echo "<script>alert('You Have been signed up successfully!')</script>";
		}
		
	}



	if(isset($_POST['login'])){
	
	$email = $_POST['email'];
	
	$pass = $_POST['pass'];
	
	$ip = getIp();
	
	$sel_log = "select * from visitors where visitor_pass = '$pass' AND visitor_email = '$email'";
	
	$run_sel_log = mysqli_query($conn, $sel_log);
	
	$check_log = mysqli_num_rows ($run_sel_log);
	
		
	
	if($check_log == 0){
	
	echo "<script>alert('Invalid Entry. Please Try Again!')</script>";
	echo "<script>window.open('sign.php','_self')</script>";

	}
	
	 else{
	 
			$_SESSION['email'] = $email;
			
			echo "<script>alert('You are now Loggedin! Thanks!!!')</script>";
			
			echo "<script>window.open('all_dishes.php','_self')</script>";
	 
	 }
	
	}


?>
	