<?php
//connecting to the database
$conn = mysqli_connect("localhost","root","","scard");

//checking for wrong connection
	if (mysqli_connect_errno()){
	
	echo "Failed To Connect". mysqli.connect.error();
	
	}

//getting visitors ip address
	    function getIp() {

        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }
        return $ip;

    }


//getting the Tribes

function getTribes(){

	global $conn;
	
	$get_tribes = "select * from tribes";
	$run_tribes = mysqli_query($conn, $get_tribes);

	while($row_tribes = mysqli_fetch_array($run_tribes)){
	$tribe_id = $row_tribes["tribe_id"];
	$tribe_title = $row_tribes["tribe_title"];
	echo "<option value='$tribe_id' > $tribe_title</option>";
	}
	
}


//geting the States

function getStates(){

	global $conn;
	
	$get_states = "select * from states";
	$run_states = mysqli_query($conn, $get_states);
	
	while($row_state = mysqli_fetch_array($run_states)){
		$state_id = $row_state["state_id"];
		$state_title = $row_state["state_title"];
	echo "<option value='$state_id' > $state_title</option>";
	
	}
	
}


//geting the restaurants

function getRestaurants(){

	global $conn;
	
	$get_rest = "select * from restaurants";
	$run_rest = mysqli_query($conn, $get_rest);
	
	while($row_rest = mysqli_fetch_array($run_rest)){
		$rest_id = $row_rest["rest_id"];
		$resdish_title = $row_rest["rest_title"];
	echo "<option value='$rest_id' > $resdish_title</option>";
	
	}
	
}


//geting the details

function getDetails(){

	global $conn;

if(isset($_GET['dish_id'])){
	
	$dish_id = $_GET['dish_id'];
		
	$get_dish = "select * from dish where dish_id = '$dish_id'";
	
	$run_dish = mysqli_query($conn, $get_dish);
	
	while ($row_dish = mysqli_fetch_array($run_dish)){
		$dish_id = $row_dish['dish_id'];
		$dish_title = $row_dish['dish_title'];
		$dish_tribe = $row_dish['dish_tribe'];
		$dish_state = $row_dish['dish_state'];
		$dish_ing = $row_dish['dish_ingredient'];
		$dish_recipe = $row_dish['dish_recipe'];
		$dish_image = $row_dish['dish_image'];
		$dish_rest = $row_dish['dish_restaurant'];
		$dish_qty = $row_dish['dish_quantity'];

	echo "
		<div id='single_dish'>
			<h4>Dish Name:	$dish_title</h4>
			<h5>Dish Tribe:	$dish_tribe</h5>
			<h5>Dish State:	$dish_state</h5>
			<p>Dish Ingredient:</p>
			<p>$dish_ing</p>
			<p>Dish Recipe:</p>
			<p>$dish_recipe</p>
			<p>Available Quantity:	$dish_qty</p>
			<p>Restaurant: $dish_rest</p>
			<img src = 'admin_area/dish_images/$dish_image' width='300' height='300' style='float: right;' />
			<p><b><a href = 'index.php?dish_id=$dish_id'>Make_Order</a></b></p>

			</div>
	
	
		</div>
	";
}
}
	}




//geting tribeName


function tribeName(){

	$get_dish_t = "select * tribes";

	$run_dish_t = mysqli_query($conn, $get_dish_t);

	while ($row_dish_t = mysqli_fetch_array($run_dish_t)){

		$tribe_id = $row_dish_t['tribe_id'];
		$tribe_title = $row_dish_t['tribe_title'];
	}

	$get_dish_d = "select * dish";

	$run_dish_d = mysqli_query($conn, $get_dish_d);

	while ($row_dish_d = mysqli_fetch_array($run_dish_d)){

		$dish_title = $row_dish_d['dish_tribe'];
	}

	if( $tribe_id == $dish_title){

		echo "$tribe_title";
	}

}


?>



