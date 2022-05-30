<?php 
session_start();
		 	
include('../includes/connection.php');

			 $status="";
			if(empty($_POST['status']))
			{
				$status = 0;
			}
			else{
				 $status = 1;
			}

			 $rname=$_POST['rname'];
			 $address=$_POST['address'];
			 $country=$_POST['country'];
			 $state=$_POST['state'];
			 $city=$_POST['city'];
			 $pincode=$_POST['pincode'];
			 $contact = $_POST['contact'];
			 $contact1 = $_POST['temp_contact'];
			 $contact2 = $_POST['temp_contact2'];
			 $email = $_POST['email'];
			 $email1 = $_POST['temp_email'];
			 $email2 = $_POST['temp_email2'];


		 $check_resta="SELECT * FROM resta Where resta_name='$rname' and address='$address' OR email='$email'";
		$response= $conn->query($check_resta);
		if($response -> num_rows != 0 )
		{
			 echo "already Exists";
		}
		
		else
		{

			 if($_FILES['image']['name'] == '')
              {
              	$fileName = "" ;

              		$insert_data = "INSERT INTO resta VALUES ('','$rname','$address','$country','$state','$city','$pincode', '$contact', '$contact1', '$contact2', '$email', '$email1', '$email2', '$fileName', '$status')";

	                 	if($conn->query($insert_data))
							{
								echo "Success";
							}
							else
							{
								echo "Data Not Insert";
							}	
              }
              else
              {
              	$fileName = $_FILES['image']['name'];

			 $file_temp = $_FILES['image']['tmp_name'];
			
			$extension= pathinfo($fileName, PATHINFO_EXTENSION);

			$valid_ext = array("jpg","jpeg","png");
			
			if(in_array($extension, $valid_ext))
			{

					$new_file= rand().".".$extension;
					$path = "restaurent_image/". $new_file;

	              
					if(move_uploaded_file($file_temp, $path))
	               {
	                 	
	                 	$insert_data = "INSERT INTO resta VALUES ('','$rname','$address','$country','$state','$city','$pincode', '$contact', '$contact1', '$contact2', '$email', '$email1', '$email2', '$new_file', '$status')";

	                 	if($conn->query($insert_data))
							{
								echo "Success";
							}
							else
							{
								echo "Data Not Insert";
							}	
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


 ?>