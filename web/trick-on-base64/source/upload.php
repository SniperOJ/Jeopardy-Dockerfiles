<!DOCTYPE html>
<html>
	<body>

		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit">
		</form>

	</body>
</html>

<?php

function random_string($length) {
	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

if($_FILES['file']){
	$target_dir = "upload/";
	$filename = md5(random_string(0x20)).'.php';
	$path = $target_dir.$filename;
	$content = preg_replace(
		'/[^0o]/',
		'',
		file_get_contents($_FILES['file']['tmp_name'])
	);
	file_put_contents(
		$path,
		$content
	);
	die('File: '.$path.' uploaded!');
}

?>
