<?php 
	
	/*This page is to provide functions for a particular user*/
	include_once("master_login.inc");
	include_once("connect_to_database.php");

	function user_login($uid,$username)
	{
		// log in the user and create a entry in the user_session
		session_start();
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $username;
		global $session;
		$session = session_id();
		$query = "INSERT INTO user_session (session_id, logged_in, user_id ,created)
					values ('$session',1,'$uid',now())";
		$result = mysql_query($query) or die(mysql_error());
		/*$nrows = mysql_num_rows($result);
		if($nrows==0)
		{
			echo"something went wrong while creating the session, please contact the admin..";
		}*/
	}

	function user_logout($uid)
	{
		// destroy the session and delete entry from the user session table
		$query = "DELETE FROM user_session WHERE user_id='$uid'";
		$result = mysql_query($query) or die("couldn't execute user_logout query");
		$nrows = mysql_num_rows($result);
		if($nrows==0)
		{
			echo"something went wrong while destroying the session, please contact the admin..";
		}
		session_destroy();
		header('Location: login.php');
	}

	// function to check if the user is online
	function user_online($uid)
	{
		global $session;
		// search in the user_seesion table if the user is logged in
		$query = "SELECT * FROM user_session where user_id ='$uid' ";
		$result= mysql_query($query) or die("couldnot execute query");
		$nrows = mysql_num_rows($result);
		$nrows==0 ?-1 :1;
		return $nrows;
	}

	function get_user_id($username)
	{
		$query = "SELECT * FROM user_login_master where username = '$username'";
		$result= mysql_query($query) or die("couldnot execute query");
		$nrows = mysql_num_rows($result);
		if($nrows==0){ return "-1" ;}
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			return $userID;
		}
		return 0;
	}

	function user_firstname($uid)
	{
		$query = "SELECT * FROM user_detail_master where userID = $uid";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			return $firstname;
		}
	}	

	function user_lastname($uid)
	{
		$query = "SELECT * FROM user_detail_master where userID = $uid";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			return $lastname;
		}
	}

	function user_sex($uid)
	{
		$query = "SELECT * FROM user_detail_master where userID = $uid";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			return $sex;
		}
	}

	function user__dob($uid)
	{
		$query = "SELECT * FROM user_detail_master where userID = $uid";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			return $dob;
		}

	}

	function user_email($uid)
	{
		$query = "SELECT * FROM user_detail_master where userID = $uid";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			return $email;
		}
	}

	function get_username($uid)
	{
		return user_firstname($uid).' '.user_lastname($uid);
	}

?>