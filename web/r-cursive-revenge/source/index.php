<?php
// R-Cursive Revenge
// No more headers, what do you say? >_o
$token = sha1($_SERVER['REMOTE_ADDR']);
$dir = './sandbox/'.$token.'/';
is_dir($dir) ?: mkdir($dir);
if(is_file($dir.'index.php')){
    file_put_contents(
        $dir.'index.php', 
        str_replace(
            '#SHA1#', 
            $token, 
            file_get_contents('./template')
        )
    );
}
switch($_GET['action'] ?: ''){
	case 'go':
		header('Location: '.$dir);
		break;
	case 'reset':
		system('rm -rf '.$dir);
		break;
	default:
		show_source(__FILE__);
}
?>
