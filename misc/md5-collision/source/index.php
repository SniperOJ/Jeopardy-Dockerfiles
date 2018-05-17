<?php
	$flag = 'SniperOJ{MD5_is_the_m0st_pow3r4_encryption_algorithm_all_over_the_world}';
	if(isset($_POST['password']) && isset($_POST['username'])){
		$username = strval($_POST['password']);
		$password = strval($_POST['username']);
		if ((md5($username) === md5($password)) && ($username != $password)){
			echo $flag;
		}else{
			echo('<script>alert("Wrong!")</script>');
		}
	}else{
		echo('<script>alert("Input your username and password!")</script>');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MD5 is the world's most powerful encryption algorithm</title>
</head>
<body>
	<form method="POST">
		Username : <input type="username" name="username">
		Password : <input type="password" name="password">
		<input type="submit">
	</form>
</body>
</html>



















































































<!--
	Hint : 
		if((md5($username) === md5($password)) && ($username != $password)){
			echo $flag;
		}
-->
