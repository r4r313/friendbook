<?php
include("master_login.inc");
$connection = mysql_connect($address,$username,$password) or die("Couldn't connect to database");
$db = mysql_select_db($database_name) or die("couldnt connect ot database");
?>
