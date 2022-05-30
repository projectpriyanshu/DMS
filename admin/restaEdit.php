<?php session_start();
	include 'includes/cdn.php';
	include 'include/sidebar.php';
	include 'include/adminMenu.php';
 ?>


<script type="text/javascript" src="js/resta.js"></script>
<body>

<?php
    if(isset($_GET['id']))
    {
        $select="SELECT * FROM resta Where id=".$_GET['id'];
        $response =$conn->query($select);
        if($response-> num_rows != 0)
        {
            foreach($response as $val)
            {
                $result = $val;
               $image =  "restaurent_image/".$result["document"];
            }
        }
    }
?>

<div class="content-container">
 		<div class="container-fluid">
 			 <div class="jumbotron">

                <h2>Update Restaurant</h2>
                <form action="" method="POST" id="editResta" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <input class="d-none form-control" type="text" name="id" value="<?php echo $result['id'];?>">
                            <label class="form-label">Restaurant Name</label>
                            <input type="text" name="rname" id="rname" class="form-control required" placeholder="Restaurant Name" value="<?php echo $result['resta_name'];?>" />
                        
                        </div>
                        <div class="col">
                            <label class="form-label">Restaurant Address</label>
                           <input type="text" name="address" id="address" class="form-control required" placeholder="Restaurant Address" value="<?php echo $result['address'];?>" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">

                            <label for="exampleFormControlSelect1">Country</label>
                            <select class="form-control required" id="country"  name="country">
                                <option value="<?php echo $result['country']; ?>"><?php echo $result['country'];?></option>
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
                    </div>


                    <div class="row mt-3">
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
                            <input type="text" name="pincode" id="pincode" class="form-control required"  placeholder="Pin Code" value="<?php echo $result['pin_code']; ?>" />
                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Contact Number</label>
                            <button class="btn btn-danger float-right" id="contact-btn">+</button>
                            <input type="number" name="contact" id="contact" class="form-control required"  placeholder="Contact" maxlength="15" value="<?php echo $result['contact']; ?>"/>
                        </div>
                        <div class="col">
                            <label class="form-label">Email Address</label>
                            <button class="btn btn-danger float-right" id="email-btn">+</button>
                            <input type="email" name="email" id="email" class="form-control required "  placeholder="Email ID" value="<?php echo $result['email']; ?>"/>


                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <div class="mb-2 d-none temp_contact">
                                <label class="form-label">Temporary Contact Number</label>
                                <button class="btn btn-danger float-right" id="temp-contact-btn">+</button>
                                <input type="number" name="temp_contact" id="temp_contact" class="form-control"  placeholder="Contact" maxlength="15" value="<?php echo $result['temp_contact1']; ?>"/>
                            </div>

                            <div class="mb-2 d-none temp_contact2">
                                <label class="form-label">Temporary Contact Number</label>
                                <button class="btn btn-danger float-right" id="temp-contact-btn2">-</button>
                                <input type="number" name="temp_contact2" id="temp_contact2" class="form-control"  placeholder="Contact" maxlength="15" value="<?php echo $result['temp_contact2']; ?>"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2 d-none temp_email">
                                <label class="form-label">Temporary Email Address</label>
                                <button class="btn btn-danger float-right" id="temp-email-btn">+</button>
                               <input type="email" name="temp_email" id="temp_email" class="form-control"  placeholder="Temporary email address" value="<?php echo $result['temp_email1']; ?>"/>
                            </div>
                            <div class="mb-2 d-none temp_email2">
                                <label class="form-label">Temporary Email Address</label>
                                <button class="btn btn-danger float-right" id="temp-email-btn2">-</button>
                                 <input type="email" name="temp_email2" id="temp_email2" class="form-control"  placeholder="Temporary email address" value="<?php echo $result['temp_email2']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <label>Restaurent Image</label>
                            <input type="file" id="file_data" name="image" class="form-control" multiple>

                        </div>
                        <div class="col">
                            <label class="form-label">Status</label>
                            <div class=" ml-4">
                          <input class="form-check-input" id="status" name="status" type="checkbox" <?php if($result['status'] == '1'){echo "checked";} else{echo "unchecked";} ?>/> Active
                          </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col">
                             <img  width="25%" class="img-fluid" height="auto" src="<?php echo $image; ?>">

                        </div>
                        
                    </div>

                    <div class="mt-5">
                        <input type="submit" class="btn btn-danger" value="+ Update" name="submit">
                        <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                    </div>
                </form>

            </div>
 		</div>
 	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
