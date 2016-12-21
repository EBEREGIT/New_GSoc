<?php

	include("../include/db.php");
	
	if(isset($_GET['delete_dish'])){
	
	$del_id = $_GET['delete_dish'];
	
	$get_del = "delete from dish where dish_id = '$del_id'";
	
	$run_del = mysqli_query($conn, $get_del);
	
		if($run_del){
	
			echo "<script>alert('dish has been deleted!')</script>";
			echo "<script>window.open('index.php?view_dishes', '_self')</script>";
	
	}
	
	}
?>