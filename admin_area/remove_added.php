<?php

	include("../include/db.php");
	
	if(isset($_GET['remove_added'])){
	
	$del_id = $_GET['remove_added'];
	
	$get_del = "delete from added where dish_id = '$del_id'";
	
	$run_del = mysqli_query($conn, $get_del);
	
		if($run_del){
	
			echo "<script>alert('dish has been deleted!')</script>";
			echo "<script>window.open('index.php?suggested', '_self')</script>";
	
	}
	
	}
?>