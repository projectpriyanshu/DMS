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
 <?php
    if(isset($_GET['id']))
    {
        $select="SELECT * FROM employee Where id=".$_GET['id'];
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

<style>
    .borderless th, .borderless td
    {
        border: none;
    }
    .row{
        background: #fff;
        /*border-radius: 10px;*/
        padding: 2px;
    }
</style>

<script type="text/javascript" src="js/index.js"></script>
 	<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <h3 class="text-primary mb-4">Employee Details</h3>
 				
                <div class="row p-3">
                    <div class="col">
                        <h5 class="text-primary">Basic Information</h5>
                        <table class="table table-sm borderless w-100">
                            <tr>
                                <td class="w-25">First Name</td> 
                                <td class="w-25">Last Name</td>
                                <td class="w-25">Phone</td>
                                <td class="w-25">Personal Email</td>

                            </tr>
                            <tr>
                                <th class="pb-3 w-25"><?php echo $result['fname']; ?></th>
                                <th class="pb-3 w-25"><?php echo $result['lname']; ?></th>
                                <th class="pb-3 w-25"><?php echo 9936138329; ?></th>
                                <th class="pb-3 w-25"><?php echo $result['email']; ?></th>
                            </tr>
                            <tr>
                                <td class="w-25">Dath Of Birth</td> 
                                <td class="w-25">Gender</td>
                                <td class="w-25">Marital Status</td>
                            </tr>
                            <tr>
                                <th class="pb-3 w-25"><?php echo "12/05/1995" ?></th>
                                <th class="pb-3 w-25"><?php echo "Male" ?></th>
                                <th class="pb-3 w-25"><?php echo "Married"; ?></th>
                           </tr>
                        </table>
                    </div>
                </div>


                <div class="row p-3">
                    <div class="col">
                        <h5 class="text-primary">Employee Information</h5>
                        <table class="table table-sm borderless w-100">
                            <tr>
                                <td class="w-25">Employee Enrollment ID</td> 
                                <td class="w-25">Date of Joining</td>
                                <td class="w-25">Company Email</td>
                                <td class="w-25">Department</td>

                            </tr>
                            <tr>
                                <th class="pb-3 w-25"><?php echo $result['id']; ?></th>
                                <th class="pb-3 w-25"><?php echo $result['doj']; ?></th>
                                <th class="pb-3 w-25"><?php echo "anurag.s@rediansoft.com"; ?></th>
                                <th class="pb-3 w-25"><?php 
                                $sta = "SELECT * FROM jobrole WHERE job_id=" . $result['role'];
                                  $resSta = $conn->query($sta);
                                  while ($record = $resSta->fetch_assoc()) {
                                    echo $record['job_role'];
                                  }
                                 ?></th>
                            </tr>
                            <tr>
                                <td class="w-25">Reporting Employee</td> 
                                <td class="w-25">Type of Employee</td>
                            </tr>
                            <tr>
                                <th class="pb-3 w-25"><?php 
                                $sta = "SELECT * FROM manager WHERE id=" . $result['manager_id'];
                                  $resSta = $conn->query($sta);
                                  while ($record = $resSta->fetch_assoc()) {
                                    echo $record['first_name']." ".$record['last_name'];
                                  }
                                 
                                 ?></th>
                                <th class="pb-3 w-25"><?php echo "Full Time";
                                   
                                 
                                 ?></th>
                           </tr>
                        </table>
                    </div>
                </div>


                <div class="row p-3">
                    <div class="col">
                        <h5 class="text-primary">Contact Information</h5>
                        <table class="table table-sm borderless w-100">
                            <tr>
                                <td class="w-25">Address Line 1</td> 
                                <td class="w-25">Address Line 2</td>
                                <td class="w-25">City</td>
                                <td class="w-25">State</td>
                            </tr>
                            <tr>
                                <th class="pb-3 w-25"><?php echo $result['address']; ?></th>
                                <th class="pb-3 w-25"><?php echo $result['address']; ?></th>
                                <th class="pb-3 w-25"><?php
                                 $sta = "SELECT * FROM cities WHERE id=" . $result['city'];
                                  $resSta = $conn->query($sta);
                                  while ($record = $resSta->fetch_assoc()) {
                                    echo $record['name'];
                                  }
                                  

                                 ?></th>
                                <th class="pb-3 w-25"><?php 
                                $sta = "SELECT * FROM states WHERE id=" . $result['state'];
                                  $resSta = $conn->query($sta);
                                  while ($record = $resSta->fetch_assoc()) {
                                    echo $record['name'];
                                  }
                                  ?></th>
                            </tr>
                            <tr>
                                <td class="w-25">Zip Code</td> 
                                <td class="w-25">Country</td>
                            </tr>
                            <tr>
                                <th class="pb-3 w-25"><?php echo $result['pincode']; ?></th>
                                <th class="pb-3 w-25"><?php 
                                $sta = "SELECT * FROM countries WHERE id=" . $result['country'];
                                  $resSta = $conn->query($sta);
                                  while ($record = $resSta->fetch_assoc()) {
                                    echo $record['name'];
                                  }
                                  ?></th>
                           </tr>
                        </table>
                    </div>
                </div>




                <div class="row p-3">
                    <div class="col" id="showData">
                        <h5 class="text-primary">Document</h5>
                        <?php 
                            
                            // $dir ='$id/';

                                $id = $result['id'];

                                $dir = "upload/$id/";


                                if(file_exists($dir))
                                {

                                 $a = array_diff( scandir($dir), array(".", "..") );

                                  
                                    foreach($a as $data)
                                    { ?>
                                    <div class="row ">
                                    <div class="col-3 align-self-center border m-3">
                                    <img  width="100%" height="auto" src="<?php echo $dir.$data ?>">
                                    <a class="btn btn-sm btn-primary" href="<?php echo $dir.$data ?>" download role="button">Download</a>
                                    <!-- <button id="delete" data="<?php echo $dir.$data ?>" class="btn btn-sm btn-danger">Delete</button> -->
                                    </div>
                                    </div>
                                    <?php
                                    }
                                }                                

                         ?>
                    </div>
                </div>
 			</div>
 		</div>
 	</div>

    <script>

    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

