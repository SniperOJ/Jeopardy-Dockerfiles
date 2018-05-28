<?php

function sql_result($sql,$mysql){
	if($result=mysqli_query($mysql,$sql)){
		$result_array=mysqli_fetch_all($result);
		return $result_array;
	}else{
		 echo mysqli_error($mysql);
		 return "Failed";
	}
}

function upload_file($mysql){
	if($_FILES){
		if($_FILES['file']['size']>2*1024*1024){
			die("File is larger than 2M, forbidden upload");
		}
		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			if(!sql_result("select * from file where filename='".w_addslashes($_FILES['file']['name'])."'",$mysql)){
				$filehash=md5(mt_rand());
				if(sql_result("insert into file(filename,filehash,sig) values('".w_addslashes($_FILES['file']['name'])."','".$filehash."',".(strrpos(w_addslashes($_POST['sig']),")")?"":w_addslashes($_POST['sig'])).")",$mysql)=="Failed") die("Upload failed");
				$new_filename="./upload/".$filehash.".txt";
				move_uploaded_file($_FILES['file']['tmp_name'], $new_filename) or die("Upload failed");
				die("Your file ".w_addslashes($_FILES['file']['name'])." upload successful.");
			}else{
				$hash=sql_result("select filehash from file where filename='".w_addslashes($_FILES['file']['name'])."'",$mysql) or die("Upload failed");
				$new_filename="./upload/".$hash[0][0].".txt";
				move_uploaded_file($_FILES['file']['tmp_name'], $new_filename) or die("Upload failed");
				die("Your file ".w_addslashes($_FILES['file']['name'])." upload successful.");
			}
		}else{
			die("Not upload file");
		}
	}
}



function w_addslashes($string){
	return addslashes(trim($string));
}



function do_api($module,$args){
	$class = new ReflectionClass($module);
	$a=$class->newInstanceArgs($args);
}
?>