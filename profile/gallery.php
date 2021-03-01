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
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/edit_photo.js"></script>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/profile.js"></script>
    <style>
    span:focus{
        outline:2px dashed red;
        padding:2px;
        box-shadow:0px 0px 5px grey;
    }
    </style>
  </head>
  <body style="background:#FCD0CF">
     <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">
            <?php
require "../php/database.php";
$email = $_SESSION['username'];
echo $email;

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
     <div class="container">
     <div class="row load-image">

        </div>
        </div>

      <div class="modal mt-5 animated bounceIn " id="view-modal">
        <div class="modal-dialog">
        <i class="fa fa-times-circle float-right text-white" aria-hidden="true" data-dismiss="modal"></i>
          <div class="modal-content">

            <div class="modal-body">

            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
    $(document).ready(function(){
        $(".pic").each(function(){
          $(this).click(function(){
            var image = document.createElement("img");
            image.src = $(this).attr("src");
            image.style.width = "100%";
            $(".modal-body").html(image);
             $("#view-modal").modal('show');
            // alert("");

          });
        });
    });
    //load image
    $(document).ready(function(){
      var starting_point = 0;
      var ending_point = 12;
      load();
      function load(){
        $.ajax({
          type: "POST",
          url:"load_image.php",
          cache: false,
          data:{
            start : starting_point,
            end : ending_point
          },
          success: function(response){
            $(".load-image").append(response);
          }
        });
      }
      //load image on scroll
      $(window).scroll(function(){
        var scroll_top = $(window).scrollTop();
        var browser_height = $(window).height();
        var max_height = scroll_top+browser_height;
        var webpage_height = $(document).height();

        if(max_height >= webpage_height-10)
        {
          starting_point = starting_point+ending_point;
          load(starting_point, ending_point);
        }

      });
    });
    </script>
  </body>
</html>

