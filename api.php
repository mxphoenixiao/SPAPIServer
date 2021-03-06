<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header("Content-Type:application/json");
require "data.php";

$data_info = json_decode(file_get_contents('php://input'),true);
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$errors = $response['data_info']['errors'];

if(!empty($data_info))
{
    //API 1
    if ($request =="validate_conn")
    {
	$name1=$data_info["email"];
	$name2=$data_info["emailconn"];
        $match=validate_connection($name1,$name2);
	
	if($match=="True")
	{
		response(200,"True",$match);
	}
	else
	{
		response(200,"False",NULL);
	}
     }

    //API 2
    if ($request =="retrieve_list")
    {
	$name1=$data_info["email"];
        $match=retrieve_list($name1);
	
	if(count($match)>0)
	{
		response(200,"True",$match);
	}
	else
	{
		response(200,"False",NULL);
	}
     }

    //API 3
    if ($request =="retrieve_comm")
    {
	$name1=$data_info["email"];
	$name2=$data_info["emailconn"];
        $match=retrieve_comm($name1，$name2);
	
	if(count($match)>0)
	{
		response(200,"True",$match);
	}
	else
	{
		response(200,"False",NULL);
	}
     }

    //API 4
    if ($request =="subscribe_update")
    {
	$name1=$data_info["requestor"];
	$name2=$data_info["target"];
        $match=subscribe_update($name1，$name2);
	
	if($match=="True")
	{
		response(200,"True",$match);
	}
	else
	{
		response(200,"False",NULL);
	}
     }

    //API 5
    if ($request =="block_update")
    {
	$name1=$data_info["requestor"];
	$name2=$data_info["target"];
        $match=block_update($name1，$name2);
	
	if($match=="True")
	{
		response(200,"True",$match);
	}
	else
	{
		response(200,"False",NULL);
	}
     }

    //API 6
    if ($request =="receive_update")
    {
	$name1=$data_info["sender"];

        $match=receive_update($name1);
	
	if($match=="True")
	{
		response(200,"True",$match);
	}
	else
	{
		response(200,"False",NULL);
	}
     }
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	$response['count']=count($data);
	
	$json_response = json_encode($response);
	echo $json_response;
}

?>