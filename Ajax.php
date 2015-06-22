<?php

	include_once("Includes/master_login.inc");
	include_once("Includes/connect_to_database.php");
	include_once("Includes/Users.php");
	include_once("Includes/Friends.php");
	include_once("Includes/current_page_url.php");
	include_once("JavaScript/XML.js");
	include_once("profile_display.php");
	include_once("Includes/Status_Likes_Comment.php");
	include_once("Includes/NewsFeed.php");
	$action = $_GET["action"];
	$uid = $_SESSION['uid'];

	if(!user_online($uid)){$action=0;}

	if($action=="Add-Friend")	{ add_friend($uid,$_POST["uid"]); if($_POST["refresh"]="profile") echo display_profile($_POST["uid"]); }	
	if($action=="Respond-Friend-Request")	{friend_accept($_POST["uid"],$uid); if($_POST["refresh"]="profile") echo display_profile($_POST["uid"]); }
	if($action=="Like-Status")	{ like_status($uid,$_POST["postid"]); if($_POST["refresh"]="home")	echo "Unlike"; }
	if($action=="Chat-Send") {add_message($uid,$_POST["to"],$_POST["message"]); echo display_message($uid,$_POST["to"]);}
?>