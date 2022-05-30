<?php 
	session_start();

	include('../includes/connection.php');
	$status = $_POST['status'];
	

	if(empty($_POST['fname']))
	{
		echo "First Name Required !";
	}
	else if(empty($_POST['lname']))
	{
		echo "Last Name is Required !";
	}
	else if(empty($_POST['email']))
	{	
		echo "Email Required !";
	}
	else if(empty($_POST['doj']))
	{	
		echo "Date Of Join is Required !";
	}
	else if($_POST['jobrole'] == "Select Job Role")
	{
		echo"Job Role Required !";
	}
	else if(empty($_POST['address']))
	{
		echo "Address Required !";
	}
	else if($_POST['country'] == "Select Country")
	{
		echo "Country Required !";
	}
	else if($_POST['state'] == "Select State")
	{
		echo "State Required !";
	}
	else if($_POST['city'] == "Select City")
	{
		echo "City Required !";
	}
	elseif (empty($_POST['pincode']))
	{
		echo "Pin Code Required !";
	}
	else
	{
		
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
		$manager_id = $_SESSION['id'];


		 // $ctr = "SELECT * FROM countries WHERE id=".$country;
			// $resCtr=$conn->query($ctr);
			// while ($record = $resCtr->fetch_assoc()){
			// 	 $country_name= $record['name'];
			// }

			// $sta = "SELECT * FROM states WHERE id=".$state;
			// $resSta=$conn->query($sta);
			// while ($record = $resSta->fetch_assoc()){
			// 	 $state_name= $record['name'];
			// }

			// $ct = "SELECT * FROM cities WHERE id=".$city;
			// $resCt=$conn->query($ct);
			// while ($record = $resCt->fetch_assoc()){
			// 	 $city_name= $record['name'];
			// }


			$check_resta="SELECT email FROM employee Where email='$email'";
			$response= $conn->query($check_resta);
			if($response -> num_rows > 0 )
			{
				 echo "Employee is already Exist";
			}
			else
			{
				$insert_data="INSERT INTO employee VALUES('','$fname','$lname','$email','$role','$doj','$address','$country','$state','$city','$manager_id','$pincode','$status')";
				if($conn->query($insert_data))
				{
					$select_last ="SELECT id FROM employee ORDER BY id DESC LIMIT 1";
					$result = $conn->query($select_last);
					
						foreach($result as $id)
						{
							// echo "Success";
							$emp_id = $id['id'];
							echo $emp_id;
						}
					
					// echo "<a href='documentUpload.php'>Click</a>";
				}
					
			}

		
	}
 ?>

