<?php
	
	include_once("Includes/master_login.inc");
	include_once("Includes/connect_to_database.php");
	include_once("Includes/Users.php");
	include_once("Includes/Friends.php");
	include_once("Includes/current_page_url.php");
	include_once("Javascript/XML.js");
	include_once("Javascript/chat.js");
	include_once("profile_display.php");
	
	if(!user_online($_SESSION['uid']))	
	{
		header('Location :login.php');
	}

	$uid = $_SESSION['uid'];
	$username = $_SESSION['username'];

	$url = curPageURL();
	$parsed = parse_url($url);
	$ref= $parsed["path"];
	$pieces = explode("/", $ref);

	//echo $pieces[3];

	// fetch username from the url whose profile page to display

	$profile_name = $pieces[3];
	
	//echo $profile_name;

	if($profile_name!=null)
	{
		$profile_id = get_user_id($profile_name);
		display_profile($profile_id);
	}


?>