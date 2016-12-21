

<div class="row">
	
	<div class="col-sm-6 col-lg-6">

	<?php  

	if(isset($_SESSION['email'])){

		$email = $_SESSION['email'];

		$get = "select * from admin where email = '$email'";
			
			$run = mysqli_query($conn, $get);
			
			while ($row = mysqli_fetch_array($run)){
				
				$image = $row['image'];
				
			echo "
				<img src = 'images/$image' width='300px' height='350' style='float: right; padding-top: 50px;' />
			";
		}
		}
?>
			
	</div>

	<div class="col-sm-6 col-lg-6">

	<?php  

	if(isset($_SESSION['email'])){

		$email = $_SESSION['email'];

		$get = "select * from admin where email = '$email'";
			
			$run = mysqli_query($conn, $get);
			
			while ($row = mysqli_fetch_array($run)){
				
				$name = $row['name'];
				$email = $row['email'];
				$numb = $row['number'];
				$name = $row['name'];
				
			echo "
				<div style = 'padding:30px;'>
					<h3><b>Admin Profile</b></h3>
				</div>
				<div style=''>
					<h4 style = 'text-align:left;'><b>NAME: </b> $name </h4>
					<h4 style = 'text-align:left;'><b>EMAIL: </b> $email </h4>
					<h4 style = 'text-align:left;'><b>CONTACT: </b> $numb </h4>
				</div>
			";
		}
		}
?>
			
	</div>
	

</div>