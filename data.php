<?php

//API 1
function validate_connection($name1,@name2)
{
   $value1 ="True";
   $value2 ="False";
	$emailconn = array(
		"email"=>'andy@example.com',
		"emailconn"=>'john@example.com',
                "addconn" => 'False',
	         );

		if($emailconn["email"]==$name1 && $emailconn["emailconn"]==$name2) ||($emailconn["email"]==$name2 && $emailconn["emailconn"]==$name1)
		{
                        $emailconn["addconn"]= 'True';
			return $value1;
			break;
		}
                else
                {
                       return $value2;
                       break;
                }
}


//API 2
function retrieve_list($name1)
{
   $value1 ="True";
   $value2 ="False";
	$emailsource = 'andy@example.com';
	$emailconn = array(
		"emailconn"=>'john@example.com',
	         );

		if($emailsource==$name1)
		{
		       return $emailconn;
		       break;
		}
                else
                {
                       return $emailconn;
                       break;
                }
}

//API 3
function retrieve_comm($name1,@name2)
{
   $value1 ="True";
   $value2 ="False";
	$emailcomm = 'comm@example.com';
	$emailconn = array(
		"email"=>'andy@example.com',
		"emailconn"=>'john@example.com',
	         );

                if($emailconn["email"]==$name1 && $emailconn["emailconn"]==$name2) ||($emailconn["email"]==$name2 && $emailconn["emailconn"]==$name1)
		{
		       return $emailcomm;
		       break;
		}
                else
                {
                       return $emailcomm;
                       break;
                }
}

//API 4
function subscribe_update($name1,@name2)
{
   $value1 ="True";
   $value2 ="False";
	$emailsource = 'lisa@example.com';
	$emaildest = 'john@example.com';

                if($emailsource == $name1)
		{
                       $emailsource = $emaildest;
		       return $value1;
		       break;
		}
                else
                {
                       return $value2;
                       break;
                }
}

//API 5
function block_update($name1,@name2)
{
   $value1 ="True";
   $value2 ="False";

	$emailconn = array(
		"email"=>'andy@example.com',
		"emailconn"=>'john@example.com',
                "friends"=>'True',
                "comm"=>'True',
                "addconn"=>'True',
	         );

                if($emailconn["email"]==$name1 && $emailconn["emailconn"]==$name2)
		{
                     if ($emailconn["friends"] == "True")
                      {
                        $emailconn["comm"] = "False";
                      }
                     else
                      {
                        $emailconn["addconn"] = "False";
                      }
		       return $value1;
		       break;
		}
                else
                {
                       return $value2;
                       break;
                }
}

//API 6
function receive_update($name1)
{
   $value1 ="True";
   $value2 ="False";

	$emailconn = array(
		"email"=>'john@example.com',
		"emailconn1"=>'lisa@example.com',
		"emailconn2"=>'kate@example.com',
                "friends"=>'True',
                "comm"=>'True',
                "addconn"=>'True',
	         );
        @data = array();
                if($emailconn["email"]==$name1)
		{
                     if ($emailconn["friends"] == "True" &&  $emailconn["comm"] == "True" &&  $emailconn["addconn"] == "True")
                      {
                        @data = array("recipients" =>$emailconn["emailconn1"],
                        "recipients" =>$emailconn["emailconn2"],);
                        return @data;
		        break;
                      }
		}

}
?>