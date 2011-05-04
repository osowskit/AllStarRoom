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
    
    $userId		= 0;
        
    if (isset($_POST["userId"]))
        $userId = $_POST["userId"];    
    if ($userId === 0)
        exit;

	$streamId 	= 0;
	if (isset($_POST["streamId"]))
        $streamId = $_POST["streamId"];    
    if ($streamId === 0)
        exit;
    
    $sessionId 	= 0;
    if (isset($_POST["sessionId"]))
    	$sessionId = $_POST["sessionId"];
    if ($sessionId === 0)
        exit;	
	
	session_start();	
	
	$data				= array($sessionId,$streamId);
	$strUser	= "'".$userId."'";
	
	$_SESSION[$strUser] = $data;
	
	//print_r($_SESSION);
	echo $_SESSION[$strUser][0].",".$_SESSION[$strUser][1];

?>
