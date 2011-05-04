<?php
/*!
* OpenTok PHP Library
* http://www.tokbox.com/
*
* Copyright 2010, TokBox, Inc.
*
*/
	error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', true);

    $firstName 	= 0;
    $lastName 	= 0;
    	
	if (isset($_POST["firstName"]))
		$firstName 	= $_POST["firstName"];
	if ($firstName === 0)		
		exit;
	
	if (isset($_POST["lastName"]))
		$lastName 	= $_POST["lastName"];
	if ($lastName === 0)
		exit;	
	
    $apiKey		= 0;
    $apiSecret	= 0;

	$optSQLQuery	= '';
	$optSQLValues	= '';
	
	if (isset($_POST["apiKey"]))
		$apiKey 	= $_POST["apiKey"];
	if ($apiKey != 0)
	{
		$optSQLQuery 	.= ",`api_key`";
		$optSQLValues 	.= ", '$apiKey'";
	}	
	
	if (isset($_POST["apiSecret"]))
		$apiSecret 	= $_POST["apiSecret"];
	if ($apiSecret != 0)	
	{
		$optSQLQuery 	.= ",`api_secret`";
		$optSQLValues 	.= ", '$apiSecret'";
	}		
	
	$sessionId = 0;
	if (isset($_POST["sessionId"]))
		$sessionId 	= $_POST["sessionId"];	
	if ($sessionId != 0)	
	{
		$optSQLQuery 	.= ",`sessionId`";
		$optSQLValues 	.= ", '$sessionId'";
	}
		            
    $con = mysql_connect('localhost', 'thomas', 'default');
        
    if (!con)
    {
        echo "could not connect";
        die('Error could not connect');
    }

    $db_name    = "ajax_demo";
    //Query list of users
    {               
        mysql_select_db($db_name, $con);

        $sql    = "INSERT INTO `ajax_demo`.`user` (`Firstname`, `Lastname`".$optSQLQuery.") VALUES ('$firstName', '$lastName'".$optSQLValues.")";
        //echo $sql;
        $result = mysql_query($sql);
        echo $result;
    }        
    
    mysql_close($con);    
?>
