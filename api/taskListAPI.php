<?php
include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.users.php');
include('../classes/class.task.php');
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
    $message = "Authentication failed";
    $responseCode = 400;
    $responseValue = "Error";
} else {

    $task_data = $task->getTasks($_POST['user_id'], $_POST['filter_status'], $_POST['filter_due_date'], $_POST['filter_priority'], $_POST['filter_notes']);
    $message = "Data fetched successfully";
    $responseCode = 200;
    $responseValue = "OK";
}

if ($task_data > 0) {
    $response = array(
        "message" => $message,
        "code" => $responseCode,
        "data" => $task_data
    );
} else {
    $response = array(
        "message" => $message,
        "code" => $responseCode
    );
}


//Sending the response back
header("HTTP/1.1 " . $code . " " . $responseValue);
echo json_encode($response);
