$(document).ready(function () {

    $('#table').dataTable({
        "bPaginate": false,
        "aaSorting": [],
        "bFilter": false
    });

    taskList();


    $("#filter_task_btn").click(function () {
        taskList();
    });

});

var taskList = function () {

    var filter_status = $("#filter_status :selected").val();
    var filter_due_date = $("#filter_due_date").val();
    var filter_priority = $("#filter_priority :selected").val();
    var filter_notes = $("#filter_notes").prop("checked") ? "1" : "0";

    $.ajax({
        url: "ajax/taskListAction.php",
        type: "POST",
        data: {
            filter_status: filter_status,
            filter_due_date: filter_due_date,
            filter_priority: filter_priority,
            filter_notes: filter_notes

        },
        success: function (result) {
            var response = JSON.parse(result);

            if (response.code == 200) {
                $("#msgDiv").removeClass('alert-danger');
                $("#msgDiv").html("");
                var task_data = response.data;

                $('#table').dataTable().fnDestroy();
                $("#table tbody").html("");

                task_data.forEach(task => {
                    $("#table tbody").append("<tr><td>" + task.subject + "</td><td>" + task.description + "</td><td>" + task.start_date + "</td><td>" + task.due_date + "</td><td>" + task.status + "</td><td>" + task.priority + "</td><td><a href='listNotes.php?id=" + task.id + "' target='_blank'>View Notes</a></td></tr>");
                });



                $('#table').dataTable({
                    "bPaginate": false,
                    "aaSorting": [],
                    "bFilter": false
                });

            }
            else {
                $("#msgDiv").addClass('alert-danger');
                $("#msgDiv").html(response.message);
            }

        }
    });
}

