<?php 

include('../includes/connection.php');

	$state_id =$_POST['state_id'];

	$select="SELECT * FROM cities where state_id=".$state_id;
	$result= $conn->query($select);
	?>
	<option value="Select City">Select State</option>
	<?php
	foreach ($result as $val){
		?>
		<option value="<?php echo $val['id']; ?>"> <?php echo $val['name']; ?></option>
		<?php
	}

 ?>