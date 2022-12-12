function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

$(document).ready(function () {

    var task_id = getUrlVars()["id"];

    $.ajax({
        url: "ajax/notesListAction.php",
        type: "POST",
        data: { task_id: task_id },
        success: function (result) {
            var response = JSON.parse(result);

            if (response.code == 200) {
                $("#msgDiv").removeClass('alert-danger');
                $("#msgDiv").html("");
                var task_data = response.data;

                task_data.forEach(task => {

                    var attachments = task.attachments;

                    var attach_files = '';
                    attachments.forEach(attachment => {
                        attach_files = attach_files + "<i class='fa fa-file'></i>&nbsp;<a href='attachments/" + attachment.attachment + "' target='_blank'>" + attachment.attachment + "</a><br>";
                    });
                    $("#table tbody").append("<tr><td>" + task.subject + "</td><td>" + task.note + "</td><td>" + attach_files + "</td></tr>");
                });

                $('#table').dataTable({
                    "bPaginate": false,
                    "aaSorting": []
                });
            }
            else {
                $("#msgDiv").addClass('alert-danger');
                $("#msgDiv").html(response.message);
            }

        }
    });

});



