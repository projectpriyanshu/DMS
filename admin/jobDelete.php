<?php 
	include('../includes/connection.php');
	if(isset($_GET['id']))
	{
		    $delete_resta = "DELETE FROM jobrole WHERE job_id =".$_GET['id'];
		    $check_id = $conn->query($delete_resta);

		    if ($check_id)
		    {
		       header('location:jobRole.php');
		    } 
		    else
		    {
		       	header('location:error.php');  
		    }

	}

		

 ?>