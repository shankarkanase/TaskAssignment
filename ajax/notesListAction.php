<?php
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
    "token" => $session->getSession('token'),
    "user_id" => $session->getSession('id'),
    "task_id" => $_POST['task_id']
);


//Call API to add Task, Note and attachment
$response = $api->CallAPI("POST", API_HOST . NOTES_LIST_API, $data);

echo $response;
