<?php
ob_start();
session_start();
/************************** Include Neccesary Files *********************/

include('classes/class.session.php');

/***********************************************************************/

/************************* Create instance of Quote *************/
$session = new Session();

$session->logOut();
echo "You are logged out of the system. Redirecting..";
header("refresh:4;url=index.php");
exit;
/***************************************************************/
