<?php 
session_start();
include('../includes/connection.php');
			 
echo $status = $_POST['status'];

    $id= $_POST['id'];	

	if(empty($_POST['rname']))
	{
		echo"Name Required !";

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
		 $rname=$_POST['rname'];
		 $address=$_POST['address'];
		 $country=$_POST['country'];
		 $state=$_POST['state'];
		 $city=$_POST['city'];
		 $pincode=$_POST['pincode'];
	

			$ctr = "SELECT * FROM countries WHERE id=".$country;
			$resCtr=$conn->query($ctr);
			while ($record = $resCtr->fetch_assoc()){
				  $country_name= $record['name'];
			}

			$sta = "SELECT * FROM states WHERE id=".$state;
			$resSta=$conn->query($sta);
			while ($record = $resSta->fetch_assoc()){
				$state_name= $record['name'];
			}

			$ct = "SELECT * FROM cities WHERE id=".$city;
			$resCt=$conn->query($ct);
			while ($record = $resCt->fetch_assoc()){
				$city_name= $record['name'];
			}

            echo "gdfkgj";
            $update = "UPDATE resta SET resta_name='$rname', address = '$address', country = '$country_name', state = '$state_name', city = '$city_name', pin_code = '$pincode', status = '$status' WHERE id='$id'";

                if($conn->query($update))
                {
                   
                    echo "Success !";
                }
                else{
                   
                    echo "Failed !";
                }

			
	}

 ?>