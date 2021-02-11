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
    <script src="js/ajax_login.js"></script>
   
  </head>
  <body>
      <div class="container-fluid" id="web-page" style="background-image: url('img/background.png');">
            <div class="row">

            <!-- ==================log-in column======================= -->
              <div class="col-md-4 py-4">
                      <h3 class="ml-4 p-4">LOGIN</h3>
                      <form autocomplete="off" id="login_form">
                      <div class="email-box">
                        <input type="email" name="email" id="login-email" placeholder="username" required="required">
                        </div>
                        <br>
                        <div class="password-box">
                        <input type="password" id="login-password" placeholder="username" required="required">
                          <i class="fa fa-eye login-show-icon" style="font-size:18px;"></i>
                        </div>
                        <br>
                        <button class=" btn btn-dark login-submit-btn" type="submit">login now</button>
                        <br>
                        
                        <div class="login-notice p-2" >
                          
                        </div>
                      </form>
                      <!--========= login activator box ===========-->
                      <div class="px-2 login-activator">
                        <span>Please check your email to get activation code</span>
                        <br>
                        <input type="text" placeholder="Activation code" class="py-2 p-2" id="login-code">
                        <button class="btn btn-dark login-active-btn">Active now</button>
                      </div>
              </div>
              <!--=============== image column =============== -->
              <div class="col-md-4 p-4">
                <img src="img/main_pic.jpg" alt="main_pic" class="shadow-lg w-100">
              </div>
              <!-- ============================sign-up column==================== -->
              <div class="col-md4 px-4 p-4">
              <h3 class="ml-2 p-3" class="heading">SIGN UP</h3>
              <form autocomplete="off" id="signup-form">
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
              <!--================= activation code===================== -->
              <div class="px-2 activator d-none">
              <span>check your email to get activation code</span>
              <br><br>
              <input type="text" name="code" id="code" class="py-2 p-2" placeholder="activation-code">
              <button class="btn btn-dark activate-btn">Active now</button>
              </div>
              </div>
      </div>
 
  </body>
</html>