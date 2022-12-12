<?php

/************************** Include Neccesary Files *********************/
include('../inc/api_config.php');
include('../classes/class.api.php');
/***********************************************************************/

/************************* Create instance of Api *************/
$api = new Api();

$data = array(
	"name" => $_POST['name'],
	"email" => $_POST['email'],
	"phone" => $_POST['phone'],
	"password" => $_POST['password']
);


$response = $api->CallAPI("POST", API_HOST . REGISTER_API, $data);

echo $response;
