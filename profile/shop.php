<?php
require "../php/database.php";
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("Location:../index.php");
    exit;
}
$starter = '<ul class="list-group w-100">
<li class="list-group-item bg-success">
  <h3 class="text-center text-white">STARTING PLANS</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center">1 GB STORAGE</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center" style="color:#ddd">24*7 TECHNICAL SUPPORT</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center" style="color:#ddd">INSTANT EMAIL SOLUTIONS</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center" style="color:#ddd">data security</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center " style="color:#ddd">SEO SERVICES</h3>
</li>
<li class="list-group-item bg-light text-center buy-btn" amount="99" plan="starter" storage="1024" style="cursor:pointer">
<h4><i class="fa fa-inr"></i>99.00/monthly</h4>

</li>
</ul>';

$exclusive = '<ul class="list-group w-100">
<li class="list-group-item bg-success">
  <h3 class="text-center text-white">EXCLUSIVE PLANS</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center">UNLIMITED STORAGE</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center" >24*7 TECHNICAL SUPPORT</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center">INSTANT EMAIL SOLUTIONS</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center">data security</h3>
</li>
<li class="list-group-item">
  <h3 class="text-center ">SEO SERVICES</h3>
</li>
<li class="list-group-item bg-light text-center buy-btn" amount="500" plan="exclusive" storage="unlimited" style="cursor:pointer">
<h4><i class="fa fa-inr"></i>500.00/monthly</h4>

</li>
</ul>';

$get_plans = "SELECT  plans FROM users WHERE username = '$username'";
$response = $db->query($get_plans);
$data = $response->fetch_assoc();
$plans = $data['plans'];

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
//$get_name = "SELECT full_name FORM users WHERE username ='$email' ";
// $response = $db->query($get_name);
// $name = $response->fetch_assoc();
// echo $name['full_name'];
$_SESSION['buyer_name'] = $email;
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
              <div class="col-md-6 p-5">
              <?php
if ($plans == "free") {
    echo $starter;
} else if ($plans == "starter") {
    echo "<button class='btn btn-light shadow-lg p-5'>You are currently using starter plan</button>";
}
?>
              </div>


              <div class="col-md-6 p-5">
              <?php
if ($plans == "free" || $plans == "starter") {
    echo $exclusive;
}
?>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-5 text-center">
                      <?php
if ($plans == "exclusive") {
    echo "<button class='btn btn-light shadow-lg p-5'>
                              <h1>
                                YOU are using our most expensive plan
                              </h1>

                            </button>";
}

?>
                 </div>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/profile.js"></script>
    <script>
      $(document).ready(function(){
        $(".buy-btn").each(function(){
          $(this).click(function(){
              var amount = $(this).attr("amount");
              var plan = $(this).attr("plan");
              var storage = $(this).attr("storage");
              location.href = "php/payment.php?amount="+amount+"&plan="+plan+"&storage="+storage;

          });
        });
      });
    </script>
  </body>
</html>
