<!DOCTYPE html>
<html>
<head>
<title>PHP Homework Platform</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="images/Styles/SyntaxHighlighter.css"></link>
</head>
<body>
<!-- /home/wwwroot/default-->
<div class="snow-container">
			  <div class="snow foreground"></div>
			  <div class="snow foreground layered"></div>
			  <div class="snow middleground"></div>
			  <div class="snow middleground layered"></div>
			  <div class="snow background"></div>
			  <div class="snow background layered"></div>
			</div>

<div class="top-buttons-agileinfo">
</div>
<h1>PHP Homework Platform</h1>
<div class="main-agileits">
<?php
	include("function.php");
	include("config.php");

	$username=w_addslashes($_COOKIE['user']);
	$check_code=$_COOKIE['cookie-check'];
	$check_sql="select password from user where username='".$username."'";
	$check_sum=md5($username.sql_result($check_sql,$mysql)['0']['0']);
	if($check_sum!==$check_code){
		header("Location: login.php");
	}
?>
		<textarea name="code" class="php" rows="20" cols="55" disabled="disabled">
<?php readfile("./calc.php");?>
		</textarea>
		<div class="top-buttons-agileinfo">
			<a href="show.php?module=calc&args[]=2&args[]=a&args[]=2">calc</a>
			<a href="submit.php" class="active">Submit homework</a>
		</div>
</div>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script class="javascript" src="images/Scripts/shBrushPhp.js"></script>
	<script class="javascript">
		dp.SyntaxHighlighter.HighlightAll('code');
	</script> 
</body>
</html>