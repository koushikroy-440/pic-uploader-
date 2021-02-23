<?php
 session_start();
 $table_name = $_SESSION['table_name'];
 require("../../php/database.php");
 $path = $_POST['photo_path'];
 $complete_path = "../".$span;
if(unlink("../".$path))
{
    //echo "delete success";
    // $delete_query = = "DELETE FROM $table_name WHERE image_path = '$complete_path' ";
    $delete_query = "DELETE FROM $table_name WHERE image_path = '$complete_path' ";
    if($db->query($delete_query))
    {
        echo "delete success";
    }
    else{
        echo "delete failed";
    }

}
else{
    echo "delete failed";
}


?>