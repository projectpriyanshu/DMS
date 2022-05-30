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
<script type="text/javascript" src="js/manager.js"></script>
<script type="text/javascript" src="js/resta.js"></script>
<?php
    if(isset($_GET['id']))
    {
        $select="SELECT * FROM manager Where id=".$_GET['id'];
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
 				<form action="" method="POST">
 					<div class="row mb-3">
                        <div class="col">
                        <input type="text" id="r_id" value="<?php echo $result['id'];?>" style="display: none;">

                            <label class="form-label">First Name</label>
                            <span class="fnameErr"></span>
                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $result['first_name'];?>" placeholder="First Name" />
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <span class="lnameErr"></span>
                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $result['last_name'];?>" placeholder="Last Name" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Email</label>
                            <span class="emailErr"></span>
                            <input type="email" name="email" id="email" class="form-control"  value="<?php echo $result['email'];?>"  placeholder="Email" />
                        </div>
                        <div class="col">
                            <label class="form-label">Restaurant Name</label>
                            <span class="rnameErr"></span>
                            <select class="form-control" id="restaurant">
                                <option value="<?php echo $result['Resta_name'];?>"><?php echo $result['Resta_name'];?></option>
                                <?php

                                    $check_pass = "SELECT * FROM resta";
                                        $res_pass = $conn->query($check_pass);
                                        if($res_pass->num_rows != 0)
                                        { 
                                            foreach($res_pass as $value)
                                            {
                                            ?>
                                                <option value="<?php echo $value['id']; ?>"<?php 
                                                if($result['Resta_name']== $value['id']){ echo'selected';} ?>><?php echo $value['resta_name']; ?></option>
                                            <?php
                                            
                                            }                  
                                            
                                        } 
                                        
                                    ?>
                                </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        
                        <div class="col">
                            <label class="form-label">Address</label>
                            <span class="addressErr"></span>
                            <input type="text" name="address" id="address" class="form-control" value="<?php echo $result['adddress']; ?>"  placeholder="Address" />
                        </div>
                         <div class="col">
                                <label for="exampleFormControlSelect1">Country</label>
                                <span class="countryErr"></span>
                                <select class="form-control" id="country"  name="country">
                                <option value="<?php echo $result['country'];?>"><?php echo $result['country'];?></option>
                                <?php

                                $check_pass = "SELECT id,name FROM countries";
                                    $res_pass = $conn->query($check_pass);
                                    if($res_pass->num_rows != 0)
                                    { 
                                        foreach($res_pass as $value)
                                        {
                                        ?>
                                            <option value="<?php echo $value['id']; ?>" <?php if($result['country'] == $value['id']){echo'selected';} ?>><?php echo $value['name']; ?></option>
                                        <?php
                                        
                                        }                  
                                        
                                    } 
                                    
                                ?>
                                </select>
                       </div>
                       
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label for="state">State</label>
                            <span class="stateErr"></span>
                                <select class="form-control" id="state" name="state">

                                    <option value="<?php echo $result['states'];?>"><?php
                                        
                                         
                                            $select = "SELECT * FROM states where id =".$result['states'];

                                            $report = $conn->query($select);

                                            // print_r($report);

                                            while($state= $report->fetch_assoc())
                                            {
                                                 if($state['id'] == $result['states'])
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
                            <input type="text" name="pincode" id="pincode" value="<?php echo $result['pin_code'] ?>"  class="form-control" placeholder="Pin Code" />
                        </div>
                        <div class="col">
                             <label class="form-label">Status</label>
                            <div class=" ml-4">
                          <input class="form-check-input " type="checkbox" name="active" id="status"  <?php if($result['status'] == '1'){echo "checked";} else{echo "unchecked";} ?> /> Active
                          </div>
                        </div>
                    </div>
                            
                        

                    <div class="mt-4">
                    <input type="submit" class="btn btn-danger" value="+ Update Manager" name="submit" id="edit_manager_btn" />
                    <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                    </div>
 				</form>
 			</div>
 		</div>
 	</div>

<script>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
