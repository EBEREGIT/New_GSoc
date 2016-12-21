
<div class="row">

	<div class="col-sm-12 col-lg-12">
		<div class="logout">

			<form action="" method="post" enctype="multipart/form-data" >
			  <div class="row" style="padding: 100px; padding-top: 0px;"> 
			  	

			  	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<input type="name" name="name"  class="form-control" size="50%" placeholder="name" required=""> 
					   		
			   		<input type="email" name="email"  class="form-control" placeholder="email" required=""> 
			   </div> 

			   	<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;"> 
			   		
			   		<textarea name="msg" placeholder="Comment" cols="45" rows="10"></textarea>
			   	</div> 

			  <button type="" name="comment" class="btn btn-default">Post Comment</button>
			 
			  </div>
		  
			</form>

		</div>
	</div>
	<div class="col-sm-4 col-lg-4">

	

		<div>
			<h4></h4>
		</div>
	</div>

</div>

<?php

	if(isset($_POST['comment'])){
	
		$ip = getIp();
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$msg = $_POST['msg'];
		
	
		$insert = "insert into Comment
		(visitor_ip, visitor_name, visitor_email, visitor_comment)
		values 
		('$ip','$name', '$email' ,'$msg')";

		$insert_v = mysqli_query($conn, $insert);

		if($insert_v){
			

		echo "
			<div class='media' style='padding:100px; border-bottom: 2px solid #993300; border-radius: 6px;'' >
  				<div class='media-left'>
				    <a href=''>
				      <img  class='' src='' alt='logo'>
				    </a>
				</div>
				<div class='media-body'>
    			$msg
   
				</div>
			</div>";	


		}
		
	}

?>
	