<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>manager login</title>
     <style>
        
.container-fluid
{
    position: absolute;
    top: 50%;
    left: 0%;
    transform: translateY(-50%);
}
.welcome-form-input:focus
{
    box-shadow: none !important;
}
    </style>
</head>
<body onload="getfocus()">
    <?php include 'includes/cdn.php'; 


    $userErr = $passErr = '';

    if (isset($_POST['login'])) {

        $user = strtolower($_POST['user']);
        $pass = md5($_POST['pass']);

        $select_data = "SELECT * FROM manager WHERE email='$user' AND pass='$pass'";

        $check_data = $conn->query($select_data);

        // print_r($check_data);

        if ($check_data->num_rows != 0) {

            foreach($check_data as $val)
            {
                $_SESSION['email']=$val['email'];
                $_SESSION['id']=$val['id'];
                $_SESSION['managerId']=$val['id'];
                $_SESSION['firstname']=$val['first_name'];
                $_SESSION['lastname']=$val['last_name'];


            }

                echo "<script>alert('Login successfully');</script>";
                header("location:admin.php");
                // echo "Login Success";
        } else {
            $userErr = "Someting Wrong";
        }
    }   

?>

        <div class="container-fluid">
        
            <div class="row justify-content-center ">

                <div class="col-4 p-4" id="login">
                    <div class="text-center"><img src="../images/logo.png" class="img-fluid" width="50%" >
                    <h3 class="login">DOCUMENT MANAGEMENT SYSTEM</h3>
                    </div>
                    <i><?php echo $userErr; ?></i>
                    <form action="login.php" method="POST">
                        <div class="pt-3">
                            <label for="username" class="form-label">User Name</label>
                            <input id="loginin" type="text" name="user" class="form-control welcome-form-input" placeholder="Username">
                        </div>

                        <div class="mt-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control welcome-form-input" placeholder="Password">
                        </div>


                        <div class="mt-3">
                            <button type="submit" name="login" class="btn btn-primary" value="Login"><i class="fas fa-fingerprint"></i> Login</button>
                            <!-- <input type="reset" name="reset" class="btn btn-info float-right"> -->
                            <button type="reset" class="btn btn-primary float-right"><i class="fas fa-trash-restore-alt"></i> Reset</button>
                        </div>
                        <div class="mt-3">
                        </div>
                            <div class="mt-3">
                            <a href="forgotpass.php">Forgot Password</a>
                       </div>
                    </form>
                </div>

              

            </div>
        </div>
    </div>
<script>
function getfocus() {
  document.getElementById("loginin").focus();
}
</script>
</body>
</html>