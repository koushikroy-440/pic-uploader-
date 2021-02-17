<?php

   $new_name = $_POST['photo_name'];
   $old_path = $_POST['photo_path'];
   $pathinfo = pathinfo($old_path) ;
   $dirname = $pathinfo['dirname'];
   $extension = $pathinfo['extension'];
  if(file_exists("../".$dirname."/".$new_name.".".$extension))
  {
        alert("file already exist please enter other name");
  }
  else{
           if(rename("../".$old_path,"../".$dirname."/".$new_name.".".$extension))
           {
               echo "success";
           }
           else{
                echo "failed";
           }
  }



?>