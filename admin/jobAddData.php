<?php 

include('../includes/connection.php');

		if(empty($_POST['job_role']))
		{
			echo "require";
		}
		else
		{
			$job_role =  $_POST['job_role'];



		$select = "SELECT * FROM jobrole WHERE job_role='$job_role'";


		$result = $conn->query($select);

		if($result -> num_rows != 0)
		{
			echo "Job Role is already exist";
		}
		else
		{
				$insert_data = "INSERT into jobrole (job_role, job_status) values ('$job_role','1')";

				if($conn->query($insert_data))
				{
					echo "Success";
				}
				else
				{
					echo "data Not insert";
				}
		}

		}

		

 ?>