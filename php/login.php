<?php
    required("database.php");
    $username = base64_decode($_POST['username']);
    $password = md5(base64_decode($_POST['password']));
    $check_user = "SELECT username FROM users WHERE username = '$username'";
    $response = $db->query($check_user);
    if($response->num_rows != 0) 
    {
        $check_password = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";
        $response_password = $db->query($check_password);
        if( $response_password -> num_rows != 0)
        {
            $check_status = "SELECT status FROM users WHERE username = '$username' AND password = '$password' and status = 'active'";
            $response_status = $db->query($check_status);
            if($response_status->num_rows != 0)
            {
                echo "login success";
            }
            else{
                echo "activation pending";
            }
        }
        else{
            echo "wrong password";
        }
    }
    else{
        echo "user not found";
    }


?>