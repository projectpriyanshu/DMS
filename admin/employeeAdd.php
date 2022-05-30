<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php';
 ?>

<script type="text/javascript" src="js/manager.js"></script>

 	<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <h3>Employee Form</h3>
 				<form action="" method="POST" id="EmployeeAdd">
 					<div class="row ">
                        <div class="col">
                            <label class="form-label">Employee Name</label>
                            <input type="text" name="emp-name" class="form-control required" placeholder="Employee Name" />
                        </div>
                        <div class="col">
                            <label class="form-label">Employee Profile</label>
                            <select class="form-control required" id="jobrole" name="jobrole">
                                <option value="">Select Job Role</option>
                                        <?php 

                                            

                                            $select="SELECT * FROM jobrole";
                                            $result=$conn->query($select);

                                            foreach($result as $val)
                                            {?>
                                                <option value="<?php echo $val['job_id'];?>"><?php echo $val['job_role']; ?></option>
                                                
                                            <?php }

                                         ?>
                                </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Date Of Join</label>
                            <input type="date" name="doj" class="form-control required"/>
                        </div>

                    </div>

                     <div class="row mt-3 d-none manager-user">
                       <div class="col user-pass" >
                            <label class="form-label">User Name</label>
                            <input type="text" name="user-name"  class="form-control user-name" placeholder="User Name" />
                        </div>
                        <div class="col user-pass" >
                            <label class="form-label">Password</label>';
                            <input type="text" name="password"  class="form-control password" placeholder="Password" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Restaurant </label>
                            <select class="form-control required" id="restaurant" name="restaurant">
                                <option value="">Select Restaurant</option>
                                        <?php 

                                            

                                            $select="SELECT * FROM resta";
                                            $result=$conn->query($select);

                                            foreach($result as $val)
                                            {?>
                                                <option value="<?php echo $val['id'];?>"><?php echo $val['resta_name']; ?></option>
                                                
                                            <?php }

                                         ?>
                                </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Employee Address</label>
                            <input type="text" name="address" id="address" class="form-control required" placeholder="Address" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                                <label for="exampleFormControlSelect1">Country</label>
							    <select class="form-control required" id="country"  name="country">
                                <option>Select Country</option>
							     		<?php 

							     		

							     			$select="SELECT * FROM countries";
							     			$result=$conn->query($select);

							     			foreach($result as $val)
							     			{?>
							     				<option value="<?php echo $val['id'];  ?>"><?php echo $val['name']; ?></option>
							     				
							     			<?php }

							     		 ?>
							    </select>
                       </div>
                        <div class="col">
                            <label for="state">State</label>
                                <select class="form-control required" id="state" name="state">
                                     <option value="">Select State</option>
                                </select>
                        </div>
                        <div class="col">
                            <label for="city">City</label>
                            <select class="form-control required" id="city" name="city">
                                 <option value="">Select City</option>
                            </select>
                            </div>

                         <div class="col">
                             <label class="form-label">Pin Code</label>
                            <input type="text" name="pincode" id="pincode" class="form-control required"  placeholder="Pin Code" maxlength="6" size="6" />
                        </div>    
                        
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" name="date-of-birth" class="form-control required" />
                        </div> 

                          <div class="col">
                            <label class="form-label">Contact Number</label>
                            <input type="number" name="contact" class="form-control contact required"  placeholder="Contact" maxlength="15"/>
                        </div> 

                        

                        <div class="col">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control email-val required"  placeholder="Email" />
                        </div>
                            
                    </div>

                     <div class="row mt-3">
                         <div class="col">
                            <label class="form-label">Passport Number</label>
                            <input type="text" name="passport" class="form-control passport"  placeholder="Possport Number"  />
                        </div> 

                        <div class="col">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="passport-exp" class="form-control passport-exp date-val" />
                        </div>
                        
                    </div>

                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>New Starter Form</label>
                            <input type="file" name="doc[]" class="form-control FilUploader" >
                          </div> 
                          <div class="col-3">
                            <!-- <label class="form-label">Expire Date</label> -->
                            <input type="date" hidden name="expdata[1]" class="form-control  validate" />
                          </div>   

                                
                    </div> 
                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>BRP Expire Date</label>
                            <input type="file"  name="doc[]" class="form-control brp FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[2]" class="form-control date-val brp-exp validate" />
                          </div>
                                            
                    </div> 

                     <div class="row mt-2 align-items-center">
                         <div class="col-3">
                            <label>ECS</label> 
                            <input type="file" name="doc[]" class="form-control ecs FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[3]" class="form-control date-val  ecs-exp validate" />
                          </div>
                                            
                    </div> 
                    
                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>Driving Licence</label> 
                            <input type="file" name="doc[]" class="form-control driving FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[4]" class="form-control date-val driving-exp validate"  />
                          </div> 
                                           
                    </div> 

                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>Car Insurance</label> 
                            <input type="file" name="doc[]" class="form-control car FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[5]" class="form-control date-val car-exp validate" />
                          </div>
                                  
                    </div> 

                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>Car Tax</label> 
                            <input type="file" name="doc[]" class="form-control tax FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[6]" class="form-control tax-exp date-val" />
                          </div> 
                                       
                    </div> 

                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>MOT</label> 
                            <input type="file" name="doc[]" class="form-control mot FilUploader" >
                          </div> 
                          <div class="col-3">
                            <label class="form-label">Expire Date</label>
                            <input type="date" name="expdata[7]" class="form-control mot-exp date-val" />
                          </div>
                                         
                    </div> 
                        
                       

                    <div class="row mt-2 align-items-center">
                          <div class="col-3">
                            <label>Other Document</label> 
                            <input type="file" name="doc[]" class="form-control FilUploader" >
                          </div> 
                          <div class="col-3">
                            <!-- <label class="form-label">Expire Date</label> -->
                            <input type="date" hidden name="expdata[8]" class="form-control  validate" />
                          </div>  
                                        
                    </div> 

                     <div class="row mt-3">
                        
                        <div class="col">
                             <!-- <label class="form-label">Status</label> -->
                            <div class=" ml-4">
                          <input class="form-check-input" name="social" value="1" type="checkbox" /> Social Media and Blogging Policy
                          </div>
                        </div>
                    </div> 
                     <div class="row mt-3">
                        
                        <div class="col">
                             <!-- <label class="form-label">Status</label> -->
                            <div class=" ml-4">
                          <input class="form-check-input" name="data" value="1" type="checkbox" /> Data Protection
                          </div>
                        </div>
                    </div> 

                     <div class="row mt-3">
                        
                        <div class="col">
                             <!-- <label class="form-label">Status</label> -->
                            <div class=" ml-4">
                          <input class="form-check-input" name="privacy" value="1" type="checkbox" /> Privacy policy
                          </div>
                        </div>
                    </div> 

                    <!--  -->
                    <div class="mt-4">
                    <input type="submit" id="submit" class="btn btn-danger add-emp" value="+ Save" name="submit">
                    <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                    </div>
 				</form>   


                <p class="mas"></p>             
 		</div>
 	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 

