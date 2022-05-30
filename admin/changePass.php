<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <?php include('cdn.php'); ?>
  <title></title>
</head>
<body>
     <?php include 'includes/sidebar.php';
    
include('../includes/connection.php');
include 'includes/adminMenu.php';

   ?>
  
    <?php 
    $error='';
    if(isset($_POST['change']))
    {
             

                    //$_SESSION['name'];
            $email = $_SESSION['email'];
            // $id = $_SESSION['id'];

        $old =md5($_POST['oldPass']);
        $new =md5($_POST['newPass']);
        $cnew =md5($_POST['conPass']);

        $select="SELECT password FROM administrator WHERE email='$email'";
        $check=$conn->query($select);
        if($check->num_rows !=0)
        {
            foreach($check as $val)
            {
                $old_pass = $val['password'];
            }
            if($old_pass==$old)
            {
                if($new == $cnew)
                {
                    $update="UPDATE administrator SET password='$new' WHERE email='$email'";

                    if($conn->query($update))
                    {
                       echo "<script>alert('Password Change Success');</script>";
                       header("location:admin.php");
                    }
                    else
                    {
                       $error = "Password does not change";
                    }

                }
                else{
                    $error= "Confirm password does not match";

                }
            }
            else
            {
                $error= "Old password does not match";
            }


        }


        
    }

     ?>


<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">

        <div class="row justify-content-center">

          <div class="col-5">
            <h4>Set a new password</h4>

            <span><?php echo $error; ?></span>
              <form action="changePass.php" method="POST">
                <div class="mt-3">
                    <label>Old password</label>
                  <input type="password" name="oldPass" class="form-control">
                  </div>

                   <div class="mt-3">
                    <label>New password</label>
                  <input type="password" name="newPass" class="form-control">
                  </div>

                <div class="mt-3">
                  <label>Confirm password</label>
                  <input type="password" name="conPass" class="form-control">
                </div>

                <div class="mt-3">
                <input type="submit" name="change" class="btn btn-primary" value="Change Password">
                <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                </div>

              </form>
          </div>
        </div>

      
    </div>
  </div>
</div>


</body>
</html>