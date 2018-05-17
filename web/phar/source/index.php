<?php
if(isset($_GET['page'])){
	$file = $_GET['page'].'.php';
	include($file);
}else{
	header("Location: /?page=login");
	die();
}
?>
