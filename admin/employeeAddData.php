<?php 
	session_start();
	 $social=$data=$privacy="";
	 $user_name ="";
	$password = "";
	include('../includes/connection.php');
		if(empty($_POST['social']))
		{
			  $social = 0;
		}
		else
		{
			 $social = 1;
		}

		if(empty($_POST['data']))
		{
			   $data = 0;
		}
		else
		{
			 $data = 1;
		}

		if(empty($_POST['privacy']))
		{
			   $privacy = 0;
		}
		else
		{
			 $privacy = 1;
		}



		$emp_name = $_POST['emp-name'];
		$emp_profile = $_POST['jobrole'];
		$user_name = $_POST['user-name'];
		$password = $_POST['password'];

		$restaurant = $_POST['restaurant'];
		$email = $_POST['email'];
		$doj = $_POST['doj'];
		$contact = $_POST['contact'];
		$date_of_birth = $_POST['date-of-birth'];	
		$address=$_POST['address'];
		$country=$_POST['country'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$pincode=$_POST['pincode'];

		$passport = $_POST['passport'];
		$passport_exp = $_POST['passport-exp'];

		// $brp_exp = $_POST['brp-exp'];
		// $ecs_exp = $_POST['ecs-exp'];
		// $dl_exp = $_POST['dl-exp'];
		// $car_exp = $_POST['car-exp'];
		// $tax_exp = $_POST['tax-exp'];
		// $mot_exp = $_POST['mot-exp'];

			$documentName = array("New Starter Form","BRP","ECS","Driving Licence","Car Insurance","Car Tax","MOT","Other Document"); 	
	

		

		 

			$check_resta="SELECT * FROM employee Where email='$email'";
			$response= $conn->query($check_resta);
			if($response -> num_rows != 0 )
			{
				 echo "Email Id is already Exist";
			}
			else
			{	
									
			
						$done = 0;
						$i=1;
						$j=0;
				
						
				 $insert_data = "INSERT INTO employee  VALUES ('','$emp_name', '$emp_profile','$user_name','$password','$restaurant','$date_of_birth','$email','$contact','$doj','$address','$country','$state','$city','$pincode','$passport','$passport_exp','1','$social','$data','$privacy','0')";

					if($conn->query($insert_data))
					{
						 
						$select_last = "SELECT id,emp_name FROM employee ORDER BY id DESC LIMIT 1";
						$response = $conn->query($select_last);
						if($response -> num_rows != 0)
						{
							foreach ($response as $value)
							{
								$emp_id = $value['id'];
							}
						}

					if(file_exists("employee_image/$emp_id"))
						{
							foreach($_FILES['doc']['name'] as $key=>$val)
							{
								// echo $val;
								// $ext= pathinfo($val, PATHINFO_EXTENSION);
								//  $new_file = rand().".".$ext;
							 // array_push($images,$new_file);
								$file = "employee_image/$emp_id/".$val;			
			
								$expire_date = $_POST['expdata'][$i];

								 $document = $documentName[$j];

								 move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file);
								 $insert_images= "INSERT INTO doc (empId, DocumentName, DocumentExpiryDate, DocumentImage)VALUES ('$emp_id', '$document', '$expire_date','$val')";

								if($conn->query($insert_images))
								{
									$done++;
									$_SESSION['message']="Record Add Successfully";
								}
								else
								{
									$done--;
								}
								$i++;
								$j++;
							}
						}
						else
						{
							mkdir("employee_image/$emp_id");

							foreach($_FILES['doc']['name'] as $key=>$val)
							{
								// echo $val;
								// $ext= pathinfo($val, PATHINFO_EXTENSION);
								//  $new_file = rand().".".$ext;
								 // array_push($images,$new_file);
								$file = "employee_image/$emp_id/".$val;			
			
								$expire_date = $_POST['expdata'][$i];

								 $document = $documentName[$j];			 

								move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file);

						 		$insert_images= "INSERT INTO doc (empId, DocumentName, DocumentExpiryDate, DocumentImage)VALUES ('$emp_id', '$document', '$expire_date','$val')";

								if($conn->query($insert_images))
								{
									$done++;
									$_SESSION['message']="Record Add Successfully";
								}
								else
								{
									$done--;
								}

								$i++;
								$j++;
							}

						}
						
						if($done > 0)
						{

							$to = $email;
							$subject = "Welcome";
							$message = <<<EOF
							<html>
							<body>
							<p>please click the link and upload the document</p>
							<a href="'http://localhost/DMS/employeeSendMail.php?id=$emp_id;" target="_blank">Click Here!!!</a>
							</body>
							</html>
							EOF;
							$headers = "Content-type: text/html\r\n";

							$mail = mail($to, $subject, $message, $headers);

							$_SESSION['massage']= time();
							echo "done";


						}	
						else{
							echo "failed";
						}


					}
					else
					{
						echo "failed"; 
					}	

				

				

				
			}

