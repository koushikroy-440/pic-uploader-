<?php
session_start();
$username = $_SESSION['username'];
$table_name = $_SESSION['table_name'];
require "../../php/database.php";
$path = $_POST['photo_path'];
$complete_path = "../" . $path;

if (unlink("../" . $path)) {
    $get_user_storage = "SELECT used_storage FROM users WHERE username = '$username'";
    $response = $db->query($get_user_storage);
    $data = $response->fetch_assoc();
    $used_storage = $data['used_storage'];
  
    // //get delete image storage
    $get_delete_size = "SELECT image_size FROM $table_name WHERE image_path = '$complete_path' ";
    $response_delete = $db->query($get_delete_size);
    $response_data = $response_delete->fetch_assoc();
    $delete_file_size = $response_data['image_size'];


    
    // //update used used_storage

    $storage = $used_storage - $delete_file_size;
    $update = "UPDATE users SET used_storage = '$storage' WHERE username = '$username'";
    if ($db->query($update)) {
        $delete_query = "DELETE FROM $table_name WHERE image_path = '$complete_path' ";
        if ($db->query($delete_query)) {
            echo "delete success";
        } else {
            echo "delete failed";
        }
    } else {
        echo "failed to update users storage";
    }
    //echo $storage;

} else {
    echo "delete failed";
}
?>
<!-- close user connection -->
<?php

$db->close();

?>