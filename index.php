<?php
$pageTitle = "Login";
include('inc/preLogin.header.inc.php');
?>

<body class="login-body">
	<div class="container">
		<form class="form-signin" method="post">

			<h2 class="form-signin-heading">Sign in now</h2>

			<form id="loginForm">
				<div class="login-wrap">
					<div class='col-md-12 alert d-none' id="msgDiv"></div>
					<input type="text" class="form-control" placeholder="Email Address" name="email" id="email" autofocus>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password">

					<button class="btn btn-lg btn-login btn-block" type="button" name="login" id="login" value="Login">Sign in</button>
					<hr>
					<a href="register.php"><button class="btn btn-lg btn-login btn-block" type="button" name="login" value="Login">Register</button></a>

				</div>
			</form>

		</form>
	</div>
</body>
<?php
include('inc/preLogin.footer.inc.php');
?>