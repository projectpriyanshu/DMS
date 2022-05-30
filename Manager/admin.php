<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <?php include 'includes/cdn.php'; ?>
  <title>Admin</title>

</head>
<body onmouseenter="hello()">
     <?php 
        include 'includes/sidebar.php';
        include 'includes/adminMenu.php';
      
   ?>
  
<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">

                      <div class="row text-white">
          <div class="col-md-2 mb-3 ">
            <div class="card bg-success mb-3 ">
                <div class="card-header"><h5>Employee</h5></div>
                <div  class="card-body">
                   <?php 
                  
                    $id = $_SESSION['id'];  

                    $total = "SELECT count(*) From employee where manager_id='$id'";
                    $result=$conn->query($total);
                      foreach($result as $val)
                      {
                        echo "<h1> <small><i class='fas fa-users'></i></small> ".$val['count(*)']."</h1>";
                      }

                   ?>
                </div>
            </div>
        </div>

        <?php  $totalRole = "SELECT * From jobrole where job_status=1";
                    $resultRole=$conn->query($totalRole);
               if($resultRole->num_rows>0){ 
                 $i=1;
               
?><?php  foreach($resultRole as $valRole)  { 
        if($i%2==0){
          $bgClass="bg-primary";
        }else{
          $bgClass="bg-info";
        } ?>
      <div class="col-md-2 mb-3">
            <div class="card <?php echo $bgClass;?> mb-3 ">
                <div class="card-header"><h5><?php echo $valRole['job_role'];?></h5></div>
                <div  class="card-body">
                   <?php 
                 

                    $total = "SELECT count(*) From employee where role=".$valRole['job_id']." and manager_id='$id'";;
                    $result=$conn->query($total);
                      
                      foreach($result as $val)
                      {
                        echo "<h1>".$val['count(*)']."</h1>";
                      }

                   ?>
                </div>
            </div>
        </div>

      
        <?php
         $i++;
      }
     
      }?>

        
       


        

        
            

      </div>

      <div class="row">
        <div class="col-6">
					<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto; border: 1px solid none;"></div>      
        </div>
        <div class="col-6">
					<div id="circleContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>        
        </div>
      </div>

      <div class="row">
      	<div class="col">
					<div id="chartContainer2" class="mt-4 w-100" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
      			
      	</div>
      </div>
    </div>
  </div>
</div>


<script src="JS/canvasjs.min.js"></script>

<script>

$(document).ready(function () {

	function copyToClipboard() {

  var aux = document.createElement("input");
  aux.setAttribute("value", "print screen disabled!");      
  document.body.appendChild(aux);

  aux.select();
  document.execCommand("copy");
  // Remove it from the body
  document.body.removeChild(aux);
  alert("Print screen disabled!");
}

document.addEventListener("keyup", function (e) {
    var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                copyToClipboard();
            }
        });





});


</script>
</body>
</html>


