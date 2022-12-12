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

    $note_data = $task->getNotes($_POST['task_id']);
    $message = "Data fetched successfully";
    $responseCode = 200;
    $responseValue = "OK";
}

if ($note_data > 0) {
    $response = array(
        "message" => $message,
        "code" => $responseCode,
        "data" => $note_data
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
