<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- ==============Required meta tags========== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- ============Bootstrap CSS============= -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- ===========fa fa-icon============= -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- ==============google fonts================-->
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
    <!-- ======Optional JavaScript======== -->
    <!-- =======jQuery first, then Popper.js, then Bootstrap JS====== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/ajax_random_password.js"></script>
    <script src="js/index.js"></script>
    <script src="js/ajax_user_check.js"></script>
    <script src="js/ajax_user_signup.js"></script>
    <script src="js/ajax_activate.js"></script>
   
  </head>
  <body>
      <div class="container-fluid" id="web-page" style="background-image: url('img/background.png');">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4 p-4">
                <img src="img/main_pic.jpg" alt="main_pic" class="shadow-lg">
              </div>
              <div class="col-md4 p-2">
              <h3 class="ml-2 p-3" class="heading">SIGN UP</h3>
              <form autocomplete="off">
                <input type="text" name="fullname" id="fullname" placeholder="Enter your name" required="required">
                  <br><br>

                  <div id="email-box">
                <input type="email" id="email" name="email" placeholder="Enter your email" required="required">
                  <i class="fa fa-circle-o-notch fa-spin email-icon d-none"></i> 
              </div>

            <br>

                <div id="password-box">
                <input type="text" id="password" name="password" placeholder="password" required="required">
                <i class="fa fa-eye show-icon"></i>
                </div>



                <br>
                
                <button class="btn float-left py-2">CLICK GENERATE To IMPROVED SECURITY </button>
                <button class="btn btn-dark float-right generate-btn">GENERATE</button>
                <br><br>
                <button class="btn float-left submit-btn  btn-dark" disabled="disabled">Register</button>
                <br>
                <div id="sign_up_notice" class="p-2">
                
                </div>
              </form>
              <br>
              <br>
              <div class="px-2 activator ">
              <span>check your email to get activation code</span>
              <br><br>
              <input type="text" name="code" id="code" class="py-2 p-2" placeholder="activation-code">
              <button class="btn btn-dark activate-btn">Active now</button>
              </div>
              </div>
      </div>
 
  </body>
</html>