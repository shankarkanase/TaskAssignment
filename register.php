<?php
$pageTitle = "Login";
include('inc/preLogin.header.inc.php');
?>



<body class="login-body">
    <div class="container">
        <form class="form-signin" method="post">

            <h2 class="form-signin-heading">Register</h2>
            <form id="registerForm">
                <div class="login-wrap">
                    <div class='col-md-12 alert d-none' id="msgDiv"></div>

                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" autofocus>

                    <input type="text" class="form-control" placeholder="email" name="email" id="email">

                    <input type="text" class="form-control" placeholder="phone" name="phone" id="phone" maxlength="11">

                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">

                    <button class="btn btn-lg btn-login btn-block" type="button" name="register" id="register" value="register">Register</button>
                    <hr>
                    <a href="index.php"><button class="btn btn-lg btn-login btn-block" type="button" name="login" value="Login">Login</button></a>

                </div>
            </form>

        </form>
    </div>
</body>

<?php
include('inc/preLogin.footer.inc.php');
?>