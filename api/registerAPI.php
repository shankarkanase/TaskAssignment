<?php

include('../inc/config.php');
include('../classes/class.db.php');
include('../classes/class.users.php');
/***********************************************************************/

/************************* Create instance of User connect to the database *************/
$user = new Users();
$conn = $user->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_DRIVER);
$user->dbh($conn);

if (trim($_POST['name']) == '') {
	$message = "Name is required";
	$responseCode = 400;
	$responseValue = "Error";
} else if (trim($_POST['email']) == '') {
	$message = "Email is required";
	$responseCode = 400;
	$responseValue = "Error";
} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$message = "Invalid Email Address";
	$responseCode = 400;
	$responseValue = "Error";
} else if (trim($_POST['phone']) == '') {
	$message = "Phone number is required";
	$responseCode = 400;
	$responseValue = "Error";
} else if (!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $_POST['phone'])) {
	$message = "Invalid Phone number. Phone number should be 10 digits long";
	$responseCode = 400;
	$responseValue = "Error";
} else if (trim($_POST['password']) == '') {
	$message = "Password is required";
	$responseCode = 400;
	$responseValue = "Error";
} else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['password'])) {
	$message = "Password must be 8 character long and must contain atleast one uppercase and lowercase letter";
	$responseCode = 400;
	$responseValue = "Error";
} else {

	$parameter = array(
		"name" => $_POST['name'],
		"email" => $_POST['email'],
		"phone" => $_POST['phone'],
		"password" => md5($_POST['password'])
	);

	$id = $user->addUser($parameter);

	if ($id != '') {
		$message = "Registration Successful!!!";
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
