<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="snow-container">
			  <div class="snow foreground"></div>
			  <div class="snow foreground layered"></div>
			  <div class="snow middleground"></div>
			  <div class="snow middleground layered"></div>
			  <div class="snow background"></div>
			  <div class="snow background layered"></div>
</div>

<div class="top-buttons-agileinfo">
<a href="login.php"  class="active">Login</a><a href="register.php">Register</a>
</div>
<h1>PHP Homework Platform Login
</h1>
<div class="main-agileits">
		<div class="form-w3-agile">
			<h2 class="sub-agileits-w3layouts">Login</h2>
			<form action="#" method="post">
					<input type="text" name="username" placeholder="username" required="" />
					<input type="password" name="password" placeholder="password" required="" />
				<div class="submit-w3l">
					<input type="submit" value="Login">
				</div>
				<p class="p-bottom-w3ls"><a href="register.php">Click Register</a>If you don't have an account.</p>
			</form>
		</div>
		</div>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

</body>
</html>
<?php
define("login","1");
include("login_p.php");
?>