<?php
   require "../../php/database.php";
session_start();
$username = $_SESSION["username"];
$get_id = "SELECT id FROM users WHERE username = '$username'";
$get_response = $db->query($get_id);
$data = $get_response->fetch_assoc();
$folder_name = "../gallery/user_" . $data['id']."/";


$file = $_FILES['data'];
$user_path = $file['tmp_name'];
$file_name = $file['name'];
move_uploaded_file($user_path,$folder_name.$file_name);
echo "success";




?>