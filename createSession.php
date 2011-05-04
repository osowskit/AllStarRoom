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
    if (isset($_POST["userid"]))
        $userId = $_POST["userid"];    
    if ($userId === 0)
        exit;  	
        
    $sessionId = 0;
    
    $con = mysql_connect('localhost', 'thomas', 'default');
        
    if (!con)
    {
        echo "could not connect";
        die('Error could not connect');
    }

    //see if session exists        
    {
        mysql_select_db("ajax_demo", $con);

        $sql    ="SELECT `sessionId` FROM `user`
            WHERE userid ='" . $userId . "'";
        $result = mysql_query($sql);

        $first  = mysql_fetch_array($result);   
        $sessionId = $first[0];        
    }        



    if ($sessionId == 0)
    {
        require_once 'SDK/API_Config.php';
        require_once 'SDK/OpenTokSDK.php';

        $apiObj     = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);

        $session    = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
        $sessionId  = $session->getSessionId();        
        $sql        = "UPDATE `ajax_demo`.`user` SET `sessionId`='".$sessionId."' WHERE `userId`='".$userId."'";
        $result = mysql_query($sql);        
    }
    
    mysql_close($con);
    echo $sessionId;
?>
