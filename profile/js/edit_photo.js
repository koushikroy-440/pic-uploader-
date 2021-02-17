$(document).ready(function (){
    $(".edit-icon").each(function(){
       $(this).click(function(){
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
                    alert(response);
                }
            });
        });
       });
    });
});