<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php';
?>


<script type="text/javascript" src="js/resta.js"></script>

<body>
    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">

                <h2>Add Restaurant</h2>
                <form action="" method="POST" id="add-restautent" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Restaurant Name</label>
                            <input type="text" name="rname" id="rname" class="form-control required" placeholder="Restaurant Name" autofocus />
                        </div>
                        <div class="col">
                            <label class="form-label">Restaurant Address</label>
                            <input type="text" name="address" id="address" class="form-control required" placeholder="Restaurant Address" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">

                            <label for="exampleFormControlSelect1">Country</label>
                            <select class="form-control required " id="country" name="country">
                                <option value="">Select Country</option>
                                <?php

                              

                                $select = "SELECT * FROM countries";
                                $result = $conn->query($select);

                                foreach ($result as $val) { ?>
                                    <option value="<?php echo $val['id'];  ?>"><?php echo $val['name'];
                                                                                ?></option>

                                <?php }

                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="state">State</label>
                            <select class="form-control required " id="state" name="state">
                                <option value="">Select State</option>
                            </select>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col">
                            <label for="city">City</label>
                            <select class="form-control required" id="city" name="city">
                                <option value="">Setect City</option>
                            </select>

                        </div>
                        <div class="col">
                            <label class="form-label">Pin Code</label>
                            <input type="text" name="pincode" id="pincode" class="form-control required " placeholder="Pin Code" maxlength="6" size="6" />
                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="col">
                            <label class="form-label">Contact Number</label>
                            <button class="btn btn-danger float-right" id="contact-btn">+</button>
                            <input type="number" name="contact" id="contact" class="form-control required" placeholder="Contact" maxlength="15" />
                        </div>
                        <div class="col">
                            <label class="form-label">Email Address</label>
                            <button class="btn btn-danger float-right" id="email-btn">+</button>
                            <input type="email" name="email" id="email" class="form-control required " placeholder="Email ID" />


                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <div class="mb-2 d-none temp_contact">
                                <label class="form-label">Temporary Contact Number</label>
                                <button class="btn btn-danger float-right" id="temp-contact-btn">+</button>
                                <input type="number" name="temp_contact" id="temp_contact" class="form-control" placeholder="Contact" maxlength="15" />
                            </div>

                            <div class="mb-2 d-none temp_contact2">
                                <label class="form-label">Temporary Contact Number</label>
                                <button class="btn btn-danger float-right" id="temp-contact-btn2">-</button>
                                <input type="number" name="temp_contact2" id="temp_contact2" class="form-control" placeholder="Contact" maxlength="15" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2 d-none temp_email">
                                <label class="form-label">Temporary Email Address</label>
                                <button class="btn btn-danger float-right" id="temp-email-btn">+</button>
                                <input type="email" name="temp_email" id="temp_email" class="form-control" placeholder="Temporary email address" />
                            </div>
                            <div class="mb-2 d-none temp_email2">
                                <label class="form-label">Temporary Email Address</label>
                                <button class="btn btn-danger float-right" id="temp-email-btn2">-</button>
                                <input type="email" name="temp_email2" id="temp_email2" class="form-control" placeholder="Temporary email address" />
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
                                <input class="form-check-input" name="status" id="status" type="checkbox" /> Active
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <input type="submit" class="btn btn-danger" value="+ Save" name="submit">
                        <a href="admin.php" class="btn btn-secondary float-right">X Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>