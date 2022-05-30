
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>DMS Project</title>
  <?php include('includes/cdn.php'); ?>
  
  <?php include('includes/sidebar.php'); ?>
  
<nav class="navbar navbar-expand-lg  navbar-dark fixed-top" style="background-color: #8b0a50;">

<a href="admin.php" class="navbar-brand ml-4">BRAND</a>
        
        <button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#slider">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="slider">
            <ul class="navbar-nav ml-auto mr-5">
                
                 <li class="nav-item dropdown active mr-4"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Welcome Admin <?php echo $_SESSION['email']; ?> </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Change Password</a>
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>

                </li>
            </ul>
        </div>

    </nav>


<div class="content-container">

  <div class="container-fluid">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Navbar example</h1>
      <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
      <p>To see the difference between static and fixed top navbars, just scroll.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
      </p>
    </div>
  </div>
</div>


</body>
</html>