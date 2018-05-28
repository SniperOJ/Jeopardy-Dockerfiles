<?php
if(login!=1) die("Permission denied");

include("config.php");
include("function.php");


if(isset($_POST['username'])&&isset($_POST['password'])){
	if($_POST['username']==NULL||$_POST['password']==NULL){
		die("username or password is null.....");
	}elseif (strlen($_POST['username'])>32||strlen($_POST['password'])>32) {
		die("username or password too long.....");
	}
	$username=w_addslashes($_POST['username']);
	$password=w_addslashes($_POST['password']);

	$sql="select password from user where username='".$username."'";
	$result=sql_result($sql,$mysql);
	$pwd_hash=$result['0']['0'];
	if($pwd_hash===md5($password)){
		setcookie("cookie-check",md5($username.md5($password)),time()+60*60);
		setcookie("user",$username,time()+60*60);
		header("Location: index.php");
	}else{
		die("Password wrong......");
	}
}elseif(isset($_COOKIE['user'])&&isset($_COOKIE['cookie-check'])){
	header("Location: index.php");
}
?>