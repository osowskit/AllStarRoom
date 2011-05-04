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
            
    $con = mysql_connect('localhost', 'thomas', 'default');
        
    if (!con)
    {
        echo "could not connect";
        die('Error could not connect');
    }

    //Query list of users
    {               
        mysql_select_db("ajax_demo", $con);

        $sql    ="SELECT * FROM `user`";            ;
        $result = mysql_query($sql);       
    } 
    
    //return values
    {       
        echo "<select id='userList'>";
        echo "<option value='0'>Please Choose User</option>";
        while ($row = mysql_fetch_array($result))
        {
            
            echo "<option value='".$row[0]."'>".$row[1]." ".$row[2];
            echo "</option>";
        }        
        echo "<option value='-1'>Add New User</option>";
        echo "</select>";
    }
    
    mysql_close($con);    
?>
