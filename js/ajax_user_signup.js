$(document).ready(function () {
    $(".submit-btn").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/sign_up.php",
            data: {
                fullname: btoa($("#fullname").val()),
                username: btoa($("#email").val()),
                password: btoa($("#password").val())
            },
            cache: false,
            beforeSend: function () {
                $(".submit-btn").html("processing please wait.... ");
                $(".submit-btn").attr("disabled", "disabled");
            },
            success: function (response) {
                if (response.trim() == "sending success") {
                    $("#signup-form").fadeOut(500, function () {
                        $(".activator").removeClass("d-none");
                    });
                }
                else {
                    var message = document.createElement("DIV");
                    message.className = "alert alert-warning";
                    message.innerHTML = "<b> something went wrong please try again later";
                    $("#sign_up_notice").append(message);
                    $(".submit-btn").html("Register now");
                    $(".form").trigger('reset');
                    $('.email-loader').addClass("d-none");
                    setTimeout(function () {
                        $("#sign_up_notice").html("");
                    }, 2000);
                }
                alert(response);
            }
        });
    });
});