<?php

function HandleHeaderLine( $curl, $header_line ) {
	//echo "->".$header_line."<br/>";
	$pos=strpos($header_line,'Content-Type');
    if(gettype($pos)=='integer')
    {
    	echo $header_line;
    	
    	
    }

    return strlen($header_line);
}

$url=$_REQUEST["url"];
$method=$_REQUEST["method"];
$data=$_REQUEST["data"];
if($data!="")
$dataJson=json_decode($data,true);
else
$dataJson=array();
$ch=curl_init();


if($method=="GET")
{
	if($dataJson)
	{
		
		$url=$url."?".http_build_query($dataJson);
	}
	
	
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADERFUNCTION,'HandleHeaderLine');
	curl_setopt($ch, CURLOPT_HEADER, 1);
	$response=curl_exec($ch);
	if(curl_errno($ch))
	{
    	echo 'Curl error: ' . curl_error($ch);
    	exit();
	}
	
}
if($method=="POST")
{

	if($dataJson)
	{
		
		$postFields=http_build_query($dataJson);
	}
	else
	{
		$postFields="";
	}
	//var_dump($dataJson);
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$postFields);
	curl_setopt($ch, CURLOPT_HEADERFUNCTION,'HandleHeaderLine');
	curl_setopt($ch, CURLOPT_HEADER, 1);
	$response=curl_exec($ch);
	if(curl_errno($ch))
	{
    	echo 'Curl error: ' . curl_error($ch);
    	exit();
	}

}

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, $header_size-1, strlen($response));
echo "Response:";
echo "$header";

?>