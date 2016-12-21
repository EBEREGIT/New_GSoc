<?php

session_start();

include ("../functions/functions.php");

include ("../include/db.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Home-Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	
	<style>
.dropbtn {
    background-color: white;
    color: ;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>

</head>
<body>
<a name="toppage"></a>
<div class="container">



<!--header_section-->
<header>
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<a href="index.php"><img src="../images/np.jpg" alt="logo" width="200px" height="150px" style="padding: 0px; margin: 0px;"></a>	
			
	</div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<!--menu_bar-->

<a href="index.php"><h1 style="font-family: wide latin; font-weight: bolder; color:#993300; font-stretch: expanded; text-align: center; ">TheNigerianPot<br><br>Admin Panel</h1></a>
		</div>
	</div>

</header>

	<div class="row">

	<p> <hr> </p>
		<?php  if (isset($_SESSION['email'])){
			
				include('menu.php');
				
		}	
		?>
	</div>

<p> <hr> </p>

<div class="row">
	<div class="col-sm-12 col-lg-12" >
		<?php


			if (isset($_SESSION['email'])){

				if(isset($_GET['sign_up'])){
				
					include("sign_up.php");
				
				}

				if(isset($_GET['inserting_dishes'])){
				
					include("inserting_dishes.php");
				
				}
					if(isset($_GET['view_dishes'])){
				
					include("view_dishes.php");
				
				}

					if(isset($_GET['delete_dish'])){
				
					include("delete_dish.php");
				
				}
					if(isset($_GET['suggested'])){
				
					include("suggested.php");
				
				}
					if(isset($_GET['visitors'])){
				
					include("visitors.php");
				
				}

					if(isset($_GET['edit_dish'])){
				
					include("edit_dish.php");
				
				}

					if(isset($_GET['correct_dish'])){
				
					include("correct_dish.php");
				
				}

				if(isset($_GET['remove_added'])){
				
					include("remove_added.php");
				
				}

				if(isset($_GET['delete_v'])){
				
					include("delete_v.php");
				
				}

				if(isset($_GET['search'])){
				
					include("search.php");
				
				}
			}

				if (!isset($_SESSION['email'])){
			
					include('admin_sign.php');
				
						}
		
					else{
		
					include('profile.php');
		
		}

		?>
	</div>

	
</div>




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



<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


</div>
	
</body>
</html>
