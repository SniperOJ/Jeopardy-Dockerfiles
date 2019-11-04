<?php
define("APP_ROOT",dirname(__FILE__));
define("BASE_DIR",'/tmp');

header("Content-Type:text/html;charset=utf-8");
session_start();
$flag = file_get_contents("/flag");
class Data_db extends SQLite3
{
    function __construct()
    {
        $this->open(BASE_DIR . '/logger.data');
    }
}

function rand_s($length = 8)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $password;
}

function addslashes_to_sqlite($string)
{

    for($i = 0; $i<strlen($string); $i++)
    {
        if($string[$i] == '\\' && ($i+1)< strlen($string) && $string[$i+1] != '\\')
        {
            $string[$i] = $string[$i+1];
        }
        elseif ($string[$i] == '\\')
        {
            $i = $i + 1;

        }
        else
        {
            continue;
        }

    }

    return $string;

}
