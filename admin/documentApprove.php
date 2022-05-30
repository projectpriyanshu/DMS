<?php 
	
	include('../includes/connection.php');
        $select="UPDATE doc SET documentStatus='1' Where id=".$_POST['id'];
        if($conn->query($select))
        {
        	echo "Done";
        }
        else
        {
        	echo "Faild";
        }
        


        


 ?>