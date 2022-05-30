<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php'; ?>

<script src="../js/datatables.js"></script>
<link href="../css/datatables.css" rel="stylesheet">

<div class="content-container">
<script>
    $(document).ready(function() {
      $("#myTable").dataTable();
    });
  </script>
  <div class="container-fluid mt-5">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      	<a href="addManager.php" class="btn btn-primary float-right mb-3">+Add Manager</a>
      	<table class="table table-dark text-dark" id="myTable">
      		<thead class="text-light">
          <tr>
            <th>ID</th>
          <th>Manager Name</th>
          <!-- <th>Last Name</th> -->
          <!-- <th>Email</th> -->
          <th>Resta Name</th>
          <th>Address</th>
          <th>Country</th>
          <th>State</th>
          <th>City</th>
          <th>Pin Code</th>
          <th>Status</th>
  
          </tr>  
          </thead>
          
          <?php 
             
                $select="SELECT * FROM manager";
                $result=$conn->query($select);

                while($row = $result->fetch_assoc())
                {
                  ?>
                  <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                  <!-- <td><?php //echo $row['email']; ?></td> -->
                  <td>
                    <?php 
                      $ctr = "SELECT * FROM resta WHERE id=".$row['Resta_name'];
                      $resCtr=$conn->query($ctr);
                      while ($record = $resCtr->fetch_assoc()){
                        echo $record['resta_name'];
                      }
                     ?>
                  </td>
                  <td><?php echo $row['adddress']; ?></td>
                  <td>
                    <?php 
                      $ctr = "SELECT * FROM countries WHERE id=".$row['country'];
                      $resCtr=$conn->query($ctr);
                      while ($record = $resCtr->fetch_assoc()){
                        echo $record['name'];
                      }
                     ?>
                  </td>
                  <td>
                    <?php 
                      $sta = "SELECT * FROM states WHERE id=".$row['states'];
                      $resSta=$conn->query($sta);
                      while ($record = $resSta->fetch_assoc()){
                       echo $record['name'];
                      }
                   ?>
                  </td>
                  <td>
                    <?php 

                    $ct = "SELECT * FROM cities WHERE id=".$row['city'];
                    $resCt=$conn->query($ct);
                    while ($record = $resCt->fetch_assoc()){
                     echo $record['name'];
                    }
                  ?>
                  </td>
                  <td><?php echo $row['pin_code']; ?></td>
                  <td><?php $check= $row['status']; 
                    if($check ==1)
                    {
                        echo "<span><i class='fas fa-check-circle text-success'></i></span>";
                    }
                    else
                    {
                      echo "<span><i class='fas fa-times-circle text-danger'></i></span>";                    }

                  ?>
                  
                  | <a href="managerEdit.php?id=<?php echo $row['id']; ?>"><i title="Edit" class="fas fa-edit"></i></a>
                  | <a href="managerDelete.php?id=<?php echo $row['id']; ?>"><i title="Delete" class="far fa-trash-alt text-danger"></i></a>
                  </td>
                  </tr>

                  <?php
                }
             ?>
      	</table>
    </div>
  </div>
</div>
