<?php
if(!isset($_SESSION['id'])){
  header("location:login.php");

}
?>
<body>

  <div class="sidebar-container mt-5 ">
  <!-- <div class="sidebar-logo">
    Project Name
  </div> -->
  <ul class="sidebar-navigation mt-3">
    <!-- <li class="header">Navigation</li> -->
    <li>
      <a href="admin.php">
        <i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard
      </a>
    </li>
    <!-- <li class="header">Another Menu</li> -->
    <!-- <li>
      <a href="manageManager.php">
        <i class="fa fa-users" aria-hidden="true"></i> Manage Manager
      </a>
    </li> -->
    <li>
      <a href="manageResta.php">
        <i class="fa fa-utensils" aria-hidden="true"></i> Manage Restaurant
      </a>
    </li>
    <li>
      <a href="employeeManage.php">
        <i class="fa fa-users" aria-hidden="true"></i> Manage Employee
      </a>
    </li>
    <li>
      <a href="jobRole.php">
        <i class="fab fa-accusoft" aria-hidden="true"></i> Manage Roles
      </a>
    </li>
    
  </ul>
</div>

 