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

<script type="text/javascript" src="js/index.js"></script>
 	<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <h3>Employee Form</h3>
 				<form action="" method="POST" id="update_form">
 					<div class="row mb-3">
                        <input type="text" id="emp_id" name="id" value="<?php echo $result['id'];  ?>" hidden>
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <span class="fnameErr"></span>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $result['fname'];?>" />
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <span class="lnameErr"></span>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo $result['lname'];?>" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Email</label>
                            <span class="emailErr"></span>
                            <input type="email" name="email" id="email" class="form-control"  placeholder="Email" value="<?php echo $result['email'];?>" />
                        </div>
                        <div class="col">
                            <label class="form-label">Date Of Join</label>
                            <span class="dojErr"></span>
                            <input type="date" name="doj" id="doj" class="form-control" value="<?php echo $result['doj'];?>"/>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Job Role</label>
                            <span class="jobroleErr"></span>
                            <select class="form-control" name="jobrole" id="jobrole">
                                <option value="<?php echo $result['role'];?>"><?php 
                                              echo $result['role'];
                                            ?></option>
                                    <?php

                                    $check_pass = "SELECT * FROM jobrole";
                                        $res_pass = $conn->query($check_pass);
                                        if($res_pass->num_rows != 0)
                                        { 
                                            foreach($res_pass as $value)
                                            {
                                            ?>
                                                <option value="<?php echo $value['job_id'];?>" <?php 
                                                if($result['role']== $value['job_id']){ echo'selected';} ?>>
                                                    <?php echo $value['job_role']; ?></option>
                                            <?php
                                            }                             
                                        } 
                                        
                                    ?>
                                </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Address</label>
                            <span class="addressErr"></span>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="<?php echo $result['address'];?>" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                                <label for="exampleFormControlSelect1">Country</label>
                                <span class="countryErr"></span>
							    <select class="form-control" id="country"  name="country">
                                     <!-- <option value="<?php// echo $result['country'];?>"></option> -->
                                <option value="Select Country">Select Country</option>
							     		<?php

                                $check_pass = "SELECT id,name FROM countries";
                                    $res_pass = $conn->query($check_pass);
                                    if($res_pass->num_rows != 0)
                                    { 
                                        foreach($res_pass as $value)
                                        {
                                        ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($result['country'] == $value['id']){echo'selected';} ?> ><?php echo $value['name']; ?></option>
                                        <?php
                                        
                                        }                  
                                        
                                    } 
                                    
                                ?>
							    </select>
                       </div>
                        <div class="col">
                            <label for="state">State</label>
                            <span class="stateErr"></span>
                                <select class="form-control" id="state" name="state">
                                    <option value="<?php echo $result['state'];?>"><?php
                                        
                                         
                                            $select = "SELECT * FROM states where id =".$result['state'];

                                            $report = $conn->query($select);

                                            // print_r($report);

                                            while($state= $report->fetch_assoc())
                                            {
                                                 if($state['id'] == $result['state'])
                                                 {
                                                    echo $state['name'];
                                                 }
                                                
                                            }


                                         ?>


                                    </option>
                                </select>
                        </div>

                        <div class="col">
                            <label for="city">City</label>
                            <span class="cityErr"></span>
                            <select class="form-control" id="city" name="city">
                                <option value="<?php echo $result['city'];?>"><?php

                                       $select = "SELECT * FROM cities where id =".$result['city'];

                                            $report = $conn->query($select);

                                            // print_r($report);

                                            while($city= $report->fetch_assoc())
                                            {
                                                 if($city['id'] == $result['city'])
                                                 {
                                                    echo $city['name'];
                                                 }
                                                
                                            }

                                ?></option>
                            </select>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col">
                             <label class="form-label">Pin Code</label>
                             <span class="pinErr"></span>
                            <input type="text" name="pincode" id="pincode" class="form-control"  placeholder="Pin Code" maxlength="6" size="6"
                            value="<?php echo $result['pincode']; ?>" />
                        </div>
                        <div class="col">
                             <label class="form-label">Status</label>
                            <div class=" ml-4">
                          <input class="form-check-input" type="checkbox" name="status" id="status" <?php if($result['status'] == '1'){echo "checked";} else{echo "unchecked";} ?> /> Active
                          </div>
                        </div>
                    </div> 

                    <div class="row mt-3">
                            <div class="col-6">
                                <label>Document</label>
                                <input type="file" id="file_data"  name="image" class="form-control" multiple>
                            </div>
                    </div>

                    <div class="mt-4">
                    <input type="submit" id="update"  class="btn btn-danger" value="+ Update" name="submit">
                    <a href="admin.php" class="btn btn-secondary float-right">X Cancle</a>
                    </div>
 				</form>
                <div class="row p-3">
                    <div class="col" id="showData">
                        <h5 class="text-primary">Document</h5>
                        <?php 
                            
                            // $dir ='$id/';

                                $id = $result['id'];

                                $dir = "upload/$id/";


                                if(file_exists($dir))
                                {

                                    // $a= scandir($dir);
                                 $a = array_diff( scandir($dir), array(".", "..") );
                                    foreach($a as $data)
                                    { ?>
                                    <div class="row ">
                                    <div class="col-3 align-self-center border m-3">
                                    <img  width="100%" height="auto" src="<?php echo $dir.$data ?>">
                                    <a class="btn btn-sm btn-primary" href="<?php echo $dir.$data ?>" download role="button">Download</a>
                                    <!-- <button id="delete" data-path="<?php echo $dir.$data ?>" class="btn btn-sm btn-danger">Delete</button> -->
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
