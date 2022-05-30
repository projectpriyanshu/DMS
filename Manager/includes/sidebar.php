<?php
if(!isset($_SESSION['managerId'])){
  header("location:login.php");

}
?><link rel="stylesheet" type="text/css" href="CSS/style.css">

  <div class="sidebar-container mt-5 ">
  <!-- <div class="sidebar-logo">
    Project Name
  </div> -->
  <ul class="sidebar-navigation mt-3">
    <!-- <li class="header">Navigation</li> -->
    <!-- <li>
      <a href="#">
        <i class="fa fa-home" aria-hidden="true"></i> Homepage
      </a>
    </li> -->
    <li>
      <a href="admin.php">
        <i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard
      </a>
    </li>
    <!-- <li class="header">Another Menu</li> -->
    <li>
      <a href="employeeManage.php">
        <i class="fa fa-users" aria-hidden="true"></i> Manage Employee
      </a>
    </li>
    <!-- <li>
      <a href="#.php">
        <i class="fa fa-utensils" aria-hidden="true"></i> Manage Restaurant
      </a>
    </li> -->
    <!-- <li>
      <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> Settings
      </a>
    </li> -->
  </ul>
</div>


