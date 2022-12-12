<?php
ob_start();
session_start();
/************************** Include Neccesary Files *********************/
include('../inc/api_config.php');
include('../classes/class.api.php');
include('../classes/class.session.php');
/***********************************************************************/

/************************* Create instance of Api *************/
$api = new Api();
$session = new Session();

$data = array(
    "user_id" => $session->getSession('id'),

);


$response = $api->CallAPI("POST", API_HOST . GET_TASKS_API, $data);

$response_decode = json_decode($response);

if ($response_decode->code == 200) {
    $session->setSession($response_decode->userData);
}

echo $response;
