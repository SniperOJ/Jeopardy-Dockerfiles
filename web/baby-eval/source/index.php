<?php
$str=@(string)$_GET['str'];

function blackListFilter($black_list, $var){
    foreach ($black_list as $b) {
        if(stripos($var, $b) !== False){
            die("Invaild str: $b\n");
        }
    }
}

$black_list = ["'", '"'];
blackListFilter($black_list, $str);

eval('$str="'.addslashes($str).'";');
?>
<!--
$str=@(string)$_GET['str'];
blackListFilter($black_list, $str);
eval('$str="'.addslashes($str).'";');
-->

