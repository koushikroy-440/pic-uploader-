$(document).ready(function (){
    $(".edit-icon").each(function(){
       $(this).click(function(){
           var edit_icon = $(this);
          var image_path = $(this).attr("data-locations");
          var footer = this.parentElement;
          var span = footer.getElementsByTagName("SPAN")[0];
          span.contentEditable = "true";
          span.focus();
        $(this).hide();
        $(this).addClass("d-none");
       var save_icon = footer.getElementsByClassName("save-icon")[0];
       var loader = footer.getElementsByClassName("loader")[0];
       //$(save_icon).removeClass("d-none");
       save_icon.style.display = "block";
       save_icon.style.color = "red";
        $(save_icon).click(function () {
            var photo_name = span.innerHTML;
            $.ajax({
               type: "POST",
               url :"php/rename.php",
                data: {
                    photo_name : photo_name,
                    photo_path : image_path
                },
                beforeSend: function (){
                    $(loader).removeClass("d-none");
                    $(save_icon).addClass("d-none");
                    
                },
                success: function (response) {
                    // alert(response);
                    if(response.trim() == "file already exist please enter other name")
                    {
                        alert(response);
                        $(save_icon).removeClass("d-none");
                        $(loader).addClass("d-none");
                        span.focus();
                    }
                    else if(response.trim() == "success")
                    {
                        span.innerHTML = photo_name;
                        span.contentEditable = "false";
                        $(save_icon).addClass("d-none");
                        $(loader).addClass("d-none");
                        $(edit_icon).removeClass("d-none");
                    }
                }
            });
        });
       });
    });
});
//----------------------
//download
//--------------------
$(document).ready(function (){
    $(".download-icon").each(function () {
        $(this).click(function(){
          var download_link = $(this).attr("data-locations");
          var image_name = $(this).attr("file-name");
          var a = document.createElement("A");
          a.href = download_link;
          a.download = image_name;
          a.click();
        });
    });
});

//-----------------
//delete
//---------------------
$(document).ready(function (){
    $(".trash-icon").each(function(){
        $(this).click(function(){
            $.ajax({
                type: "POST",
                url: "./php/delete_photo.php",
                data : {
                    photo_path : $(this).attr("data-locations")
                },
                beforeSend : function(){
                    $(this).removeClass("fa fa-trash");
                    $(this).addClass("fa fa-spinner fa-spin");
                },
                success : function (response) {
                    alert(response);
                }
            });
            
        });
        
    });
});