<?php

session_start();

include ("functions/functions.php");

include ("include/db.php");
	
	@$user = $_SESSION['email'];
	
	$sel_visitor = "select * from visitors where visitor_email = '$user'";
	
	$get_visitor = mysqli_query($conn, $sel_visitor);
	
	$run_visitor = mysqli_fetch_array($get_visitor);
	
	
		$name = $run_visitor['visitor_name'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home-The Nigerian Pot</title>
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
<a name="toppage"></a>
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
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="all_dishes.php">All Dishes</a></li>
			<li><a href="visitors/add_dish.php">Suggest Dishes</a></li>
			<li><a href="#about">About Us</a></li>
			<li><a href="#contact">Contact Us</a></li>
			<?php
		
		if (!isset($_SESSION['email'])){
			
			echo "
			<li><a href='Sign.php'>Sign up/Sign In</a></li>

			";

				
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
<div class="clearfix">
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
</div>
<!--image slide and Advert-->
<div class="row">
	
	<div class="col-xs-12 col-md-12">

	<?php include('slide_dish.php'); ?>

	</div>
	</div>

<div class="row">
	<div class="col-xs-12 col-md-12">

		<?php
		
		if (!isset($_SESSION['email'])){
			
			echo "<h2>Hello, You Are Very Welcome to The Nigerian Pot.<br> Do you know that. . .</h2>";
				
		}
		
		else{
		
			echo "<h2>Hello, $name, You Are Very Welcome to The Nigerian Pot.<br> Do you know that. . .</h2>";
		
		}
			
		
		?>

	
	<h4> <a href = "search.php?learn">You can Learn How to make Nigerian Traditional Dishes Yourself?</a></h4><hr> 

	<h4> <a href="all_dishes.php?request">You can request us to bring you these dishes to your doorstep at affordable prices and within affordable time?</a></h4><hr>

	<h4> <a href ="#toppage">You can use our menu bar or  search engine above to find a dish of your choice?</a> </h4><hr>

	<h4> <a href = "visitors/add_dish.php">You can add to our library of Nigerian dishes?</a></h4> 
	</div>
</div>

<div class="row">
	<div class="col-sm-4 col-lg-4">
		<h3>Hausa Dishes</h3>
		<?php

		$get_dish = "select * from dish order by RAND() LIMIT 0,2";
		
		$run_dish = mysqli_query($conn, $get_dish);
		
		while ($row_dish = mysqli_fetch_array($run_dish)){
			$dish_id = $row_dish['dish_id'];
			$dish_title = $row_dish['dish_title'];
			$dish_tribe = $row_dish['dish_tribe'];
			$dish_state = $row_dish['dish_state'];
			$dish_ing = $row_dish['dish_ingredient'];
			$dish_image = $row_dish['dish_image'];


		if($dish_tribe == 1){
			echo "
				<div id='single_pro'>
				<h4>$dish_title</h4>
				<img src = 'admin_area/dish_images/$dish_image' width='180' height='180' />
				<p><b><a href ='details.php?dish_id=$dish_id'>Details</a></b></p>
				
			</div>
				";
			if (!isset($_SESSION['email'])){
			
			echo "<div><p><b><a href = 'sign.php?dish_id=$dish_id'>Make_Order</a></b></p></div>";
				
		}
		
		else{
		
			echo "<div><p><b><a href = 'order.php?dish_id=$dish_id'>Make_Order</a></b></p></div>";
		
		}
			}
		}
		?>
	</div>

	<div class="col-sm-4 col-lg-4">
	<div id="products_box">
		<h3>Igbo Dishes</h3>
		<?php

		$get_dish = "select * from dish order by RAND() LIMIT 0,2";
		
		$run_dish = mysqli_query($conn, $get_dish);
		
		while ($row_dish = mysqli_fetch_array($run_dish)){
			$dish_id = $row_dish['dish_id'];
			$dish_title = $row_dish['dish_title'];
			$dish_tribe = $row_dish['dish_tribe'];
			$dish_state = $row_dish['dish_state'];
			$dish_ing = $row_dish['dish_ingredient'];
			$dish_image = $row_dish['dish_image'];


		if($dish_tribe == 2){
			echo "
				<div id='single_pro'>
				<h4>$dish_title</h4>
				<img src = 'admin_area/dish_images/$dish_image' width='180' height='180' />
				<p><b><a href ='details.php?dish_id=$dish_id'>Details</a></b></p>
				
			</div>
				";
		if (!isset($_SESSION['email'])){
			
			echo "<div><p><b><a href = 'sign.php?dish_id=$dish_id'>Make_Order</a></b></p></div>";
				
		}
		
		else{
		
			echo "<div><p><b><a href = 'order.php?dish_id=$dish_id'>Make_Order</a></b></p></div>";
		
		}
			}
		}
		?>
		</div>
	</div>
	
	<div class="col-sm-4 col-lg-4">
		<h3>Yoruba Dishes</h3>
			<?php

		$get_dish = "select * from dish order by RAND() LIMIT 0,2";
		
		$run_dish = mysqli_query($conn, $get_dish);
		
		while ($row_dish = mysqli_fetch_array($run_dish)){
			$dish_id = $row_dish['dish_id'];
			$dish_title = $row_dish['dish_title'];
			$dish_tribe = $row_dish['dish_tribe'];
			$dish_state = $row_dish['dish_state'];
			$dish_ing = $row_dish['dish_ingredient'];
			$dish_image = $row_dish['dish_image'];


		if($dish_tribe == 3){
			echo "
				<div id='single_pro'>
				<h4>$dish_title</h4>
				<img src = 'admin_area/dish_images/$dish_image' width='180' height='180' />
				<p><b><a href ='details.php?dish_id=$dish_id'>Details</a></b></p>
				
			</div>
				";

				if (!isset($_SESSION['email'])){
			
			echo "<div><p><b><a href = 'sign.php?dish_id=$dish_id'>Make_Order</a></b></p></div>";
				
		}
		
		else{
		
			echo "<div><p><b><a href = 'order.php?dish_id=$dish_id'>Make_Order</a></b></p></div>";
		
		}

			}
		}
		?>
	</div>
	
</div>

<!--about section-->
<a name="about"></a>
<div class="row">
<div>
	<h3 style="width: 98.5%; text-align: center; margin: 10px;">About Us</h3>
	
	<?php include('about_us.php'); ?>
</div>
</div>

<!--about section-->
<a name="contact"></a>
<div class="row">
	<h3 style="width: 98.5%; text-align: center; margin: 10px;">Contact Us</h3>
	
	<?php include('contact.php'); ?>
</div>
</div>


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


</div>
	
</body>
</html>
