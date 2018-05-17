<?php
    $content = '<?php exit(0); ?>';
    $content .= $_POST['code'];
    $filename = md5(time()).'.php';
    $path = 'upload/'.$filename;
    file_put_contents($path, $content);
    show_source(__FILE__);
?>
