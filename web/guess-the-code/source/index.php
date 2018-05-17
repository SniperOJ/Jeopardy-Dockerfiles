<?php 
session_start();
if(empty($_SESSION['login']))
{
	$_SESSION['login']=1;
}
else
{
	if(empty($_COOKIE['list']))
	{
		$a = [];
		if(!empty($_POST))
			array_push($a,$_POST['a']);

		setcookie('list',serialize($a));

		foreach ($a as $key => $value) {
			echo $key,$value;
		}
	}
	else
	{
		$a = unserialize($_COOKIE['list']);

		if(!empty($_POST) && is_array($a))
			array_push($a,$_POST['a']);

		setcookie('list',serialize($a));

		foreach ($a as $key => $value) {
			echo $value;
		}
	}

}

#try to read flag.php	
Class whatthefuck{
	public function __toString()
	{
		return highlight_file($this->source,true);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>guess the code</title>
</head>
<body>
<form method="post">
<input type="text" name="a">
<button type="submit" >submit</button>

































































































































































































<p hidden>#try to read flag.php	
Class whatthefuck{
	public function __toString()
	{
		return highlight_file($this->source,true);
	}
}</p>
</form>
</body>
</html>
