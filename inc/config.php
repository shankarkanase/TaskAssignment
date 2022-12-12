<?php

/************************************************
	File Name - Config.php
	Purpose - To define contants and settings
 *************************************************/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'db_task_assignment');
define('DB_DRIVER', 'MySql');
define('KEY', md5('youcantseeme'));
define('SITE_URL', 'https://workimpi.cloud/TaskAssignment/');
define('SITE_NAME', 'TaskManagement');
define('EMAIL_FROM', 'TaskManagement');
define('EMAIL_FROM_NAME', 'TaskManagement');
define('EMAIL_REPLY_TO', 'admin@taskmanegement.com');
define('EMAIL_REPLY_TO_NAME', 'TaskManagement');
ini_set('display_errors', '0');
set_time_limit(600);
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
