<?php
$db = new mysqli("localhost","root","","pic_drive");
if($db->connect_error)
{
    die("database not connected");
}

?>