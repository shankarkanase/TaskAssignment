<?php

include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.task.php');
/***********************************************************************/

/************************* Create instance of User connect to the database *************/
$task = new Task();
$conn = $task->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$task->dbh($conn);


if (trim($_POST['tasks']) == '') {
    $message = "Task is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['subject']) == '') {
    $message = "Subject is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['note']) == '') {
    $message = "Note is required";
    $responseCode = 400;
    $responseValue = "Error";
} else {

    $parameter = array(
        "task_id" => $_POST['tasks'],
        "subject" => $_POST['subject'],
        "note" => $_POST['note']
    );

    $note_id = $task->addNote($parameter);

    foreach ($_POST as $key => $val) {
        if (substr($key, 0, 5) == 'files') {
            file_put_contents("../attachments/" . $key, $val);

            $attchment_parameter = array(
                "note_id" => $note_id,
                "attachment" => $key
            );
            $task->addAttachment($attchment_parameter);
        }
    }

    if ($note_id != '') {
        $message = "Note Added Successfully!!!";
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

header("HTTP/1.1 " . $code . " " . $responseValue);
echo json_encode($response);
