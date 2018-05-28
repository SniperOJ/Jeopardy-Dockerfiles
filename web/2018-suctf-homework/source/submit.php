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
<h1>PHP Homework Platform</h1>
<?php
	include("config.php");
	include("function.php");

	$username=w_addslashes($_COOKIE['user']);
	$check_code=$_COOKIE['cookie-check'];
	$check_sql="select password from user where username='".$username."'";
	$check_sum=md5($username.sql_result($check_sql,$mysql)['0']['0']);
	if($check_sum!==$check_code){
		header("Location: login.php");
	}
?>
<div class="main-agileits">
		<div class="form-w3-agile">
			<h2 class="sub-agileits-w3layouts">Submit Homework</h2>
			<form action="submit.php" enctype="multipart/form-data" method="post">
					<input type="file" name="file" placeholder="phpfile" required="" />
					<?php echo "<input type=\"hidden\" name=\"sig\" value=".mt_rand().">";?>
				<div class="submit-w3l">
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
		</div>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

</body>
</html>
<?php
	upload_file($mysql);
?>