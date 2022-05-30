<?php 

include('../includes/connection.php');

		if(empty($_POST['job_role']))
		{
			echo "require";
		}
		else
		{
			$job_role =  $_POST['job_role'];
			 $job_role_dummy =  $_POST['job_role_dummy'];

			$id = $_POST['id'];
			$status = $_POST['status'];

				if(strcmp($job_role, $job_role_dummy) == 0)
				{
						$update = "UPDATE jobrole SET job_role='$job_role', job_status='$status' WHERE job_id='$id'";
						if($conn->query($update))
						{
							echo "Update";
						}
						else
						{
							echo "failed";
						}
				}
				else
				{
	
					$select = "SELECT * FROM jobrole WHERE job_role='$job_role'";
					$result = $conn->query($select);

					if($result -> num_rows != 0)
					{
						echo "Job Role is already exist";
					}
					else
					{
						$update = "UPDATE jobrole SET job_role='$job_role', job_status='$status' WHERE job_id='$id'";
						if($conn->query($update))
						{
							echo "Update";
						}
						else
						{
							echo "failed";
						}
					}
				}

		

		}

		

 ?>