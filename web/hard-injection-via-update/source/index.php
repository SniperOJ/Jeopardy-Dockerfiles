<?php
echo 'UPDATE `$_GET[\'table\']` SET `username`=\'admin\' WHERE `id`=1;'."<br>\n";
echo "?table=users<br>\n";
$conn = mysqli_connect('mysql', 'root', 'root');
mysqli_select_db($conn, 'ctf');
$table = addslashes($_GET['table']);
$sql = "UPDATE `{$table}`
        SET `username`='admin'
        WHERE id=1";
if(!mysqli_query($conn, $sql)) {
        echo(mysqli_error($conn));
}
mysqli_close($conn);
?>
