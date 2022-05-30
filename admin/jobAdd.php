<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php';
 ?>
<style>
    span{
        color: blue;
        font-weight: bold;
    }

</style>

<script type="text/javascript" src="js/resta.js"></script>
<body>
<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <div class="row justify-content-center">
                    <div class="col-5 align-self-center">
                    <h4>Job Role Forms</h4>
                    <form id="jobrole" class="form-group">
                        <div class="mt-3">
                            <label>Job Role</label>
                            <span class="error"></span>
                            <input type="text" id="role_name" name="job-role-name" class="form-control" placeholder="JOB ROLE">
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="+ Save" class="btn btn-danger">
                            <input type="reset" value="X Reset" class="btn btn-secondary float-right">
                        </div>
                    </form>
 				</div>
                <div class="col-5 align-self-center">
                    <img src="../images/Job-Work-Image.png" class="img-fluid">
                </div>
                </div>

 			</div>
 		</div>
 	</div>

    <script>
   
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
