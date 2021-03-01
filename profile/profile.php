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
            <a href="php/logout.php" class="nav-link" href="php/logout.php">
              <i class="fa fa-sign-out" style="font-size:18px"></i>
              Logout
            </a>
          </li>
        </ul>
     </nav>
     <br>
     <div class="upload-notice fixed-top"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 p-5 border">
                      <div class="d-flex mb-5 flex-column justify-content-center align-items-center w-100 bg-white rounded-lg shadow-lg" style="height:250px">
                           <i class="fa fa-folder-open upload-icon" style="font-size:80px;cursor:pointer;"></i>
                                 <h4 class="upload-header">UPLOAD FILES</h4>
                                        <span class="free-space">
                                                    <?php

$get_status = "SELECT plans,storage,used_storage FROM users WHERE username = '$username'";
$response = $db->query($get_status);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
$plans = $data['plans'];
if ($plans == "starter" || $plans == "free") {
    $free_space = $total - $used;
    echo "FREE SPACE : " . $free_space . " MB";
} else {
    echo "FREE SPACE : UNLIMITED";
}

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
$get_status = "SELECT plans,storage,used_storage FROM users WHERE username = '$username'";
$response = $db->query($get_status);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
$plans = $data['plans'];
if ($plans == "starter" || $plans == "free") {
    $display = "d-block";
    echo $used . "MB/" . $total . "MB";
    $percentage = round(($used * 100) / $total, 2);
    $color = "";
    if ($percentage > 80) {
        $color = "bg-danger";
    } else {
        $color = "bg-primary";
    }
} else {
    $display = "d-none";
    echo "used storage : " . $used . "MB";

}

?>
                                        </span>
                                                <div class="progress w-50 my-2 <?php echo $display ?>" style="height:10px">
                                                          <div class="progress-bar memory-progress <?php echo $color ?>" style="width: <?php
echo $percentage, '%';
?>">
<?php
echo $percentage;
?>

 </div>
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
                    <a href="gallery.php" class="image-link text-black">
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
if ($response) {
    $data = $response->fetch_assoc();
    echo $data['total'] . " PHOTOS";

    $_SESSION['table_name'] = $table_name;
} else {
    echo "0 PHOTOS";
}

?>
                           </span>


              <div>



            </div>


                </div>
                <div class="d-flex mb-5 flex-column justify-content-center align-items-center w-100 bg-white rounded-lg shadow-lg" style="height:250px">
                    <a href="shop.php" class="text-black memory-link">
                           <i class="fa fa-shopping-cart mb-1" style="font-size:80px;cursor:pointer;"></i>
                           </a>
                           <h4>BUY MEMORY</h4>
                           <span>
                              STARTING FROM $99/month
                           </span>


              <div>



            </div>


                </div>


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
<?php
$current_date = date('Y-m-d');
$get_expiry_date = "SELECT plans,expiry_date,full_name FROM users WHERE username = '$username'";
$response = $db->query($get_expiry_date);
$data = $response->fetch_assoc();

$plans = $data['plans'];
if ($plans != "free") {
    $expiry_date = $data['expiry_date'];

    $cal_date = new DateTime($expiry_date);
    $cal_date->sub(new DateInterval('P5D'));
    $five_date_before = $cal_date->format('Y-m-d H:i:s');

    if ($current_date == $five_date_before) {
        echo "<div class='alert alert-warning rounded-0 shadow-lg fixed-top py-3'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>You have only 5 days left to renew your plan.</b></div>";
    } else if ($current_date > $five_date_before) {
        $manual_expiry_date = $date_create($expiry_date);
        $manual_current_date = $date_create($current_date);

        $date_diff = date_diff($manual_current_date, $manual_expiry_date);
        $left_days = $date_diff->format('%a');
        echo "<div class='alert alert-warning rounded-0 shadow-lg fixed-top py-3'><i class='fa fa-times-circle close' data-dismiss='alert'></i><b>You have only " . $left_days . " days left to renew your plan.</b></div>";
        if ($current_date >= $expiry_date) {
            $amount;
            $storage;
            if ($plans == "starter") {
                $amount = 99;
                $storage = 1024;
            } else {
                $amount = 500;
                $storage = 'unlimited';
            }
            $renew_link = "php/payment.php?amount=" . $amount . "&plans=" . $plans . "&storage=" . $storage;
            $_SESSION['renew'] = 'yes';
            $_SESSION['buyer_name'] = $data['full_name'];
            echo "<div class='d-flex alert alert-warning rounded-0 shadow-lg fixed-top py-3'>
      <h4 class='flex-fill '>plan expire chose an action</h4>
      <a href='" . $renew_link . "' class='btn btn-primary mx-3'>Renew old product</a>
      <a href='shop.php' class='btn btn-primary mr-3 shadow-sm'>Purchase new plan</a>
      <a href='php/logout.php' class='btn btn-light shadow-lg'>Log out</a>
    </div>";

            echo "<style>
      .upload-icon,.memory-link,.image-link{pointer-events:none}
    </style>";
        }
    }

}

?>