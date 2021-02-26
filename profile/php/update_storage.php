<?php
session_start();
$username = $_SESSION['username'];

require "../../php/database.php";
$plans = $_GET['plans'];
$storage = $_GET['storage'];
$purchase_date = date("y-m-d");
if(plans == "starter")
{
//get free storage space
$select_storage = "SELECT storage FROM users WHERE username = '$username'";
$response = $db->query($select_storage);
$data = $response->fetch_assoc();
$final_storage = $data['storage'] + $storage;

//update storage
$update_storage = "UPDATE users SET storage = '$final_storage', plans = '$plans' , purchase_date = '$purchase_date' WHERE username = '$username'";
if ($db->query($update_storage)) {
    header("Location:../profile.php");
} else {
    echo "update failed";
}
} 

else {
        //update storage
$update_storage = "UPDATE users SET storage = '0', plans = '$plans' , purchase_date = '$purchase_date' WHERE username = '$username'";
if ($db->query($update_storage)) {
    header("Location:../profile.php");
} else {
    echo "update failed";
}
}
?>

<!-- close user connection -->
<?php

$db->close();

?>