$(document).ready(function () {

    $.ajax({
        url: "ajax/authenticationAction.php",
        success: function (result) {
            var response = JSON.parse(result);

            if (response.code == 400) {
                //Log out user if authentication is not successfull
                window.location = "logout.php";
            }

        }
    });

});

