<?php session_start();
include 'includes/cdn.php';
include 'includes/sidebar.php';
include 'includes/adminMenu.php';

?>

<?php
if (isset($_GET['id'])) {
    $select = "SELECT * FROM employee Where id=" . $_GET['id'];
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
            <h3 class="text-info mb-4">Employee Details</h3>

            <div class="row p-3">
                <div class="col">
                    <h5 class="text-info">Basic Information</h5>
                    <table class="table table-sm borderless w-100">
                        <tr>
                            <td class="w-25">Employee Name</td>
                            <td class="w-25">Contact</td>
                            <td class="w-25">Personal Email</td>
                            <td class="w-25">Date Of Birth</td>


                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['emp_name']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['contact'];; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['email']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['date_of_birth']; ?></th>
                        </tr>
                        <tr>
                            <td class="w-25">User Name</td>
                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['user_name']; ?></th>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="row p-3">
                <div class="col">
                    <h5 class="text-info">Employee Information</h5>
                    <table class="table table-sm borderless w-100">
                        <tr>
                            <td class="w-25">Employee Enrollment ID</td>
                            <td class="w-25">Employee Profile</td>

                            <td class="w-25">Date of Joining</td>
                            <td class="w-25">Company Email</td>

                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['id']; ?></th>
                            <th class="pb-3 w-25"><?php
                                                    $sta = "SELECT * FROM jobrole WHERE job_id=" . $result['emp_profile'];
                                                    $resSta = $conn->query($sta);
                                                    while ($record = $resSta->fetch_assoc()) {
                                                        echo $record['job_role'];
                                                    }
                                                    ?></th>
                            <th class="pb-3 w-25"><?php echo $result['doj']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['email']; ?></th>

                        </tr>
                        <tr>
                            <td class="w-25">Passport Number</td>
                            <td class="w-25">Expire Date</td>
                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['passport_number']; ?></th>
                            <th class="pb-3 w-25"><?php echo $result['passport_expire']; ?></th>
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
                            <!-- <td class="w-25">Country</td> -->
                        </tr>
                        <tr>
                            <th class="pb-3 w-25"><?php echo $result['pincode']; ?></th>
                            <th class="pb-3 w-25"><?php
                                                    // $sta = "SELECT * FROM countries WHERE id=" . $result['country'];
                                                    //   $resSta = $conn->query($sta);
                                                    //   while ($record = $resSta->fetch_assoc()) {
                                                    //     echo $record['name'];
                                                    //   }
                                                    ?></th>
                        </tr>
                    </table>
                </div>
            </div>




            <div class="row p-3">
                <div class="col" id="showData">
                    <h5 class="text-info">Document</h5>
                    <?php

                    // $dir ='$id/';

                    $id = $result['id'];
                    $dir = "employee_image/$id/";
                    if (file_exists($dir)) {

                        $select_doc = "SELECT * from doc where empId=" . $id;

                        $response_doc = $conn->query($select_doc);

                        $document = array();
                        $expire = array();
                        $docName = array();
                        $docStatus = array();
                        $i = 0;
                        $j = 1;
                        if ($response_doc->num_rows != 0) {
                            foreach ($response_doc as $val) {
                                array_push($document, $val['DocumentImage']);

                                array_push($expire, $val['DocumentExpiryDate']);
                                array_push($docName, $val['DocumentName']);

                                array_push($docStatus, $val['documentStatus']);



                    ?>

                                <div class="col mb-3 ">
                                    <div class="card-header">
                                        <h5><?php echo $j . " => " . $docName[$i];  ?></h5>
                                    </div>
                                    <img width="25%" height="100px" class="img-fluid" src='<?php echo "employee_image/$id/" . $document[$i]; ?>'>
                                    <h5> Expaire Date : <strong><?php echo $expire[$i]; ?></strong></h5>

                                    <input type="text" disabled class="mass" value="<?php if ($docStatus[$i] == 1) {echo "Approve";} else { echo "Reject"; } ?>">

                                    <script>
                                        $(document).ready(function() {
                                            var a = document.getElementsByClassName("mass");
                                            $(a).each(function() {
                                                if ($.trim($(this).val()) == "Approve") {
                                                    $(this).addClass("text-success");
                                                    $(this).css("border", "1px");
                                                    $(this).css("font-size", "20px");
                                                } else {
                                                    $(this).addClass("text-danger");
                                                    $(this).css("border", "1px");
                                                    $(this).css("font-size", "20px");
                                                }
                                            });
                                        })
                                    </script>

                                </div>

                    <?php
                                $i++;
                                $j++;
                            }
                        }
                    }                         ?>


                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>