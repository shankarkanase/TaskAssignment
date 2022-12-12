<?php

include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.users.php');
/***********************************************************************/

/************************* Create instance of User connect to the database *************/
$user = new Users();
$conn = $user->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$user->dbh($conn);

if (trim($_POST['email']) == '') {
    $message = "Email is required";
    $responseCode = 400;
    $responseValue = "Error";
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid Email Address";
    $responseCode = 400;
    $responseValue = "Error";
} else if (trim($_POST['password']) == '') {
    $message = "Password is required";
    $responseCode = 400;
    $responseValue = "Error";
} else {


    $loginResponse = $user->userLogin($_POST['email'], $_POST['password']);

    if (is_array($loginResponse)) {
        $message = "Login Successful. Redirecting...";
        $responseCode = 200;
        $responseValue = "OK";
        $userData = $loginResponse;
    } else {
        $message = "Login failed. Please try again..";
        $responseCode = 400;
        $responseValue = "Error";
    }
}

if (is_array($userData)) {

    $token = $user->generateToken($userData['id']);

    $userData['token'] = $token;

    $response = array(
        "message" => $message,
        "code" => $responseCode,
        "userData" => $userData
    );
} else {
    $response = array(
        "message" => $message,
        "code" => $responseCode
    );
}
header("HTTP/1.1 " . $code . " " . $responseValue);
echo json_encode($response);
