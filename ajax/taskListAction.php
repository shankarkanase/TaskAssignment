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
    "filter_status" => $_POST['filter_status'],
    "filter_due_date" => $_POST['filter_due_date'],
    "filter_priority" => $_POST['filter_priority'],
    "filter_notes" => $_POST['filter_notes']
);


//Call API to add Task, Note and attachment
$response = $api->CallAPI("POST", API_HOST . TASK_LIST_API, $data);

echo $response;
