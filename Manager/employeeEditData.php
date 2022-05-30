<?php 
	include('../includes/connection.php');
	session_start();
	$status="";
	if(empty($_POST['fname']))
	{
		echo "First Name is Required";
	}
	else if(empty($_POST['lname']))
	{
		echo "Last Name is Required";
	}
	else if(empty($_POST['email']))
	{
		echo "Email is Required";
	}
	else if(empty($_POST['doj']))
	{
		echo "Date Of Join is Required";
	}
	else if(empty($_POST['jobrole']))
	{
		echo "Job Role is Required";
	}
	else if($_POST['managerName'] == "Select Manager")
	{
		echo "Manager Name is Required";
	}
	else if(empty($_POST['address']))
	{
		echo "Address is Required";
	}
	else if($_POST['country'] == "Select Country")
	{
		echo "Country is Required";
	}
	else if($_POST['state'] == "Select State")
	{
		echo "State is Required";
	}
	else if($_POST['city'] == "Select City")
	{
		echo "City is Required";
	}
	else if(empty($_POST['pincode']))
	{
		echo "Pin Code is Required";
	}
	else
	{
		if(empty($_POST['status']))
		{
			$status="0";
		}
		else
		{
			$status="1";
		}

		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$doj=$_POST['doj'];
		$role=$_POST['jobrole'];
		
		$address=$_POST['address'];
		$country=$_POST['country'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$pincode=$_POST['pincode'];
		$manager_id = $_POST['managerName'];
		
		
			$check_resta="SELECT email FROM employee Where email='$email'";
			$response= $conn->query($check_resta);
			if($response -> num_rows > 1 )
			{
				 echo "Employee is already Exist";				
			}
			else
			{
				$update = "UPDATE employee SET fname = '$fname',lname='$lname', email = '$email', doj = '$doj', role = '$role', address = '$address', country = '$country', state = '$state', city = '$city', manager_id='$manager_id' , pincode='$pincode' ,status = '$status' WHERE id='$id'";
				if($conn->query($update))
				{
					echo "Success";

					if(file_exists("Manager/upload/$id"))
						{

							if($_FILES['image']['name'] != '')
							{
							 $fileName = $_FILES['image']['name'];
					         $file_temp = $_FILES['image']['tmp_name'];

							$extension= pathinfo($fileName, PATHINFO_EXTENSION);

							$valid_ext = array("jpg","jpeg","png");

							if(in_array($extension, $valid_ext))
							{

									$new_file= rand().".".$extension;
									$path = "Manager/upload/$id/". $new_file;

					              
									if(move_uploaded_file($file_temp, $path))
					               {
					                 	echo "File Upload Successful";
					               }
					               else{
					                echo "Some thing is wrong";
					               }
							}
							else
							{
								echo "Invalide File Format ";
							}

						}
						

						}
						else
						{
							mkdir("Manager/upload/$id");
							if($_FILES['image']['name'] != '')
							{
							 $fileName = $_FILES['image']['name'];
					         $file_temp = $_FILES['image']['tmp_name'];

							$extension= pathinfo($fileName, PATHINFO_EXTENSION);

							$valid_ext = array("jpg","jpeg","png");

							if(in_array($extension, $valid_ext))
							{

									$new_file= rand().".".$extension;
									$path = "Manager/upload/$id/". $new_file;

					              
									if(move_uploaded_file($file_temp, $path))
					               {
					                 	echo "File Upload Successful";
					               }
					               else{
					                echo "Some thing is wrong";
					               }
							}
							else
							{
								echo "Invalide File Format ";
							}

						}

					}
				}
				else
				{
					echo "faild";
				}
			}

	}
	



 ?>