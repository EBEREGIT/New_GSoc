<!DOCTYPE html>
<?php

include ("../functions/functions.php");

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Suggest Dish</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	
</head>
<body>
<div class="container">
<!--header_section-->
<header >
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a href="../index.php"><img src="../images/np.jpg" alt="logo" width="200px" height="150px" style="padding: 0px; margin: 0px;"></a>
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
			<li><a href="../index.php">Home</a></li>
			<li><a href="../all_dishes.php">All Dishes</a></li>
			<li  class="active"><a href="add_dish.php">Suggest Dishes</a></li>
			<li><a href="../index.php">About Us</a></li>
			<li><a href="../index.php">Contact Us</a></li>
			<?php
		
		if (!isset($_SESSION['email'])){
			
			echo "<li><a href='Sign.php'>Sign up/Sign In</a></li>";
				
		}
		
		else{
			
			echo "
			<li><a href='Sign.php'>User Profile</a></li>
			<li><a href='Sign_out.php'>Sign Out</a></li>";
		
		}
			
		
		?>
		</ul>
	

<a href="../index.php"><h1 style="font-family: wide latin; font-weight: bolder; color:#993300; font-stretch: expanded; text-align: center; ">TheNigerianPot</h1></a>
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
				<li class="pdropdown"><a data-toggle="dropdown" href="#">Tribes <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="">Hausa</a></li>
					<li><a href="">Igbo</a></li>
					<li><a href="">Yoruba</a></li>
				</ul>
				</li>
				
				<li class=" dropdown"><a data-toggle="dropdown" href="#">States <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="">Hausa</a></li>
					<li><a href="">Igbo</a></li>
					<li><a href="">Yoruba</a></li>
				</ul>
				</li>

				<li class=" dropdown"><a data-toggle="dropdown" href="#">Restaurants <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="">Hausa</a></li>
					<li><a href="">Igbo</a></li>
					<li><a href="">Yoruba</a></li>
				</ul>
				</li>
			</div>
			</ul>
		</div>
	</div>

	<div class="col-sm-4 col-lg-4">
		<form method="get" action="search.php" class="navbar-form navbar-right" role="search"> 
		<div class="form-group">
		<input type="text" class="form-control" name="user_query" placeholder="Search"> 
		</div> 
		<button type="submit" class="btn btn-default" name="search">
				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</button> 
	</form>
	</div>
</div>

<div class="row">
	<div class="col-sm-2 col-lg-2">
	</div>
	<div class="col-sm-8 col-lg-8">
		<div class="added">
<form action="add_dish.php" method="post" enctype="multipart/form-data">
		<div class="row" style="padding: 100px; padding-top: 0px;"> 
			  	<h2 style="background: white; color: #993300;">Suggest a Dish</h2>

			  	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<input type="text" name="dish_title" class="form-control" size="50%" placeholder="Enter Dish Title"> 

			   	</div>
				
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				<select name="dish_tribe">
					<option>Select a Tribe</option>
					
				<?php getTribes();
				?>

				</select>
			</div>

			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				<select name="dish_state">
					<option>Select a State</option>
					
				<?php getStates();
				?>

				</select>
			</div>
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<label class="" for="Ingredient">Dish Ingredient</label>
				<textarea name="dish_ing" placeholder="" cols="10" rows="5"></textarea>
			   	</div>
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<label class="" for="Recipe">Dish Recipe</label>
				<textarea name="dish_recipe" placeholder="" cols="10" rows="5"></textarea>

			   	</div>
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<label class="" for="Image">Dish Image</label>
				<input type="file" name="dish_image" class="form-control" size="50%" placeholder="Enter Dish Image"> 

			   	</div>
			
			<button type="submit" name="add_dish" class="btn btn-default">Add Dish</button>
			 
			  </div>
		  
			</form>
	</div>
	</div>
	<div class="col-sm-2 col-lg-2">
	</div>
	</div>


<!--customer sign up-->
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<h4><a href="../index.php">Thanks For Stopping By!</a></h4>
		<h4><a href="../sign.php">We Hope To See You More Often...Sign_Up?</a></h4>
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


<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="js/bootsrap.min.js"></script>

</div>
<script src="../js/tinymce/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
</body>
</html>





<?php

	if(isset($_POST['add_dish'])){
	
		$dish_title=$_POST['dish_title'];
		$dish_tribe=$_POST['dish_tribe'];
		$dish_state=$_POST['dish_state'];
		$dish_ing=$_POST['dish_ing'];
		$dish_recipe=$_POST['dish_recipe'];
		
		
		$dish_image=$_FILES['dish_image']['name'];
		$dish_image_tmp=$_FILES['dish_image']['tmp_name'];
		
		move_uploaded_file($dish_image_tmp, "dish_images/$dish_image");
	
	$insert_dish = "insert into added
	(dish_title, dish_tribe, dish_state, dish_ingredient, dish_recipe, dish_image) 
	values
	('$dish_title','$dish_tribe', '$dish_state', '$dish_ing','$dish_recipe','$dish_image')";


	$insert_d = mysqli_query($conn, $insert_dish);
	
	if ($insert_d){
	
		echo "<script>alert('Your Suggestion has been Noted. You have been very helpful!')</script>";
		echo "<script>window.open('add_dish.php', '_self')</script>";
	
	}
	}
?>

