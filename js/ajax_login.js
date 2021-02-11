$(document).ready(function () {
    $(".login-submit-btn").click(function (e) {
        e.preventDefault();
        var username = btoa($("#login-email").val());
        var password = btoa($("#login-password").val());
        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: {
                username: username,
                password: password
            },
            beforeSend: function () {
                $(".login-submit-btn").html("processing");
                $(".login-submit-btn").attr("disabled", "disabled");
            },
            success: function (response) {
                alert(response);
            }
        });
    });
}); 