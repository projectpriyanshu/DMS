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
      <h1>JOB PROFILE</h1>
      <a href="jobAdd.php" class="btn btn-primary mb-3 float-right">+Add Role</a>

      <table id="myTable" class="table table-success">
        <thead>
          <tr>
            <th>ID</th>
            <th>Job Role</th>
            <th>Status</th>
          </tr>
        </thead>


        <tbody>
        <?php
        

        $select = "SELECT * FROM jobrole";
        $result = $conn->query($select);

        while ($row = $result->fetch_assoc()) {
        ?>
          
          <tr>
            <td><?php echo $row['job_id']; ?></td>
            <td><?php echo $row['job_role']; ?></td>
            <td><?php $check = $row['job_status'];
                if ($check == 1) {
                  echo "<span><i class='fas fa-check-circle text-success'></i></span>";
                } else {
                  echo "<span><i class='fas fa-times-circle text-danger'></i></span>";
                }

                ?>

              | <a href="jobAddEdit.php?id=<?php echo $row['job_id']; ?>"><i title="Edit" class="fas fa-edit"></i></a>
              | <a href="jobDelete.php?id=<?php echo $row['job_id']; ?>"><i title="Delete" class="far fa-trash-alt text-danger"></i></a>
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