
<nav class="navbar navbar-expand-lg  navbar-dark fixed-top" style="background-color: #003147;">

<a href="admin.php" class="navbar-brand ml-4">DMS</a>
        
        <button type="button" class="navbar-toggler ml-auto" data-toggle="collapse" data-target="#slider">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="slider">
            <ul class="navbar-nav ml-auto mr-5">
                
                 <li class="nav-item dropdown active mr-4"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?> <i class="fas fa-user"></i></a>
                    <div class="dropdown-menu">
                        <a href="changePass.php" class="dropdown-item"><i class="fas fa-unlock-alt"></i> Change Password</a>
                        <a href="logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>

                </li>
            </ul>
        </div>

    </nav>
