<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$host="localhost";
$host_username="root";
$host_passwprd="";
$db_name="db_uni_portal";

$db_link=  mysql_connect($host, $host_username, $host_passwprd) or die(mysql_error());
mysql_select_db($db_name,$db_link) or die(mysql_error());
?>
