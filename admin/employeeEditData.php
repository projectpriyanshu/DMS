<?php 

include('../includes/connection.php');
 $social=$data=$policy=$status="";
	 $user_name ="";
	$password = "";

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
			   $policy = 0;
		}
		else
		{
			 $policy = 1;
		}

		if(empty($_POST['status']))
		{
			   $status = 0;
		}
		else
		{
			 $status = 1;
		}

		$id = $_POST["id"];
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

			// print_r($docId);

			
		

		$documentName = array("New Starter Form","BRP","ECS","Driving Licence","Car Insurance","Car Tax","MOT","Other Document"); 	
		 	
		$done =1;

		 $update_data = "UPDATE employee SET emp_name='$emp_name', emp_profile='$emp_profile', user_name='$user_name', password='$password', restaurant='$restaurant', date_of_birth='$date_of_birth', email='$email', contact='$contact',doj='$doj', address='$address',country='$country', state='$state',city='$city', pincode='$pincode',status='$status', social_media='$social', data_protection='$data', privacy_policy='$policy', passport_number='$passport', passport_expire='$passport_exp'  WHERE id ='$id'";

		if($conn->query($update_data))
		{	
				
				// if(isset($_POST['doc']) == )
				// 	{
				// 		echo "empty";
				// 	}
				// 	else
				// 	{
				// 		echo "update";
				// 	}



			



			if(file_exists("employee_image/$id"))
			{
				$i=1;
				$j=0;
				// print_r($docId[]);
				foreach($_FILES['doc']['name'] as $key=>$val)
				{
					
					if($val != "")
					{
						
						$file = "employee_image/$id/".$val;			

					$expire_date = $_POST['expdata'][$i];
					
					 $document = $documentName[$j];

					     move_uploaded_file($_FILES['doc']['tmp_name'][$key], $file);
						   $Update_doc= "UPDATE doc SET DocumentExpiryDate='$expire_date', DocumentImage='$val' where empId='$id' and DocumentName='$document'";
					  	


						if($conn->query($Update_doc))
						{
							$done++;
							// $_SESSION['message']="Record Add Successfully";
						}
						else
						{
							$done--;
						}
					}
					


					
					$i++;
					$j++;
				}
				

				
			}
			if($done > 0)
			{
				echo "done";
			}	
			else{
				echo "faild";
			}
		}
		else
		{
			echo "Employee Info not update";
		}


		
				 		

		 		

 ?>