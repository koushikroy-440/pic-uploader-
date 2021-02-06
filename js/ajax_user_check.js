$(document).ready(function(){
    $("#email").on("change",function(){
        if($(this).val() != "")
        {
            $.ajax({
                type : "POST",
                url : "php/check_user.php",
                data : {
                    username : btoa($(this).val())
                },
                beforeSend : function(){
                    $(".email-icon").removeClass("d-none");
                },
                success : function(response){
                    // $(".email-icon").addClass("d-none");
                    // alert(response);
                    if(response.trim() == "user found")
                    {
                        $(".email-icon").removeClass("fa fa-circle-o-notch fa-spin");
                        $(".email-icon").addClass("fa fa-times-circle");
                    }
                    else{
                        $(".email-icon").removeClass("fa fa-circle-o-notch fa-spin");
                        $(".email-icon").addClass("fa fa-check-circle text-primary")
                        $(".submit-btn").removeAttr("disabled");
                    }
                }
            });
        }
    })
});