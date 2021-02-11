$(document).ready(function () {
    $(".activate-btn").click(function () {
        var code = btoa($("#code").val());
        var username = btoa($("#email").val());
        $.ajax({
            type: "POST",
            url: "php/activator.php",
            data: {
                code: code,
                username: username
            },
            beforeSend: function () {
                $(".activation-btn").html("please wait we are checking...");
            },
            success: function (response) {
                alert(response);
            }
        });
    });
});