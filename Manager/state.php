<?php
require "../connection.php";

$country_id = $_POST["country_id"];


$select = "SELECT * FROM states where country_id =".$country_id;

$result = $conn->query($select);

// print_r($result);
?>
<option value="Select State">Select State</option>
<?php
foreach($result as $val) {
?>
<option value="<?php echo $val["id"];?>"><?php echo $val["name"];?></option>
<?php
}
?>