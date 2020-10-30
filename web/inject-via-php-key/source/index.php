<?php
error_reporting(0);

if(preg_match("/\_/i",$_SERVER["QUERY_STRING"])) {
	die();
}

include "conn.php";
$conn = mysqli_connect($host, $dbuser, $dbpass);

if(!$conn) {
	echo "Failed to connect to MySQL: " . mysqli_error();
}

mysqli_select_db($conn,$dbname) or die ( "Unable to connect to the database: $dbname");

foreach($_GET as $value => $key) {
	$sql="SELECT * FROM words WHERE id=('$value') LIMIT 0,1";
	echo $sql."\n";
	$result=mysqli_query($conn,$sql);
}

if (!isset($_GET['release'])) {
	show_source(__FILE__);
}

?>
