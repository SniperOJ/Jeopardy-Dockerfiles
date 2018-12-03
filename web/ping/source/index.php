<h1>Ping test</h1>
<form method="POST">
    IP:
    <input name="command" type="text" placeholder="baidu.com"/>
    <input name="ping" type="submit"/>
</form>
<?php
/**
 * Try to read /flag
 */
if(!isset($_POST['command'])) {
    show_source(__FILE__);
    die();
}

$command = $_POST['command'];

function filter($data) {
    $black_list = array('"', "'", " ", "\t", "\n");
    foreach ($black_list as $key) {
        $data = str_replace($key, '', $data);
    }
    return $data;
}

echo str_replace("\n", "</br>\n", shell_exec('ping -c 1 '.filter($command)));
?>


