<?php 

$post_data ='';
 
//$post_data = implode('&',$post_data);
 
$url='http://www.kuaidaili.com/proxylist/2/';
 
$result=file_get_contents($url);
 
echo $result;


?>