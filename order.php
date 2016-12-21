<!DOCTYPE html>
<?php

session_start();

include ("functions/functions.php");

include ("include/db.php");
	
	$user = $_SESSION['email'];
	
	$sel_visitor = "select * from visitors where visitor_email = '$user'";
	
	$get_visitor = mysqli_query($conn, $sel_visitor);
	
	$run_visitor = mysqli_fetch_array($get_visitor);
	
		$c_id = $run_visitor['visitor_id'];
		$name = $run_visitor['visitor_name'];
		$email = $run_visitor['visitor_email'];
		$pass = $run_visitor['visitor_pass'];
		$num = $run_visitor['visitor_number'];
		$photo = $run_visitor['visitor_image'];
		$address = $run_visitor['visitor_address'];
		
?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Order Dish</title>
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
			<li><a href="index.php">Home</a></li>
			<li><a href="all_dishes.php">All Dishes</a></li>
			<li><a href="add_dish.php">Add New Dishes</a></li>
			<li><a href="#about">About Us</a></li>
			<li><a href="#contact">Contact Us</a></li>
			<?php
		
		if (!isset($_SESSION['email'])){
			
			echo "<li><a href='Sign.php'>Sign up/Sign In</a></li>";
				
		}
		
		else{
		
			echo "

			<li><a href='Sign.php'>User Profile</a></li>
			<li><a href='Sign_out.php'>Sign Out</a></li>

			";
		
		}
			
		
		?>
		</ul>
	

<a href="index.php"><h1 style="font-family: wide latin; font-weight: bolder; color:#993300; font-stretch: expanded; text-align: center; ">TheNigerianPot</h1></a>
		</div>
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

<!--Order-->
<div class="row">
	<div class="col-sm-8 col-lg-8">
		<div class="logout">

			<form action="" method="post" enctype="multipart/form-data" >
			  <div class="row" style="padding: 100px; padding-top: 0px;"> 
			  	<h2 style="background: white; color: #993300;">Order Details</h2>

			  	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="name" name="name" value=<?php echo $name; ?> class="form-control" size="50%" placeholder="name" disabled> 
			   	</div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" name="num" value=<?php echo $num; ?> class="form-control" placeholder="phone number" disabled> 
			   </div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="email" name="email" value=<?php echo $email; ?> class="form-control" size="50%" placeholder="email" disabled> 
			   	</div> 

			   	
			   <div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" name="add" value=<?php echo $address; ?> class="form-control" size="50%" placeholder="Address" > 
			   	</div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" id="" name="d_name" class="form-control" placeholder="Dish name" disabled=""> 
			   </div> 


			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" name="rest" class="form-control" placeholder="Restaurant Name" disabled> 
			   </div> 

			   <div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="text" name="qty" class="form-control" placeholder="Quantity"> 
			   </div> 

			  <button type="" name="req" class="btn btn-default">Send Request</button>
			 
			  </div>
		  
			</form>

		</div>
	</div>
	<div class="col-sm-4 col-lg-4">
		<div>
			<img src = "visitor_images/<?php echo $photo; ?>" width = "200" height = "200" align = "center"/> 
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

</script>

<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/bootsrap.min.js"></script>

</div>
</body>
</html>



<?php


	if(isset($_POST['req'])){
	
	
			echo "<script>alert('Your Request Has been Sent. We Will Call You as soon as we get to the closest delivery point to your address. Please Be Patient!')</script>";
			
			echo "<script>window.open('all_dishes.php','_self')</script>";
	 
	 }


?>
	