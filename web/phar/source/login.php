<!DOCTYPE html>
<html>
<head>
	<title>CTF</title>
</head>
<body>

	登陆解锁更多功能
	<form action="login.php" method="POST">
		用户名 : <input name="username" placeholder="username"><br/>
		密码 : <input name="password" placeholder="password"><br/><br/>
		<input type="submit" value="登陆">
	</form>
</body>
</html>

<?php
	require_once('config.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username === "admin" && sha1(md5($password)) === $admin_hash){
			echo '<script>alert("Login seccess!");</script>';
		}else{
			if (isset($_GET['debug'])){
				if($_GET['debug'] === 'hitctf'){
					$logfile = "log/".$username.".log";
					$content = $username." => ".$password;
					file_put_contents($logfile, $content);

				}else{
					echo '<script>alert("Login failed!");</script>';
				}
			}else{
				echo '<script>alert("Login failed!");</script>';
			}
		}
	}else{
		echo '<script>alert("Please input username and password!");</script>';
	}
?>
