<?php 
	
	
include('../includes/connection.php');

	if(empty($_POST['status']))
	{
		$status=0;
	}
	else
	{
		$status=1;
	}


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
	else if(empty($_POST['pass']))
	{	
		echo "Password is Required !";
	}
	else if($_POST['rname'] == "Select Restaurant")
	{
		echo"Restaurant Required !";
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
		$pass=md5($_POST['pass']);

		 $rname=$_POST['rname'];
		 
		 $address=$_POST['address'];
		 $country=$_POST['country'];
		 $state=$_POST['state'];
		 $city=$_POST['city'];
		 $pincode=$_POST['pincode'];


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


			$check_resta="SELECT email FROM manager Where email='$email'";
			$response= $conn->query($check_resta);
			if($response -> num_rows > 0 )
			{
				 echo "Manager is already Exist";
			}
			else
			{
				$insert_data="INSERT INTO manager VALUES('','$fname','$lname','$email','$pass','$rname','$address','$country','$state','$city','$pincode','$status')";
				if($conn->query($insert_data))
				{
					echo "Success";
				}
				else
				{
					echo "faild";
				}	
			}

		
	}
 ?>