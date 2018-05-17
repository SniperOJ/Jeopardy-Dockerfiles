<?php
$flag = 'SniperOJ{hyper_t3xt_tran5fer_pr0t0cOl}';
function getIP()
{
	if (@$_SERVER["HTTP_X_FORWARDED_FOR"]){
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}else if (@$_SERVER["HTTP_CLIENT_IP"]){
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}else if (@$_SERVER["REMOTE_ADDR"]){
		$ip = $_SERVER["REMOTE_ADDR"];
	}else if (@getenv("HTTP_X_FORWARDED_FOR")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}else if (@getenv("HTTP_CLIENT_IP")){
		$ip = getenv("HTTP_CLIENT_IP");
	}else if (@getenv("REMOTE_ADDR")){
		$ip = getenv("REMOTE_ADDR");
	}else{
		$ip = "Unknown";
	}
	return $ip;
}
if ($_SERVER['HTTP_USER_AGENT'] != "SniperOJ-Web-Broswer"){
	die("You must use [SniperOJ-Web-Broswer] to view this page! Other web broswer will be denied!");
}
if (getIP() != "127.0.0.1"){
	die("Go away! Attacker! This page is only for local client!");
}
if ($_SERVER['REMOTE_PORT'] != 23333){
	die("Only port 23333 is allowed!");
}
echo $flag;
