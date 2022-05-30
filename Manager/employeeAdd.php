<?php session_start();
include 'includes/cdn.php';
include 'include/sidebar.php';
include 'include/adminMenu.php';
 ?>
 <style>
     span{
        color: blue;
        font-weight: bold;
     }
 </style>
<script type="text/javascript" src="js/index.js"></script>
 	<div class="content-container">
 		<div class="container-fluid">
 			<div class="jumbotron">
                <h3>Employee Form</h3>
 				<form action="" method="POST" onsubmit=" return validate()">
 					<div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <span class="fnameErr"></span>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" />
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
                            <label class="form-label">Date Of Join</label>
                            <span class="dojErr"></span>
                            <input type="date" id="doj" class="form-control"/>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Job Role</label>
                            <span class="jobroleErr"></span>
                            <select class="form-control" id="jobrole">
                                <option value="Select Job Role">Select Job Role</option>
                                        <?php 

                                            include '../connection.php';

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

							     			include 'connection.php';

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
                          <input class="form-check-input" value="1" type="checkbox" id="status" /> Active
                          </div>
                        </div>
                    </div> 

                    <div class="mt-4">
                    <input type="submit"  class="btn btn-danger" value="+ Add Employee" name="submit">
                    <a href="admin.php" class="btn btn-secondary float-right">X Cancle</a>
                    </div>
 				</form>
 			</div>
 		</div>
 	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
