<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 24-3-2015
 * Time: 17:24
 */

$filename = "logs.txt";
if($_POST['log'] == "clear") {
    $handle = fopen($filename, "w");
    fwrite($handle, "");
}else if($_POST['log'] == "get"){
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    echo $contents;
}else{
    $handle = fopen($filename, "r+");
    $contents = fread($handle, filesize($filename));

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $txt = $ip." [".date("d-m-Y H:m:s")."] ".$_POST['log'];

    fwrite($handle, $txt."\n");
}
fclose($handle);



?>