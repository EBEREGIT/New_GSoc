
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr align = "center" bgcolor = "#993300" style = "color:white" >
				<th>S/N</th>
				<th>DISH TITLE</th>
				<th>DISH TRIBE</th>
				<th>DISH IMAGE</th>
				<th>EDIT</th>
				<th>DELETE</th>
			</tr>
		</thead>

		<?php
		$i = 0;
		
		$get_dish = "select * from added";
		
		$run_dish = mysqli_query($conn, $get_dish);
		
		while ($row_dish = mysqli_fetch_array($run_dish)){
			
			$dish_id = $row_dish['dish_id'];
			$title = $row_dish['dish_title'];
			$tribe = $row_dish['dish_tribe'];
			$image = $row_dish['dish_image'];
			
			$i++;
			
		
	?>
	<tr>
		<td ><?php echo $i; ?></td>
		<td><?php echo $title; ?></td>
		<td>

		<?php

				$get_tribe = "select * from tribes";

				$run_tribe = mysqli_query($conn, $get_tribe);

				while ($row_tribe = mysqli_fetch_array($run_tribe)) {
					$tribe_id = $row_tribe['tribe_id'];
					$tribe_title = $row_tribe['tribe_title'];
				

				if($tribe == $tribe_id){
					echo $tribe_title;
				}

			}
		  ?>
		  	
		  </td>
		<td><img src = "dish_images/<?php echo $image; ?>" width = "60px" height = "60px" /></td>
		<td><a href = "index.php?edit_dish=<?php echo $dish_id; ?>">Edit</a></td>
		<td><a href = "index.php?remove_added=<?php echo $dish_id; ?>">Delete</a></td>
	</tr>
	<?php } ?>
		
	</table>
</div>