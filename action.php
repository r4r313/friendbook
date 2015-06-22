<?php

	include_once("Includes/master_login.inc");
	include_once("Includes/connect_to_database.php");
	include_once("Includes/Users.php");
	include_once("Includes/Friends.php");
	include_once("Includes/current_page_url.php");
	include_once("Includes/Status_Likes_Comment.php");
	include_once("Includes/upload_photo.php");
	include_once("Includes/message.php");

	include_once("JavaScript/XML.js");
	include_once("profile_display.php");

	$action = $_GET["action"];
	$uid = $_SESSION['uid'];

	if($action=='status-update')	update_status($uid,$_POST["status-data"]);
	
	if($action=='Like-Status')		like_status($uid,$_GET["postid"]);

	if($action=='Unlike-Status')    unlike_status($uid,$_GET["postid"]);

	if($action=='post-comment')		post_comment($uid,$_POST["postid"],$_POST["comment-data"]);

	if($action=='Delete-Comment')	delete_comment($uid,$_POST["cmntid"]);

	if($action=='Like-Comment')		like_comment($uid,$_POST["cmntid"]);

	if($action=='Unlike-Comment')	unlike_comment($uid,$_POST["cmntid"]);

	if($action=='image-upload')		upload_image($uid,$_FILES["img_file"]["name"],$_FILES["img_file"]["tmp_name"]);

	if($action=='profile-image-upload')	upload_profile_image($uid,$_FILES["img_file"]["name"],$_FILES["img_file"]["tmp_name"]);

	if($action=="Chat-Send") {add_message($uid,$_POST["to"],$_POST["message"]); }
	if($_GET["action"]!="")
  		header("Location: ".$_SERVER['HTTP_REFERER']);
		if($_SERVER['HTTP_REFERER']=="") header("Location: Index.php");
		if($action=="Account-Logout") header("Location: Index.php");
		if($redirect!=-1){
  			$ref = $_SERVER['HTTP_REFERER'];
  			eregi("^([^\?]*)\??([^\?]*)$",$ref,$ref);
  			header("Location: ".$ref[1].$redirect);
 		 }

?>