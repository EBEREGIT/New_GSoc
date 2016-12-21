
<div class="row">
	<div class="col-sm-12 col-lg-12">

		<?php
				if(isset($_GET['request'])){
				
		echo "<h3>Please Make Your Choice And Send Us Your Request.</h3>
				<h4> We Await Your Request!</h4>
		";			
				
				}
				else{
		echo "
		<h3>Do You Know That You Can Add To Our List Of Dishes?</h3>
		<h4><a href='all_dishes.php?add_dish'>CLICK HERE TO ADD</a></h4>";
				}
	?>


	</div>
</div>



<!--all dishes-->

<div class="row">
	<div class="col-sm-4 col-lg-4">
		<h3>Hausa Dishes</h3>
		<?php

		$get_dish = "select * from dishes order by RAND()";
		
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
				<p><b><a href = 'index.php?dish_id=$dish_id'>Make_Order</a></b></p>
			</div>
				";
			}
		}
		?>
	</div>

	<div class="col-sm-4 col-lg-4">
	<div id="products_box">
		<h3>Igbo Dishes</h3>
		<?php

		$get_dish = "select * from dishes order by RAND()";
		
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
				<p><b><a href = 'index.php?dish_id=$dish_id'>Make_Order</a></b></p>
			</div>
				";
			}
		}
		?>
		</div>
	</div>
	
	<div class="col-sm-4 col-lg-4">
		<h3>Yoruba Dishes</h3>
			<?php

		$get_dish = "select * from dishes order by RAND()";
		
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
				<p><b><a href = 'index.php?dish_id=$dish_id'>Make_Order</a></b></p>
			</div>
				";
			}
		}
		?>
	</div>
	
</div>

<!--customer can add-->
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<h4><a href="#">Did You Find That Helpful?</a></h4>
		<h4><a href="#">YOU CAN ADD MORE DISHES HERE</a></h4>
	</div>
</div>