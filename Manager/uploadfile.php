<?php 
	
	$id=$_POST['id'];
	

	if(file_exists("upload/$id"))
	{

		if($_FILES['image']['name'] != '')
		{
		 $fileName = $_FILES['image']['name'];
         $file_temp = $_FILES['image']['tmp_name'];

		$extension= pathinfo($fileName, PATHINFO_EXTENSION);

		$valid_ext = array("jpg","jpeg","png");

		if(in_array($extension, $valid_ext))
		{

				$new_file= rand().".".$extension;
				$path = "upload/$id/". $new_file;

              
				if(move_uploaded_file($file_temp, $path))
               {
                 	echo "File Upload Successful";
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
	else
	{
		echo "Please Select File";
	}

	}
	else
	{
		mkdir("upload/$id");
		if($_FILES['image']['name'] != '')
		{
		 $fileName = $_FILES['image']['name'];
         $file_temp = $_FILES['image']['tmp_name'];

		$extension= pathinfo($fileName, PATHINFO_EXTENSION);

		$valid_ext = array("jpg","jpeg","png");

		if(in_array($extension, $valid_ext))
		{

				$new_file= rand().".".$extension;
				$path = "upload/$id/". $new_file;

              
				if(move_uploaded_file($file_temp, $path))
               {
                 	echo "File Upload Successful";
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
	else
	{
		echo "Please Select File";
	}

}
	

 ?>
