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
    "subject" => $_POST['subject'],
    "description" => $_POST['description'],
    "start_date" => $_POST['start_date'],
    "due_date" => $_POST['due_date'],
    "status" => $_POST['status'],
    "priority" => $_POST['priority'],
    "user_id" => $session->getSession('id'),
    "token" => $session->getSession('token')
);



$data['note_subject'] = $_POST['note_subject'];
$data['note'] = $_POST['note'];



$count = 0;
foreach ($_POST['note'] as $note) {


    $innercount = 0;
    foreach ($_FILES['attachment_' . $count]['tmp_name'] as $tmp_name) {
        $data['file_name'][$count][$innercount] = $_FILES['attachment_' . $count]['name'][$innercount];
        $data['file_data'][$count][$innercount] = file_get_contents($tmp_name);
        $innercount++;
    }
    $count++;
}

//Call API to add Task, Note and attachment
$response = $api->CallAPI("POST", API_HOST . ADD_TASK_API, $data);

echo $response;
