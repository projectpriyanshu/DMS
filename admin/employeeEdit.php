<?php session_start();
	include 'includes/cdn.php';
	include 'includes/sidebar.php';
	include 'includes/adminMenu.php';

 ?>

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

<script type="text/javascript" src="js/manager.js"></script>
 	<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <h3>Employee Form</h3>

                <?php 
                    $select_doc = "SELECT * from doc where empId=".$_GET['id'];

         $response_doc =$conn->query($select_doc);

         $document=array();
         $expire = array();
         $docId = array();

         // $docImage = array();
         $docStatus = array();
        if($response_doc-> num_rows != 0)
        {
            foreach($response_doc as $val)
            {        
                array_push($document,$val['DocumentImage']);

                 array_push($expire, $val['DocumentExpiryDate']);

                 array_push($docId,$val['id']);                                
                 // array_push($docImage,$val['DocumentImage']);     
                 array_push($docStatus,$val['documentStatus']);     
            }
             $id = $val['empId'];
                   

        }
        // print_r($docId);
        // echo "employee_images/$val['empId']/$document[1]";

                 ?>
 				<form action="" method="POST" id="updateEmployee">
                    <div class="row ">
                        <div class="col">
                           
                            <input type="text" hidden name="id" value="<?php echo $result['id']; ?>">
                            <label class="form-label">Employee Name</label>
                            <input type="text" name="emp-name" class="form-control required" value="<?php echo $result['emp_name']; ?>" />
                        </div>
                        <div class="col">
                            <label class="form-label">Employee Profile</label>
                            <select class="form-control required" id="jobrole" name="jobrole">
                                <option value="">Select Employee Profile</option>
                                        <?php 


                                            $select="SELECT * FROM jobrole";
                                            $result1=$conn->query($select);

                                            foreach($result1 as $val)
                                            {?>
                                                <option value="<?php echo $val['job_id'];?>" <?php if($val['job_id'] == $result['emp_profile']){ echo "selected ";} ?>><?php echo $val['job_role']; ?></option>
                                                
                                            <?php }

                                         ?>
                                </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Date Of Join</label>
                            <input type="date" name="doj" class="form-control required" value="<?php echo $result['doj'] ?>" />
                        </div>

                    </div>

                     <div class="row mt-3 d-none manager-user">
                       <div class="col user-pass" >
                            <label class="form-label">User Name</label>
                            <input type="text" name="user-name"  class="form-control user-name" placeholder="User Name" value="<?php echo $result['user_name']; ?>" />
                        </div>
                        <div class="col user-pass" >
                            <label class="form-label">Password</label>
                            <input type="text" name="password"  class="form-control password" placeholder="Password" value="<?php echo $result['password']; ?>" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Restaurant </label>
                            <select class="form-control required" id="restaurant" name="restaurant">
                                 <option value="">Select Restaurant</option>
                                        <?php 

                                          

                                            $select="SELECT * FROM resta";
                                            $result1=$conn->query($select);

                                            foreach($result1 as $val)
                                            {?>
                                                <option value="<?php echo $val['id'];?>" <?php if($val['id'] == $result['restaurant']){ echo "selected ";} ?>><?php echo $val['resta_name']; ?></option>
                                                
                                            <?php }

                                         ?>
                                </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Employee Address</label>
                            <input type="text" name="address" id="address" class="form-control required" value="<?php echo $result['address']; ?>" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                                <label for="exampleFormControlSelect1">Country</label>
                                <select class="form-control required" id="country"  name="country">
                                <option>Select Country</option>
                                        <?php 

                                          

                                            $select="SELECT * FROM countries";
                                            $result1=$conn->query($select);

                                            foreach($result1 as $val)
                                            {?>
                                                <option value="<?php echo $val['id'];  ?>" <?php if($result['country'] == $val['id']){echo'selected';} ?>><?php echo $val['name']; ?></option>
                                                
                                            <?php }

                                         ?>
                                </select>
                       </div>
                        <div class="col">
                            <label for="state">State</label>
                                <select class="form-control required" id="state" name="state">
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
                            <select class="form-control required" id="city" name="city">
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

                         <div class="col">
                             <label class="form-label">Pin Code</label>
                            <input type="text" name="pincode" id="pincode" class="form-control required"  placeholder="Pin Code" maxlength="6" size="6" value="<?php echo $result['pincode']; ?>" />
                        </div>    
                        
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" name="date-of-birth" class="form-control required" value="<?php echo $result['date_of_birth']; ?>" />
                        </div> 

                          <div class="col">
                            <label class="form-label">Contact Number</label>
                            <input type="number" name="contact" class="form-control contact required"  maxlength="15" value="<?php echo $result['contact']; ?>" />
                        </div> 

                        

                        <div class="col">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control required"  placeholder="Email" value="<?php echo $result['email']; ?>" />
                        </div>
                            
                    </div>

                     <div class="row mt-3">
                         <div class="col">
                            <label class="form-label">Passport Number</label>
                            <input type="text" name="passport" class="form-control passport"  value="<?php echo $result['passport_number']; ?>"  />
                        </div> 

                        <div class="col">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="passport-exp" class="form-control passport-exp date-val"  value="<?php echo $result['passport_expire'] ?>" />
                        </div>
                        
                    </div>

                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>New Starter Form</label>
                            <input type="file" name="doc[]" class="form-control FilUploader" >
                          </div> 
                           <div class="col-3">
                            <!-- <label class="form-label">Expire Date</label> -->
                            <input type="date" hidden name="expdata[1]" class="form-control  validate" />
                          </div> 
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" >
                          
                          </div>                 
                    </div> 

                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>BRP Expire Date</label>
                            <input type="file"  name="doc[]"  class="form-control brp FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[2]" class="form-control date-val brp-exp validate" value="<?php echo $expire[1]; ?>" />
                          </div> 
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" src='<?php echo "employee_image/$id/".$document[1] ?>'>
                          
                          </div> 
                          <div class="col-3">
                            <input  type="text" hidden class="approve" value="<?php echo $docId[1]; ?>">
                            <input type="button" class="btn btn-success approve"<?php 
                                    if($docStatus[1] == 1){ echo "disabled=false";}?> value="Approve" >
                            <input type="button" class="btn btn-danger reject" <?php if($docStatus[1] == 0) {echo "disabled=false";}  ?> value="Reject"  >
                          </div>                                
                    </div> 

                   
                     <div class="row mt-3 align-items-center">
                         <div class="col-3">
                            <label>ECS</label> 
                            <input type="file" name="doc[]" class="form-control ecs FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[3]" class="form-control date-val  ecs-exp validate"  value="<?php echo $expire[2]; ?>" />
                          </div> 
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" src='<?php echo "employee_image/$id/".$document[2] ?>'>
                          
                          </div> 
                          <div class="col-3">
                            <input type="text" hidden class="approve" value="<?php echo $docId[2]; ?>">
                             <input type="button" class="btn btn-success approve"<?php 
                                    if($docStatus[2] == 1){ echo "disabled=false";}?> value="Approve" >
                            <input type="button" class="btn btn-danger reject" <?php if($docStatus[2] == 0) {echo "disabled=false";}  ?> value="Reject"  >
                          </div>                                 
                    </div> 
                  
                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>Driving Licence</label> 
                            <input type="file" name="doc[]" class="form-control driving FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[4]" class="form-control date-val driving-exp validate"  value="<?php echo $expire[3]; ?>"  />
                          </div>
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" src='<?php echo "employee_image/$id/".$document[3] ?>'>
                          
                          </div>  
                          <div class="col-3">
                            <input type="text" hidden class="approve" value="<?php echo $docId[3]; ?>">
                            <input type="button" class="btn btn-success approve"<?php 
                                    if($docStatus[3] == 1){ echo "disabled=false";}?> value="Approve" >
                            <input type="button" class="btn btn-danger reject" <?php if($docStatus[3] == 0) {echo "disabled=false";}  ?> value="Reject"  >
                          </div>                                  
                    </div> 

                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>Car Insurance</label> 
                            <input type="file" name="doc[]" class="form-control car FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[5]" class="form-control date-val car-exp validate"  value="<?php echo $expire[4]; ?>" />
                          </div>    
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" src='<?php echo "employee_image/$id/".$document[4] ?>' >
                          
                          </div> 
                          <div class="col-3">
                            <input type="text" hidden class="approve" value="<?php echo $docId[4]; ?>">
                             <input type="button" class="btn btn-success approve"<?php 
                                    if($docStatus[4] == 1){ echo "disabled=false";}?> value="Approve" >
                            <input type="button" class="btn btn-danger reject" <?php if($docStatus[4] == 0) {echo "disabled=false";}  ?> value="Reject"  >
                          </div>              
                    </div> 

                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>Car Tax</label> 
                            <input type="file" name="doc[]" class="form-control tax FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[6]" class="form-control tax-exp date-val"   value="<?php echo $expire[5];  ?>"/>
                          </div> 
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" src='<?php echo "employee_image/$id/".$document[5] ?>'>
                          
                          </div> 
                          <div class="col-3">
                            <input type="text" hidden class="approve" value="<?php echo $docId[5]; ?>">
                             <input type="button" class="btn btn-success approve"<?php 
                                    if($docStatus[5] == 1){ echo "disabled=false";}?> value="Approve" >
                            <input type="button" class="btn btn-danger reject" <?php if($docStatus[5] == 0) {echo "disabled=false";}  ?> value="Reject"  >
                          </div>                 
                    </div> 

                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>MOT</label> 
                            <input type="file" name="doc[]" class="form-control mot FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[7]" class="form-control mot-exp date-val"  value="<?php echo $expire[6]; ?>" />
                          </div> 
                          <div class="col-3">
                            <img  width="50%" class="img-fluid" src='<?php echo "employee_image/$id/".$document[6] ?>'>
                          
                          </div>  
                          <div class="col-3">
                            <input type="text" hidden class="approve" value="<?php echo $docId[6]; ?>">
                             <input type="button" class="btn btn-success approve"<?php 
                                    if($docStatus[6] == 1){ echo "disabled=false";}?> value="Approve" >
                            <input type="button" class="btn btn-danger reject" <?php if($docStatus[6] == 0) {echo "disabled=false";}  ?> value="Reject"  >
                          </div>                
                    </div> 
                        
                       

                    <div class="row mt-3 align-items-center">
                          <div class="col-3">
                            <label>Other Document</label> 
                            <input type="file" name="doc[]" class="form-control FilUploader" >
                          </div> 
                          <div class="col-3">
                            <!-- <label class="form-label">Expire Date</label> -->
                            <input type="date" hidden name="expdata[8]" class="form-control  validate" />
                          </div>  
                          <div class="col-3">
                            <img  width="50%"  class="img-fluid" >
                          
                          </div>              
                    </div> 


                     <div class="row mt-3">
                        
                        <div class="col">
                             <!-- <label class="form-label">Status</label> -->
                            <div class=" ml-4">
                          <input class="form-check-input" name="social" value="1" type="checkbox" <?php if($result['social_media'] == '1'){echo "checked";} else{echo "unchecked";} ?> /> Social Media and Blogging Policy
                          </div>
                        </div>
                    </div> 
                     <div class="row mt-3">
                        
                        <div class="col">
                             <!-- <label class="form-label">Status</label> -->
                            <div class=" ml-4">
                          <input class="form-check-input" name="data" value="1" type="checkbox" <?php if($result['data_protection'] == '1'){echo "checked";} else{echo "unchecked";} ?>/> Data Protection
                          </div>
                        </div>
                    </div> 

                     <div class="row mt-3">
                        
                        <div class="col">
                             <!-- <label class="form-label">Status</label> -->
                            <div class=" ml-4">
                          <input class="form-check-input" name="privacy" value="1" type="checkbox" <?php if($result['privacy_policy'] == '1'){echo "checked";} else{echo "unchecked";} ?> /> Privacy policy
                          </div>
                        </div>
                    </div> 

                    <div class="row mt-3">
                        
                        <div class="col">
                             <label class="form-label">Status</label>
                            <div class=" ml-4">
                          <input class="form-check-input" name="status" value="1" type="checkbox" <?php if($result['status'] == '1'){echo "checked";} else{echo "unchecked";} ?> /> Active
                          </div>
                        </div>
                    </div> 

                    <!--  -->
                    <div class="mt-4">
                    <input type="submit" class="btn btn-danger" value="+ Update" name="submit">
                    <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                    </div>
                </form>
                <p class="mas"></p>
 			</div>
 		</div>
 	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
