<?php
$url='http://www.thomas-bayer.com/sqlrest/CUSTOMER/?';
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response=curl_exec($ch);
$parsedXML=simplexml_load_string($response);//<-CONVERTING XML TO ARRAY
var_dump($parsedXML);


?>