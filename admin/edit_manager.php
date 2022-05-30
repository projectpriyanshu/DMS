<?php
//save data in database
include('../includes/connection.php');
 $status = "";
 $fname = $lname = $email = $password =  $address =  $rest_name = $country = $state = $city = $post_code = "";
 $data=1;
 $error = "";
 $id = "";
     
if($_SERVER['REQUEST_METHOD'] =="POST")
{
	$id = $_POST['id'];


  

  // $status = $_POST['status'];

  if(empty($_POST["fname"])) 
  {
      $error = "First Name Required";
      $data=0;
  } 
  else{
          $fname = $_POST["fname"];
      }

  if(empty($_POST["lname"])) 
  {
      $error = "Last Name Required";
      $data=0;
  } 
  else{
          $lname = $_POST["lname"];
      }

  if(empty($_POST["email"])) 
  {
      $error = "Email Required";
      $data=0;
  } 
  else{
          $email = $_POST["email"];
      }

  

if(empty($_POST["address"])) 
  {
      $error = "address Required";
      $data=0;
  } 
  else{
          $address = $_POST["address"];
      }

  if(empty($_POST["restaurant"])) 
  {
      $error = "Restaurant Required";
      $data=0;
  } 
  else{
          $rest_name = $_POST["restaurant"];
      }

  if($_POST["country"] == "Select Country") 
  {
      $error = "country Required";
      $data=0;
  } 
  else{
          $country = $_POST["country"];
      }

if($_POST["state"] == "Select State") 
  {
      $error = "state Required";
      $data=0;
  } 
  else{
          $state = $_POST["state"];
      }


if($_POST["city"] == "Select City") 
  {
      $error = "City Required";
      $data=0;
  } 
  else{
          $city = $_POST["city"];
      }

if(empty($_POST["post_code"])) 
  {
      $error = "post code Required";
      $data=0;
  } 
  else{
          $post_code = $_POST["post_code"];
      }

  if($data == 0)
  {
    echo $error;
  }      



  if($data==1)
  {
    
     if(empty($_POST["status"])) 
      {
         $status = 0;
      } 
      else{
           $status = 1;
        } 
       
      // $ctr = "SELECT name FROM countries WHERE id = '$country'";
      // $res = $conn->query($ctr);
      // while($rec = $res->fetch_assoc()) 
      // {
      //   $country = $rec['name'];
      // }

      // $sta = "SELECT name FROM states WHERE id = '$state'";
      // $res = $conn->query($sta);

      // while ($rec = $res->fetch_assoc()) 
      // {
      //   $state = $rec['name'];
      // }
      // $cit = "SELECT name FROM cities WHERE id = '$city'";
      // $res = $conn->query($cit);
      // while ($rec = $res->fetch_assoc()) 
      // {
      //   $city = $rec['name'];
      // }
     
			$update = "UPDATE manager SET first_name='$fname', last_name = '$lname', email = '$email', Resta_name = '$rest_name', adddress = '$address', country = '$country', states = '$state', city = '$city', pin_code = '$post_code', status = '$status' WHERE id='$id'";

                if($conn->query($update))
                {
                   
                    echo "Success";
                }
                else{
                   
                    echo "Failed !";
                }

     }

 }
              
 
?>