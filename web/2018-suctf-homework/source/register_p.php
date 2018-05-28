<?php
if(login!=1) die("Permission denied");

include("function.php");
include("config.php");

if(isset($_POST['username'])&&isset($_POST['password1'])&&isset($_POST['password2'])){
	if($_POST['username']==null||$_POST['password1']==null||$_POST['password2']==null){
		die("Something empty.");
	}elseif ($_POST['password1']!==$_POST['password2']) {
		die("Different passwords.");
	}
	$username=w_addslashes($_POST['username']);
	$password=md5(w_addslashes($_POST['password1']));

	$repeat="select * from user where username='".$username."'";
	if(sql_result($repeat,$mysql)){
		exit("<h1>Username already exists.</h1>");
	}

	$sql="insert into user(username,password) values('".$username."','".$password."')";
	if(sql_result($sql,$mysql)=="Failed"){
		die("<h1>Register failed.</h1>");
	}else{
		echo("<h1>Register success.</h1>");
		header("Location: login.php");
	}
}elseif(isset($_COOKIE['user'])&&isset($_COOKIE['cookie-check'])){
	header("Location: index.php");
}
?>