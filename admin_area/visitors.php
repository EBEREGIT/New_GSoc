
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr align = "center" bgcolor = "#993300" style = "color:white" >
				<th>S/N</th>
				<th>VISITOR NAME</th>
				<th>VISITOR NUMBER</th>
				<th>VISITOR IMAGE</th>
				<th>DELETE</th>
			</tr>
		</thead>

		<?php
		$i = 0;
		
		$get_v = "select * from visitors";
		
		$run_v = mysqli_query($conn, $get_v);
		
		while ($row_v = mysqli_fetch_array($run_v)){
			
			$v_id = $row_v['visitor_id'];
			$name = $row_v['visitor_name'];
			$num = $row_v['visitor_number'];
			$image = $row_v['visitor_image'];
			
			$i++;
			
		
	?>
	<tr>
		<td ><?php echo $i; ?></td>
		<td><?php echo $name; ?></td>
		<td>

				<?php	echo $num;?>
		  </td>
		<td><img src = "../visitors/visitor_images/<?php echo $image; ?>" width = "60px" height = "60px" /></td>
		<td><a href = "index.php?delete_v=<?php echo $v_id; ?>">Delete</a></td>
	</tr>
	<?php } ?>
		
	</table>
</div>