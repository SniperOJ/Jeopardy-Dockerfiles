<?php

/*
 * I stored flag.txt at baidu.com
 */

show_source(__FILE__);

if(isset($_GET['url'])){
    $url = parse_url($_GET['url']);
    if(!$url){
        die('Can not parse url: '.$_GET['url']);
    }
    if(substr($_GET['url'], strlen('http://'), strlen('baidu.com')) === 'baidu.com'){
        die('Hey, papi, you have to bypass this!');
    }
    if(
        $url['host'] === 'baidu.com'
    ){
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $_GET['url']);
        curl_exec($ch);
        curl_close($ch);
    }else{
        die('Save it, hacker!');
    }
}


