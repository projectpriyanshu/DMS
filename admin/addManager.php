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
 	<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
 				<form action="" method="POST" onsubmit=" return validate()">
                    <h4>Manager Details</h4>
 					<div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <span class="fnameErr"></span>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" autofocus />
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <span class="lnameErr"></span>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Email</label>
                            <span class="emailErr"></span>
                            <input type="email" name="email" id="email" class="form-control"  placeholder="Email" />
                        </div>
                        <div class="col">
                            <label class="form-label">Password</label>
                            <span class="passErr"></span>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Restaurant Name</label>
                            <span class="rnameErr"></span>
                            <select class="form-control" id="rname"  name="country">
                                <option value="Select Restaurant">Select Restaurant</option>
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
                            <label class="form-label">Address</label>
                            <span class="addressErr"></span>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                                <label for="exampleFormControlSelect1">Country</label>
                                <span class="countryErr"></span>
							    <select class="form-control" id="country"  name="country">
                                <option value="Select Country">Select Country</option>
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
                            <span class="stateErr"></span>
                                <select class="form-control" id="state" name="state">
                                </select>
                        </div>

                        <div class="col">
                            <label for="city">City</label>
                            <span class="cityErr"></span>
                            <select class="form-control" id="city" name="city">
                            </select>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col">
                             <label class="form-label">Pin Code</label>
                             <span class="pinErr"></span>
                            <input type="text" name="pincode" id="pincode" class="form-control"  placeholder="Pin Code" maxlength="6" size="6" />
                        </div>
                        <div class="col">
                             <label class="form-label">Status</label>
                            <div class=" ml-4">
                          <input class="form-check-input " type="checkbox" name="active" id="status" /> Active
                          </div>
                        </div>
                    </div>
                            
                        

                    <div class="mt-4">
                    <input type="submit"  class="btn btn-danger" value="+ Save" name="submit">
                    <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                    </div>
 				</form>
 			</div>
 		</div>
 	</div>

<script>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
