<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <?php include('includes/cdn.php'); ?>
  <title>Welcome</title>
</head>
<body>
     <?php  include('includes/sidebar.php');
         include('includes/adminMenu.php');
   ?>
  
<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>DASHBOARD</h1>
        <div class="row text-white ">
            <div class="col-md-4 mb-3 ">
                <div class="card bg-success mb-3 ">
                    <div class="card-header"><h5>Total Employee</h5></div>
                    <div  class="card-body">
                       <?php 
                     

                        $total = "SELECT count(*) From employee";
                        $result=$conn->query($total);
                          
                          foreach($result as $val)
                          {
                            echo "<h1>".$val['count(*)']."</h1>";
                          }

                       ?>
                    </div>
                </div>
        </div>
        
        <div class="col-md-4 mb-3 ">
                <div class="card bg-danger mb-3 ">
                <div class="card-header"><h5>Managers</h5></div>
                <div  class="card-body">
                   <?php 
                  

                    $total = "SELECT count(*) From employee where emp_profile=6";
                    $result=$conn->query($total);
                      
                      foreach($result as $val)
                      {
                        echo "<h1>".$val['count(*)']."</h1>";
                      }

                   ?>
                </div>
            </div>
        </div>
        </div>
        <div class="row text-white">
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
                 

                    $total = "SELECT count(*) From employee where emp_profile=".$valRole['job_id'];
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
    </div>
  </div>
</div>


</body>
</html>




