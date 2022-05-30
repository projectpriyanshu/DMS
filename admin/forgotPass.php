<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>
<?php include('includes/cdn.php'); ?>
</head>
<body>
<?php 



$emailErr='';
if(isset($_POST['submit']))
{
	$user = $_POST['user'];
	
	$select="SELECT email from administrator where email='$user'";

	$check=$conn->query($select);
	if($check-> num_rows !=0)
	{
		foreach($check as $val)
		{
			$_SESSION['username']= $val['email'];
		}
		header('location:pass_forgot.php');

	}
	else
	{
		$emailErr = "Email is Not Found";
	}
}

?>

  		<div class="row justify-content-center mt-5">
  			<div class="col-4">
  					<div class="card login-form">
					<div class="card-body">
						<h3 class="card-title text-center">Reset password</h3>
						
						<div class="card-text">
							<form method="POST" class="p-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Enter your email address and we will send you a link to reset your password.</label>
									<input type="email" name="user" class="form-control" placeholder="Enter your email address">
									<i><?php echo $emailErr;?></i>
								</div>

								<button type="submit" name="submit" class="btn btn-primary ">Reset Password</button>
								<a  class="btn btn-secondary float-right" href="login.php">x Cancel</a>
							</form>
						</div>
					</div>
				</div>				
	</div>
	</div>
</body>
</html>