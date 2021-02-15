<?php
session_start();
echo $_SESSION['username'];
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body style="background:#FCD0CF">
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">
          mr roy
        </a>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">
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
                      <div class="d-flex flex-column justify-content-center align-items-center w-100 bg-white rounded-lg shadow-lg" style="height:250px">
                           <i class="fa fa-folder-open" style="font-size:80px"></i>
                                 <h4>UPLOAD FILES</h4>
                                        <span>free space : 10MB</span>
                                                <div class="progress w-50 my-2" style="height:10px">
                                                      <div class="progress-bar progress-bar-animated progress-bar-striped w-50"></div>
                                                </div>

              <div>
              <span>50%</span>
            <i class="fa fa-pause-circle" aria-hidden="true"></i>
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            </div>
                </div>
             </div>
            <div class="col-md-6 p-5 border"></div>
                <div class="col-md-3 p-5 border"></div>
          </div>
        </div>

  </body>
</html>
