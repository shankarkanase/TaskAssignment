<?php
ob_start();
session_start();
include('classes/class.session.php');
$session = new Session();

if ($_SESSION['name'] == '') {
	header("location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Task Management">
	<meta name="author" content="Shankar Kanase">
	<meta name="keyword" content="Task Management, Notes">
	<title>Task Management</title>
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-reset.css" rel="stylesheet">
	<!--external css-->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet" />
	<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

</head>

<body>
	<section id="container">
		<header class="header white-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>
			<!--logo start-->
			<a href="index.php" class="logo"><span style="color:#FF3333;">Task</span> Management</a>
			<!--logo end-->

			<div class="top-nav ">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">

							<span class="username">Welcome, <b><?php echo $session->getSession('name'); ?></b></span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<div class="log-arrow-up"></div>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- user login dropdown end -->
				</ul>
				<!--search & user info end-->
			</div>
		</header>