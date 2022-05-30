<?php 
	include('../includes/connection.php');
	if(isset($_GET['id']))
	{

			// $delete_emp = "DELETE FROM employee WHERE id =".$_GET['id'];
		    $delete_emp = "UPDATE employee SET is_delete='1' WHERE id =".$_GET['id'];

			if($conn->query($delete_emp))
			{
				$delete_doc = "UPDATE documents SET is_delete='1' WHERE emp_id =".$_GET['id'];
				if($conn->query($delete_doc))
				{
		      		 header('location:employeeManage.php');
				}
				else
				{
		        	header('location:error.php');  

				}

			}
			else
			{
			   	header('location:error.php');  
			}

		    

	}

		

 ?>
		
