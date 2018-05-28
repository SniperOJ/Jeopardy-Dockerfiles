<?php
	include("function.php");
	include("config.php");
	include("calc.php");

	if(isset($_GET['action'])&&$_GET['action']=="view"){
		if($_SERVER["REMOTE_ADDR"]!=="127.0.0.1") die("Forbidden.");
		if(!empty($_GET['filename'])){
			$file_info=sql_result("select * from file where filename='".w_addslashes($_GET['filename'])."'",$mysql);
			$file_name=$file_info['0']['2'];
			echo("file code: ".file_get_contents("./upload/".$file_name.".txt"));
			$new_sig=mt_rand();
			sql_result("update file set sig='".intval($new_sig)."' where id=".$file_info['0']['0']." and sig='".$file_info['0']['3']."'",$mysql);
			die("<br>new sig:".$new_sig);
		}else{
			die("Null filename");
		}
	}

	$username=w_addslashes($_COOKIE['user']);
	$check_code=$_COOKIE['cookie-check'];
	$check_sql="select password from user where username='".$username."'";
	$check_sum=md5($username.sql_result($check_sql,$mysql)['0']['0']);
	if($check_sum!==$check_code){
		header("Location: login.php");
	}

	$module=$_GET['module'];
	$args=$_GET['args'];
	do_api($module,$args);
?>