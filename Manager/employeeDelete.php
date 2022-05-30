<?php 
		require '../connection.php';
	if(isset($_GET['id']))
	{
		    $delete_resta = "DELETE FROM employee WHERE id =".$_GET['id'];
		    $check_id = $conn->query($delete_resta);

		    if ($check_id)
		    {
		       header('location:employeeManage.php');
		    } 
		    else
		    {
		       	header('location:error.php');  
		    }

	}

		

 ?>