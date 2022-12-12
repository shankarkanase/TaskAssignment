<?php

include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.task.php');
/***********************************************************************/

/************************* Create instance of User connect to the database *************/
$task = new Task();
$conn = $task->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$task->dbh($conn);

$tasks = $task->getTasks($_POST['user_id']);

$response = array(
    "message" => $message,
    "code" => $responseCode,
    "tasks" => $tasks
);

header("HTTP/1.1 " . $code . " " . $responseValue);
echo json_encode($response);
