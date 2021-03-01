<?php
require("../php/database.php");
session_start();
$table_name = $_SESSION['table_name'];
$get_image_path = "SELECT * FROM $table_name ORDER BY id ASC LIMIT $star,$end";
$response = $db->query($get_image_path);
$start  = $_POST['start'];
$end = $_POST['end'];
while ($data = $response->fetch_assoc()) {

    $image_name = pathinfo($data['image_name']);
    $image_name = $image_name['filename'];
    $path = str_replace("../", "", $data['image_path']);
    // echo "<img src=' ".$path." ' width='50%'>";
    echo "
            <div class='col-md-3 mb-3'>
                    <div class='card shadow-lg'>
                        <div class='card-body d-flex justify-content-center align-item-center'>
                            <img src='" . $path . "' width='100' height='150' class='rounded-circle pic'>
                        </div>
                        <div class='card-footer d-flex justify-content-around align-item-center'>
                            <span>" . $image_name . "</span>
                            <i class='fa fa-save save-icon' aria-hidden='true' data-locations='" . $path . "' style='display: none;cursor:pointer'></i>
                            <i class='fa fa-spinner d-none fa-spin loader' aria-hidden='true' data-locations='" . $path . "' style='cursor:pointer'></i>
                            <i class='fa fa-edit edit-icon' aria-hidden='true' data-locations='" . $path . "' style='cursor:pointer'></i>
                            <i class='fa fa-download download-icon' aria-hidden='true' data-locations='" . $path . "' file-name='" . $image_name . "' style='cursor:pointer'></i>
                            <i class='fa fa-trash trash-icon delete-icon' aria-hidden='true' data-locations='" . $path . "' style='cursor:pointer'></i>
                        </div>
                    </div>
            </div>
            ";

}
?>