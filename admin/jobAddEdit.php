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
<?php
   
    if(isset($_GET['id']))
    {
        $select="SELECT * FROM jobrole Where job_id=".$_GET['id'];
        $response =$conn->query($select);
        if($response-> num_rows != 0)
        {
            foreach($response as $val)
            {
                $result = $val;
            }
        }
    }
?>

<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <div class="row justify-content-center">
                    <div class="col-5 align-self-center">
                    <h4>Job Role Forms</h4>
                    <form id="jobrole_update" class="form-group">
                        <div class="mt-3">
                            <label>Job ID</label>
                            <input type="text" id="id" name="id" class="form-control" value="<?php echo $result['job_id'] ?>" disabled >
                        </div>
                        <div class="mt-3">
                            <label>Job Role</label>
                            <span class="error"></span>
                            <input type="text" id="role_name" name="job-role-name" class="form-control" value="<?php echo $result['job_role'] ?>">

                            <input type="text" id="role_name_dummy" name="job-role-name" class="form-control d-none" value="<?php echo $result['job_role'] ?>">

                        </div>
                        <div class="mt-3">
                             <label class="form-label">Status</label>
                            <div class=" ml-4">
                           <input class="form-check-input" id="status" type="checkbox" <?php if($result['job_status'] == '1'){echo "checked";} else{echo "unchecked";} ?>/> Active
                          </div>
                        </div>

                        <div class="mt-3">
                            <input type="submit" value="+ Update" class="btn btn-danger">
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
