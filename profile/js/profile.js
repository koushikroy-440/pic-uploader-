
 $(document).ready(function(){
     $(".upload-icon").click(function(){
         var input = document.createElement("INPUT");
         input.type = "file";
         //input.name = "data";
         input.accept = "image/*";
         input.click();
         input.onchange = function(){
             var file = new FormData();
             file.append("data",this.files[0]);
             $.ajax({
                 type : "POST",
                 url :"php/upload.php",
                 data : file,
                 contentType : false,
                 processData : false,
                 cache : false, 
                 success : function(response){
                        alert(response);
                 }
             });
         }

     });
 });