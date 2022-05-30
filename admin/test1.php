<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php 

	if(empty($_POST['name'])) 
	{
		echo 0;
	}
	else
	{
		echo $_POST['name'];
	}

 ?>
	<form action="test1.php" method="POST">
		<input type="checkbox" name="name" id="one" value="1">
		Active
		<input type="submit" name="">
	</form>

</body>
</html>