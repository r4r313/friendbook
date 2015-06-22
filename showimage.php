<?php
	
	include_once("Includes/master_login.inc");
	include_once("Includes/connect_to_database.php");
	include_once("Includes/Users.php");
	include_once("Includes/Friends.php");
	include_once("Includes/current_page_url.php");
	include_once("Includes/upload_photo.php");
	include_once("Javascript/XML.js");
	include_once("profile_display.php");

	//session_start();
	if(!user_online($_SESSION['uid']))
	{
		header('Location :login.php');
	}

	$uid = $_SESSION['uid'];
	$username = $_SESSION['username'];

	$image_path = fetch_profile_image_path($uid);
	if(is_null($image_path))
		echo"hello der";

	echo $image_path.'.jpg';

	echo "$uid";
	//$profile_image_path = "../user_images/".fetch_profile_image_path($uid);

	//echo "$profile_image_path";
	echo "<img src='$image_path'/>";
?>
