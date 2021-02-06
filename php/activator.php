<?php
    require("database.php");
    $code = base64_decode($_POST['code']);
    $username = base64_decode($_POST['username']);
    $check_code = "SELECT activation_code FROM users WHERE username = '$username' AND activation_code = '$code'";
    $response = $db->query($check_code);
    if($response ->num_rows != 0)
    {
        $update_status = "UPDATE users SET status = 'active' WHERE username = '$username' AND activation_code = '$code' ";
        if($db->query($update_status) == true)
        {
            echo "user verified";
        }
        else{
            echo "Activation failed please try again later";
        }
    }
    else{
        echo "wrong activation code";
        // alert(response);
    }

?>