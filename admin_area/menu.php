	<!--menu_bar-->
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<div class="nav nav-pills row" role="navigation">
	<div class="nav-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>


	<div class="collapse navbar-collapse" id="collapse">
		<ul class="nav nav-pills nav-justified">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?view_dishes">All Dishes</a></li>
			<li><a href="index.php?suggested">Suggested Dishes</a></li>
			<li><a href="index.php?visitors">All Visitors</a></li>
			<li><a href="index.php?inserting_dishes">Dish Insertion</a></li>
			<li><a href="index.php?sign_up">Sign Up</a></li>
	<?php
		
		if (isset($_SESSION['email'])){
			
			echo "<li><a href='Sign_out.php'>Sign Out</a></li>";
		
		}
			
		
		?>
		
		</ul>
	

		</div>
	</div>
	</div>

	<!--search form-->
<div class="col-sm-4 col-lg-4">

	<form method="get" action="search.php" class="navbar-form navbar-right" role="search"> 
		<div class="form-group" style="border: 2px solid #993300; border-radius: 6px;">
		<input type="text" class="form-control" name="user_query" placeholder="Search"> 
		</div> 
		<button type="submit" class="btn btn-default" name="search">
		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>

		</button> 
	</form>
	</div>
	
