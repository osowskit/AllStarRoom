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
    
    $userId = 0;
            
    if (isset($_POST["userId"]))
		$userId = $_POST["userId"];
	else
		return;

	session_start();
	$strUser	= "'".$userId."'";

	echo $_SESSION[$strUser][0].",".$_SESSION[$strUser][1];	
?>
