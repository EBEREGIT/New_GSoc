function hashpassword(){
	$(windows).ready(function() {
		$('#loginpass').onkeyup(function() {
			$('#loginpass').innerHTML("****");
		});
	});
}


if(isset($_POST['submit'])){
	$stmt = "SELECT * from 'databasename' WHERE email = $email && password = $password";

	if ($stmt){
	$sql = ("UPDATE INTO 'flag' VALUES(1)");
		if(flag==1)
			$_SESSION['email'] = $user;
			header("location:dashboard.php");
		}
		else{
			die('This user is already logged in');
			header("location:loginpage.php");
		}	
	else{
		die('Email or Password is incorrect');
	}	
}
else{

}

