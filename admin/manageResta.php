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
      <h1>RESTAURANT</h1>
      <a href="addResta.php" class="btn btn-primary mb-3 float-right">+Add Restaurant</a>

      <table id="myTable" class="table table-success">
        <thead>
          <tr>
            <th>ID</th>
            <th>Restaurant Name</th>
            <th>Address</th>
            <th>Country</th>
            <th>status</th>
            <th>City</th>
            <th>Pin Code</th>
            <th>Status</th>
          </tr>
        </thead>


        <tbody>
        <?php
        

        $select = "SELECT * FROM resta";
        $result = $conn->query($select);

        while ($row = $result->fetch_assoc()) {
        ?>
          
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['resta_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
              <?php
              $ctr = "SELECT * FROM countries WHERE id=" . $row['country'];
              $resCtr = $conn->query($ctr);
              while ($record = $resCtr->fetch_assoc()) {
                echo $record['name'];
              }
              ?>
            </td>
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
            <td><?php echo $row['pin_code']; ?></td>
            <td><?php $check = $row['status'];
                if ($check == 1) {
                  echo "<span><i class='fas fa-check-circle text-success'></i></span>";
                } else {
                  echo "<span><i class='fas fa-times-circle text-danger'></i></span>";
                }

                ?>

              | <a href="restaEdit.php?id=<?php echo $row['id']; ?>"><i title="Edit" class="fas fa-edit"></i></a>
              | <a href="restaDelete.php?id=<?php echo $row['id']; ?>"><i title="Delete" class="far fa-trash-alt text-danger"></i></a>
              | <a class=" ml-1" href="RestaDoc.php?id=<?php echo $row['id']; ?>"><i title="View" class="far fa-eye"></i></a>
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