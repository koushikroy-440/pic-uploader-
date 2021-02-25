<?php
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("Location:../index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background:#FCD0CF">
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">
            <?php
require "../php/database.php";
$email = $_SESSION['username'];
echo $email;
// $get_name = "SELECT full_name FORM users WHERE username ='$email' ";
// $response = $db->query($get_name);
// $name = $response->fetch_assoc();
// echo $name['full_name'];
?>
        </a>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link" href="php/logout.php">
              <i class="fa fa-sign-out" style="font-size:18px"></i>
              Logout
            </a>
          </li>
        </ul>
     </nav>
     <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 p-5 border">
                      <div class="d-flex mb-5 flex-column justify-content-center align-items-center w-100 bg-white rounded-lg shadow-lg" style="height:250px">
                           <i class="fa fa-folder-open upload-icon" style="font-size:80px;cursor:pointer;"></i>
                                 <h4 class="upload-header">UPLOAD FILES</h4>
                                        <span class="free-space"> 
                                        <?php

$get_status = "SELECT storage,used_storage FROM users WHERE username = '$username'";
$response = $db->query($get_status);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
$free_space = $total-$used;
echo "FREE SPACE : ".$free_space ." MB";

?>
                                        </span>
                                                <div class="progress upload-progress-con d-none w-50 my-2" style="height:10px">
                                                      <div class="progress-bar progress-control progress-bar-animated progress-bar-striped "></div>
                                                </div>
              <div class="progress-details d-none">
              <span class="progress-percentage"></span>
            <i class="fa fa-pause-circle" aria-hidden="true"></i>
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            </div>
                </div>

                <div class="d-flex mb-5 flex-column justify-content-center align-items-center w-100 bg-white rounded-lg shadow-lg" style="height:250px">
                           <i class="fa fa-database" style="font-size:80px;cursor:pointer;"></i>
                                 <h4>MEMORY STATUS</h4>
                                        <span class="memory-status">
                                        <?php
$get_status = "SELECT storage,used_storage FROM users WHERE username = '$username'";
$response = $db->query($get_status);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
echo $used . "MB/" . $total . "MB";
$percentage = round(($used * 100) / $total, 2);
$color = "";
if ($percentage > 80) {
    $color = "bg-danger";
} else {
    $color = "bg-primary";
}

?>
                                        </span>
                                                <div class="progress w-50 my-2" style="height:10px">
                                                      <div class="progress-bar memory-progress <?php echo $color ?>" style="width: <?php
echo $percentage, '%';
?>"></div>
                                                </div>
              <div>
              <span>50%</span>
            <i class="fa fa-pause-circle" aria-hidden="true"></i>
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            </div>
                </div>
             </div>

            <div class="col-md-6 p-5 border"></div>
                <div class="col-md-3 p-5 border">
                <div class="d-flex mb-5 flex-column justify-content-center align-items-center w-100 bg-white rounded-lg shadow-lg" style="height:250px">
                <a href="gallery.php" class="text-black">
                           <i class="fa fa-image " style="font-size:80px;cursor:pointer;"></i>
                           </a>
                           <h4>GALLERY</h4>
                           <span class="count-photo">
                           <?php
$get_id = "SELECT id FROM users WHERE username = '$username'";
$response = $db->query($get_id);
$data = $response->fetch_assoc();
$table_name = "user_" . $data['id'];
$count_photo = "SELECT count(id) AS total FROM $table_name";
$response = $db->query($count_photo);
if($response)
{
  $data = $response->fetch_assoc();
  echo $data['total'] . " PHOTOS";
  
  $_SESSION['table_name'] = $table_name;
}
else{
  echo  "0 PHOTOS";
}

?>
                           </span>

              <div>



            </div>
            

                </div>
                <!-- ******************************** -->
                <div class="col-md-3 p-5 border">
                <div class="d-flex mb-5 flex-column justify-content-center">
                <a href="shop.php" class="text-black">
                           <i class="fa fa-shopping-cart" style="font-size:80px;cursor:pointer;"></i>
                           </a>
                           <h4>GALLERY</h4>
                          

              <div>
                <!-- **************************************************************** -->
          </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/profile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>
