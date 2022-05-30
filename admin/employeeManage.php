<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php'; ?>

<script src="../js/datatables.js"></script>
<link href="./css/datatables.css" rel="stylesheet">

<div class="content-container">

  <script>
    $(document).ready(function() {
      $("#myTable").dataTable();
    });
  </script>

  <div class="container-fluid mt-5">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>EMPLOYEE</h1>
      <?php 

        if(isset($_SESSION['massage']))
        {
           if (time() - $_SESSION['massage'] < 5)
            {
                echo "<p class='text-danger'>Record add successfull submited pleace check email and upload documents</p>";
            } 
            else
            {
              unset($_SESSION['massage']);
            } 
        }
         
       ?>
      <a href="employeeAdd.php" class="btn btn-primary mb-3 float-right">+Add Employee</a>
        
      <table class="table  table-success" id="myTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Employee Name</th>
              <!-- <th>Manager</th> -->
              <th>Job Role</th>
              <th>DOJ</th>
              <th>Address</th>
              <th>Country</th>
              <th>State</th>
              <th>City</th>
              <!-- <th>Pin Code</th> -->
              <th>Status</th>
              </tr>
          </thead>
          <tbody>
          <?php
         
          // $id = $_SESSION['id'];


                $query = "SELECT *FROM employee WHERE is_delete ='0'";

                $response = $conn->query($query);
    
              
          while ($row = $response->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['emp_name']; ?></td>
              <!-- <td>
                <?php
                // echo $row['manager_id'];
                // $manager_select = "SELECT * FROM manager WHERE id=" . $row['manager_id'];
                // $result = $conn->query($manager_select);
                // while ($manager = $result->fetch_assoc()) {
                //   echo $manager['first_name']." ".$manager['last_name'];
                // }
                ?>
              </td> -->
              <td>
                <?php
                $job_select = "SELECT * FROM jobrole WHERE job_id=" . $row['emp_profile'];
                $result = $conn->query($job_select);
                while ($job_name = $result->fetch_assoc()) {
                  echo $job_name['job_role'];
                }
                ?>
              </td>
              <td><?php echo $row['doj']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php
                  $ctr = "SELECT * FROM countries WHERE id=" . $row['country'];
                  $resCtr = $conn->query($ctr);
                  while ($record = $resCtr->fetch_assoc()) {
                    echo $record['name'];
                  }
                  ?></td>
              <td><?php
                  $sta = "SELECT * FROM states WHERE id=" . $row['state'];
                  $resSta = $conn->query($sta);
                  while ($record = $resSta->fetch_assoc()) {
                    echo $record['name'];
                  }
                  ?></td>
              <td><?php
                  $ct = "SELECT * FROM cities WHERE id=" . $row['city'];
                  $resCt = $conn->query($ct);
                  while ($record = $resCt->fetch_assoc()) {
                    echo $record['name'];
                  }
                  ?></td>
              <!-- <td><?php //echo $row['pincode']; ?></td> -->
              <td class="d-flex"><?php $check = $row['status'];
                  if ($check == 1) {
                    echo "<span><i class='fas fa-check-circle text-success'></i></span>";
                  } else {
                    echo "<span><i class='fas fa-times-circle text-danger'></i></span>";
                  }

                  ?>
                 | <a class=" ml-1" href="employeeEdit.php?id=<?php echo $row['id']; ?>"><i title="Edit" class="fas fa-edit"></i></a>
                | <a class=" ml-1" href="employeeDelete.php?id=<?php echo $row['id']; ?>"><i title="Delete" class="far fa-trash-alt text-danger"></i></a> |
                  <a class=" ml-1" href="employeeDoc.php?id=<?php echo $row['id']; ?>"><i title="View" class="far fa-eye"></i></a>
              </td>

            </tr>
          <?php
          }

          ?>
          </tbody>
        </table>

    </div>
  </div>
</div>