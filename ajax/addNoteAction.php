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

$count = 0;

$data = array(
    "tasks" => $_POST['tasks'],
    "subject" => $_POST['subject'],
    "note" => $_POST['note']
);
foreach ($_FILES['attachment']['tmp_name'] as $tmp_name) {

    $data['files_' . $_FILES['attachment']['name'][$count]] = file_get_contents($tmp_name);
    $count++;
}


$response = $api->CallAPI("POST", API_HOST . ADD_NOTE_API, $data);

echo $response;
