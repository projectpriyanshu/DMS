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
        $id = $_POST['id'];
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



              if($_FILES['image']['name'] == '')
              {
                   $update_data = "UPDATE resta SET resta_name='$rname', address='$address', country='$country', state='$state', city='$city', pin_code='$pincode', contact='$contact', temp_contact1='$contact1', temp_contact2='$contact2', email='$email', temp_email1='$email1',temp_email2='$email2', status='$status' WHERE id= '$id'";

                    if($conn->query($update_data))
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
                          
                          $update_data = "UPDATE resta SET resta_name='$rname', address='$address', country='$country', state='$state', city='$city', pin_code='$pincode', contact='$contact', temp_contact1='$contact1', temp_contact2='$contact2', email='$email', temp_email1='$email1',temp_email2='$email2',document='$new_file', status='$status' WHERE id= '$id'";

                    if($conn->query($update_data))
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



       

 ?>