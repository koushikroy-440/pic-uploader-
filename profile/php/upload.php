<?php
 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
    $uploaded_file =  $_FILES['data'];
    echo $uploaded_file["name"];
    echo "<br>";
    echo $upload_file["type"];
    echo "<br>";
    echo $upload_file["tmp_name"];
    echo "<br>";
    echo $upload_file["error"];

 }



?>