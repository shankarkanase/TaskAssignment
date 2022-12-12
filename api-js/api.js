$(document).ready(function () {

    $("#register").click(function () {

        $("#register").html("Processing...");

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var password = $("#password").val();

        $.ajax({
            url: "ajax/registerAction.php",
            type: "post",
            data: {
                name: name,
                email: email,
                phone: phone,
                password: password
            },
            success: function (result) {
                var response = JSON.parse(result);

                $("#msgDiv").show();

                if (response.code == 400) {
                    $("#msgDiv").addClass('alert-danger');
                    $("#msgDiv").html(response.message);
                }
                if (response.code == 200) {
                    $("#msgDiv").removeClass('alert-danger');
                    $("#msgDiv").addClass('alert-success');
                    $("#msgDiv").html(response.message);

                    $("#name").val("");
                    $("#email").val("");
                    $("#phone").val("");
                    $("#password").val("");

                    $("#registerForm").trigger("reset");

                }
                $("#register").html("Register");
            }
        });
    });

    $("#login").click(function () {

        $("#login").html("Processing...");


        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
            url: "ajax/loginAction.php",
            type: "post",
            data: {
                email: email,
                password: password
            },
            success: function (result) {
                var response = JSON.parse(result);

                $("#msgDiv").show();

                if (response.code == 400) {
                    $("#msgDiv").addClass('alert-danger');
                    $("#msgDiv").html(response.message);
                }
                if (response.code == 200) {
                    $("#msgDiv").removeClass('alert-danger');
                    $("#msgDiv").addClass('alert-success');
                    $("#msgDiv").html(response.message);


                    $("#email").val("");

                    $("#password").val("");

                    $("#loginForm").trigger("reset");

                    window.setTimeout(function () {
                        window.location = "addTask.php";
                    }, 2000);

                }
                $("#login").html("Login");
            }
        });
    });

    $("#addtask").click(function () {

        $("#addtask").html("Processing...");

        var form_data = new FormData($('#addTaskForm')[0]);

        $.ajax({
            url: "ajax/addTaskAction.php",
            type: 'POST',
            data: form_data,
            async: false,
            processData: false,
            contentType: false,
            success: function (result) {
                var response = JSON.parse(result);

                $("#msgDiv").show();

                if (response.code == 400) {
                    $("#msgDiv").addClass('alert-danger');
                    $("#msgDiv").html(response.message);
                }
                if (response.code == 200) {
                    $("#msgDiv").removeClass('alert-danger');
                    $("#msgDiv").addClass('alert-success');
                    $("#msgDiv").html(response.message);

                    $("#tasks").val("");
                    $("#subject").val("");
                    $("#note").val("");
                    $("#attachment").val("");


                    $("#addTaskForm").trigger("reset");

                    window.setTimeout(function () {
                        window.location = "addTask.php";
                    }, 3000);

                }
                $("#addtask").html("Save");
                $('html, body').animate({ scrollTop: '0px' }, 100);


            }
        });
    });



    $("#addNote").click(function () {

        var count = $(".noteDiv section").length;
        $(".noteDiv section:last").append('<section><h4> Note ' + (count + 1) + '</h4 ><div class="form-group"><label for="firstName">Subject<span class="mandatory">*</span></label><textarea class="form-control" id="subject" name="note_subject[]" placeholder="Enter Subject"></textarea><div id="subjectError" class="mandatory"></div></div><div class="form-group"><label for="firstName">Attachment<span class="mandatory">*</span></label><input type="file" class="form-control" id="attachment" name="attachment_' + count + '[]" multiple><div id="descriptionError" class="mandatory"></div></div><div class="form-group"><label for="firstName">Note<span class="mandatory">*</span></label><textarea class="form-control" id="note" name="note[]" placeholder="Enter Note"></textarea><div id="descriptionError" class="mandatory"></div></div></section>');

    });

    $("#removeNote").click(function () {

        var count = $(".noteDiv section").length;

        if (count > 1) {
            $(".noteDiv section:last").remove();
        }

    });

});

