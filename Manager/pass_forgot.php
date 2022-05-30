
<?php session_start();
 include 'includes/cdn.php';

$cpassErr='';
   

    $passErr = $cpassErr = '';
    
    $user = $_SESSION['username'];

    $status=1;
    
    if(isset($_POST['Forgot']))
    {
        $pass =md5($_POST['pass']);
        $cpass =md5($_POST['cpass']);

        if($pass == $cpass)
        {
            $update="UPDATE manager SET pass='$pass' WHERE email='$user'";
            if($conn->query($update))
            {
                // echo "password changed";

                echo "<script>window.alert('Password Change successfully');</script>";
                
            }
            else
            {
                // echo  "password dose not change";
                print "<script>window.alert('Password dose not Change ');</script>";

            }
            

        }

        else
        {
            $cpassErr = "Password does not match";
        }

    }

    ?>
<div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4 p-3" id="login" style="background-color: #ddd;">
                    <form action="pass_forgot.php" method="POST">
                        <div class="pt-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="pass" name="pass" class="form-control">
                        </div>

                        <div class="mt-3">
                            <label for="Password" class="form-label">Confirm Password</label>
                            <i><?php echo $cpassErr; ?></i>
                            <input type="password" name="cpass" class="form-control">
                        </div>

                        

                        <div class="mt-3">
                            <input type="submit" name="Forgot" class="btn btn-primary" value="Change">
                            <a class="btn btn-secondary float-right" href="login.php">x Cancle</a>

                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
