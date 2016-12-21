<?php

	include("../include/db.php");
	
	if(isset($_GET['delete_v'])){
	
	$del_id = $_GET['delete_v'];
	
	$get_del = "delete from visitors where visitor_id = '$del_id'";
	
	$run_del = mysqli_query($conn, $get_del);
	
		if($run_del){
	
			echo "<script>alert('visitor has been deleted!')</script>";
			echo "<script>window.open('index.php?visitors', '_self')</script>";
	
	}
	
	}
?>