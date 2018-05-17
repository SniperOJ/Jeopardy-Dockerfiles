
<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
	setcookie('hint', 'select * from users where username=\'admin\' and password=\'md5($password, true)\'');
	if ((isset($_POST['username'])) && (isset($_POST['password']))){
		/* Get data */
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* Check the admin */
		if ($username === "admin"){
			/* Connect */
			$db_host = 'mysql';
			$db_name = 'ctf';
			$db_user = 'root';
			$db_pwd = 'root';
			$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
			if(mysqli_connect_error()){
			    echo 'Database conntection error!';
			}
			$mysqli->set_charset("utf8");
			/* Query */
			$password = md5($password, true);
			$sql = "select * from users where username='$username' and password='$password'";
			$result = $mysqli->query($sql);
			// if($result === false){//执行失败
			//     echo $mysqli->error;
			//     echo $mysqli->errno;
			// }
			if (($result->num_rows) > 0){
				echo "Login success!";
				setcookie("flag","SniperOJ{md5_V5_injection}");
				header("flag: SniperOJ{md5_V5_injection}");
			}else{
				echo "Login failed!";
			}
			/* Close*/
			$mysqli->close();
		}else{
			echo '<script>alert("Only admin is able to login!");</script>';
		}
	}else{
		echo '<script>alert("请填写用户名和密码");</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>Login as admin, plz!</title>
</head>
<body>
<h1>Login as admin, plz!</h1>
<form method="POST">
	Username : <input type="text" name="username"><br>
	Password : <input type="password" name="password"><br>
	<input type="submit"><br>
</form>
</body>
</html>
