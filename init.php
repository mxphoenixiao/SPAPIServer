<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header("Content-Type:application/json");
   $email_info = array("email" => "andy@example.com", "emailconn" => "john@example.com"); 
   $email_info4 = array("requestor" => "lisa@example.com", "target" => "john@example.com"); 
   $email_info5 = array("requestor" => "andy@example.com", "target" => "john@example.com"); 
   $email_info6 = array("sender" => "john@example.com", "text" => "Hello World! kate@example.com");       
        //API 1 -- create a friend connection between two email addresses
	if(isset($_POST['submit1']))
	{
		$match = callAPI('POST','http://localhost/api.php?action=validate_conn', json_encode($email_info));
		$result = json_decode($match,true);
		
		echo $result ->data; 
	}

        //API 2 -- retrieve the friends list for an email address
	if(isset($_POST['submit2']))
	{
		$match = callAPI('POST','http://localhost/api.php?action=retrieve_list', json_encode($email_info));
		$result = json_decode($match,true);
		
		echo $result ->data; 
	}

        //API 3 -- retrieve the common friends list between two email addresses
	if(isset($_POST['submit3']))
	{
		$match = callAPI('POST','http://localhost/api.php?action=retrieve_comm', json_encode($email_info));
		$result = json_decode($match,true);
		
		echo $result ->data; 
	}

        //API 4 -- subscribe to updates from an email address
	if(isset($_POST['submit4']))
	{
		$match = callAPI('PUT','http://localhost/api.php?action=subscribe_update', json_encode($email_info4));
		$result = json_decode($match,true);
		
		echo $result ->data; 
	}

        //API 5 -- block updates from an email address
	if(isset($_POST['submit5']))
	{
		$match = callAPI('PUT','http://localhost/api.php?action=block_update', json_encode($email_info5));
		$result = json_decode($match,true);
		
		echo $result ->data; 
	}

        //API 6 --  retrieve all email addresses that can receive updates from an email address
	if(isset($_POST['submit6']))
	{
		$match = callAPI('POST','http://localhost/api.php?action=receive_update', json_encode($email_info6));
		$result = json_decode($match,true);
		
		echo $result ->data; 
	}

function callAPI($method, $url, $data){
   $curl = curl_init();

   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                         
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}

?>