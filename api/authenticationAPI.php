<?php
include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.users.php');
/***********************************************************************/

/************************* Create instance of User connect to the database *************/
$user = new Users();
$conn = $user->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$user->dbh($conn);


$validToken = $user->validateToken($_POST['token']);

if (!$validToken) {
    $message = "Authentication failed";
    $responseCode = 400;
    $responseValue = "Error";
} else {

    $message = "Authentication Successfully";
    $responseCode = 200;
    $responseValue = "OK";
}

$response = array(
    "message" => $message,
    "code" => $responseCode
);


//Sending the response back
header("HTTP/1.1 " . $code . " " . $responseValue);
echo json_encode($response);
