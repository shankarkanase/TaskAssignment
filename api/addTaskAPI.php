<?php

include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.task.php');
include('../classes/class.users.php');
/***********************************************************************/

/************************* Create instance of User connect to the database *************/
$task = new Task();
$conn = $task->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$task->dbh($conn);

$user = new Users();
$conn = $user->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$user->dbh($conn);



$validToken = $user->validateToken($_POST['token']);

if (!$validToken) {
    $message = "API authentication failed..";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['subject']) == '') {
    $message = "Subject is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['description']) == '') {
    $message = "Description is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['start_date']) == '') {
    $message = "Start date is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['due_date']) == '') {
    $message = "Due date is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (strtotime($_POST['start_date']) > strtotime($_POST['due_date'])) {
    $message = "Start date cannot be greater than Due date";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['status']) == '') {
    $message = "Status is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['priority']) == '') {
    $message = "Priority is required";
    $responseCode = 400;
    $responseValue = "Error";
} else {

    //Add Task data
    $parameter = array(
        "subject" => $_POST['subject'],
        "description" => $_POST['description'],
        "start_date" => $_POST['start_date'],
        "due_date" => $_POST['due_date'],
        "status" => $_POST['status'],
        "priority" => $_POST['priority'],
        "user_id" => $_POST['user_id']
    );

    $task_id = $task->addTask($parameter);

    //Add Notes data
    $count = 0;
    foreach ($_POST['note_subject'] as $note_subject) {

        $parameter = array(
            "task_id" => $task_id,
            "subject" => $note_subject,
            "note" => $_POST['note'][$count]
        );

        $note_id = $task->addNote($parameter);

        //Add Attachment data
        $filecount = 0;
        foreach ($_POST['file_name'][$count] as $filename) {

            file_put_contents("../attachments/" . $filename, $_POST['file_data'][$count][$filecount]);

            $attchment_parameter = array(
                "note_id" => $note_id,
                "attachment" => $filename
            );
            $task->addAttachment($attchment_parameter);
            $filecount++;
        }

        $count++;
    }


    //Return the succes response
    if ($task_id != '') {
        $message = "Task Added Successfully!!!";
        $responseCode = 200;
        $responseValue = "OK";
    } else {
        $message = "Error Occured. Please try again..";
        $responseCode = 400;
        $responseValue = "Error";
    }
}

$response = array(
    "message" => $message,
    "code" => $responseCode
);


//Sending the response back
header("HTTP/1.1 " . $code . " " . $responseValue);
echo json_encode($response);
