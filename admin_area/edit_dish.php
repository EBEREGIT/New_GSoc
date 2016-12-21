<?php
	
		if(isset($_GET['edit_dish'])){
		
		$get_id = $_GET['edit_dish'];
		
		$get_dish = "select * from added where dish_id = '$get_id'";
		
		$run_dish = mysqli_query($conn, $get_dish);
		
		$row_dish = mysqli_fetch_array($run_dish);
			
			$dish_id = $row_dish['dish_id'];
			$title = $row_dish['dish_title'];
			$tribe = $row_dish['dish_tribe'];
			$state = $row_dish['dish_state'];
			$ing = $row_dish['dish_ingredient'];
			$recipe = $row_dish['dish_recipe'];
			$image = $row_dish['dish_image'];
			
			$get_t = "select * from tribes where tribe_id = '$tribe'";
			
			$run_t = mysqli_query($conn, $get_t);
			
			$row_t = mysqli_fetch_array($run_t);
			
			$t_title = $row_t['tribe_title'];
			
			
			$get_s = "select * from states where state_id = '$state'";
			
			$run_s = mysqli_query($conn, $get_s);
			
			$row_s = mysqli_fetch_array($run_s);
			
			$s_title = $row_s['state_title'];
		}	
	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Dish Editing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	
</head>
<body>

<div class="row">
	<div class="col-sm-2 col-lg-2">
	</div>
	<div class="col-sm-8 col-lg-8">
		<div class="added">
<form action="index.php?edit_dish" method="post" enctype="multipart/form-data">
		<div class="row" style="padding: 100px; padding-top: 0px;"> 
			  	<h2 style="background: white; color: #993300;">Add Dish</h2>

			  	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<input type="text" name="dish_title" class="form-control" size="50%" placeholder="Enter Dish Title" value = "<?php echo $title; ?>"> 

			   	</div>
				
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				<select name="dish_tribe">
					<option><?php echo $t_title; ?></option>
					
				<?php getTribes();
				?>

				</select>
			</div>

			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				<select name="dish_state">
					<option><?php echo $s_title; ?></option>
					
				<?php getStates();
				?>

				</select>
			</div>
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<label class="" for="Ingredient">Dish Ingredient</label>
				<textarea name="dish_ing" placeholder="" cols="10" rows="5" ><?php echo $ing; ?></textarea>
			   	</div>
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<label class="" for="Recipe">Dish Recipe</label>
				<textarea name="dish_recipe" placeholder="" cols="10" rows="5" ><?php echo $recipe; ?></textarea>

			   	</div>
			
			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<label class="" for="Image">Dish Image</label>
				<img src="dish_images/<?php echo $image; ?>" width="100px" height="100px" alt="dish_image">
				<input type="file" name="dish_image" class="form-control" size="50%" placeholder="Enter Dish Image"> 

			   	</div>

			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<input type="text" name="dish_qty" class="form-control" size="50%" placeholder="Enter Dish Quantity"> 

			</div>

			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<input type="text" name="dish_rest" class="form-control" size="50%" placeholder="Enter Dish Restaurant"> 

			   	</div>

			<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
				
				<input type="text" name="dish_keywords" class="form-control" size="50%" placeholder="Enter Dish Keywords"> 

			   	</div>
			
			<button type="submit" name="add_dish" class="btn btn-default">Add Dish</button>
			 
			  </div>
		  
			</form>
	</div>
	</div>

<div class="col-sm-2 col-lg-2">
	</div>

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
		$dish_rest=$_POST['dish_rest'];
		$dish_qty=$_POST['dish_qty'];
		$dish_keywords=$_POST['dish_keywords'];
		
	
		$dish_image=$_FILES['dish_image']['name'];
		$dish_image_tmp=$_FILES['dish_image']['tmp_name'];
		
		move_uploaded_file($dish_image_tmp, "dish_images/$dish_image");
	
	$insert_dish = "insert into dish
	(dish_title, dish_tribe, dish_state, dish_ingredient, dish_recipe, dish_image, dish_restaurant, dish_quantity, dish_keywords) 
	values
	('$dish_title','$dish_tribe', '$dish_state', '$dish_ing','$dish_recipe','$dish_image','$dish_rest','$dish_qty', '$dish_keywords')";


	$insert_d = mysqli_query($conn, $insert_dish);

	if ($insert_d){
	
		echo "<script>alert('Dish Added!')</script>";
		echo "<script>window.open('index.php?suggested', '_self')</script>";
	
	}
	}
?>

