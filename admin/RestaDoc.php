<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php';
?>

<?php
if (isset($_GET['id'])) {
    $select = "SELECT * FROM resta Where id=" . $_GET['id'];
    $response = $conn->query($select);
    if ($response->num_rows != 0) {
        foreach ($response as $val) {
            $result = $val;
        }
    }
}
?>

<style>
    .borderless th,
    .borderless td {
        border: none;
    }

    .row {
        background: #fff;
        /*border-radius: 10px;*/
        padding: 2px;

    }

    h3,
    h5 {
        color: #003147;
    }
</style>

<script type="text/javascript" src="js/index.js"></script>
<div class="content-container">
    <div class="container-fluid">
        <div class="jumbotron">
            <h3 class="text-info mb-4">Restaurant Details</h3>

            <div class="row p-3">
                <div class="col">
                    <h5 class="text-info">Basic Information</h5>
                    <table class="table table-sm borderless w-100">
                        <tr>
                            <td class="w-25">Restaurant Name</td>
                            <td class="w-25">Address</td>
                            <td class="w-25">Email Address</td>
                            <td class="w-25">Contact</td>


                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['resta_name']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['address'];; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['email']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['contact']; ?></th>
                        </tr>
                        
                    </table>
                </div>
            </div>


            


            <div class="row p-3">
                <div class="col">
                    <h5 class="text-info">Contact Information</h5>
                    <table class="table table-sm borderless w-100">
                        <tr>
                            <td class="w-25">Address</td>
                            <td class="w-25">City</td>
                            <td class="w-25">State</td>
                            <td class="w-25">Country</td>

                        </tr>
                        <tr>
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
                            </th>
                            <th class="pb-3 w-25"><?php
                                                    $sta = "SELECT * FROM countries WHERE id=" . $result['country'];
                                                    $resSta = $conn->query($sta);
                                                    while ($record = $resSta->fetch_assoc()) {
                                                        echo $record['name'];
                                                    }
                                                    ?></th>
                        </tr>
                        <tr>
                            <td class="w-25">Zip Code</td>
                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['pin_code']; ?></th>
                            
                        </tr>

                        <tr>
                            <td class="w-25">Temporary Contact Numner</td>
                            <td class="w-25">Temporary Contact Numner</td>
                            <td class="w-25">Temporary Email Address</td>
                            <td class="w-25">Temporary Email Address</td>

                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['temp_contact1']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['temp_contact2']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['temp_email1']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['temp_email2']; ?></th>
                            
                        </tr>
                    </table>
                </div>
            </div>




            <div class="row p-3">
                <div class="col" id="showData">
                    <h5 class="text-info">Image</h5>
                    <img width="25%" height="100px" class="img-fluid" src='<?php echo "restaurent_image/" .$result['document']; ?>'>


                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>