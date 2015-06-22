<?php
	
	include_once("Includes/master_login.inc");
	include_once("Includes/connect_to_database.php");
	include_once("Includes/Users.php");
	include_once("Includes/Friends.php");
	include_once("Includes/current_page_url.php");
	include_once("Javascript/XML.js");
	include_once("profile_display.php");

	//session_start();

	if(!user_online($_SESSION['uid']))	
	{
		header('Location :login.php');
	}

	$uid = $_SESSION['uid'];
	$username = $_SESSION['username'];
	//$action = $_GET["action"];
	echo "<html>";
	echo "<body>";
	echo "<form action='action.php?action=profile-image-upload' method='POST' enctype='multipart/form-data'>";
	echo "<input type='file' name='img_file' id='img_file' />";
	echo "<input type='submit' value='Submit' name='s'>";
	echo "</form>";
	//echo "<form action=''>";
	//echo "<input type='submit' value='Back to Profile'/>
	echo"</form>";
	echo"</body>";
	echo "</html>";




?>