<?php
	

	include_once("master_login.inc");
	include_once("connect_to_database.php");

	function get_friend_list($uid)
	{
		$query = "SELECT * FROM friends where user_id_1 ='$uid' ";
		$result = mysql_query($query) or die("couldnot execute the check friend query in Frinends");
		$nrows = mysql_num_rows($result);
		if($nrows==0){ return -1;}
		$friend_list = array("");
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			if($isfriend_1==1 && $isfriend_2==1)
			{
				array_push($friend_list, $user_id_2);
			}
		}
		return $friend_list;
	}

	function add_friend($uid1,$uid2)
	{
		$query = "INSERT INTO friends (user_id_1, user_id_2, isfriend_1,isfriend_2) values($uid1, $uid2,1,0)";
		$result = mysql_query($query) or die(mysql_error());
		$query = "INSERT INTO friends (user_id_1, user_id_2, isfriend_1,isfriend_2) values($uid2, $uid1,0,1)";
		$result = mysql_query($query) or die(mysql_error());
	}

	function friend_accept($uid1,$uid2)
	{
		$query = "UPDATE friends SET isfriend_2 =1 , isfriend_1=1, created = now() where user_id_1= '$uid2'  and user_id_2='$uid1'";
		$result = mysql_query($query) or die("couldnot execute the friend accept 1st query in Friends");
		$query = "UPDATE friends SET isfriend_1 =1  ,isfriend_2=1 ,created = now() where user_id_1= '$uid1'  and user_id_2='$uid2'";
		$result = mysql_query($query) or die("couldnot execute the friend accept 2nd query in Friends");
	}

	function pending_friend_request_list($uid)
	{
		$query = "SELECT * FROM friends where user_id_1 = '$uid' and isfriend_1 = 0 SORT BY created DESC";
		$result = mysql_query($query) or die("couldnot execute the pending_friend_request query in Frinends");
		$nrows = mysql_num_rows($result);
		if($nrows==0){ return "";}
		$pending_list = array("");
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			array_push($pending_list, $user_id_2);
		}
		return $pending_list;
	}


	function check_friend($uid1 , $uid2)
	{
		$query = "SELECT * FROM friends where user_id_1 ='$uid1' and user_id_2='$uid2' ";
		$result = mysql_query($query) or die("couldnot execute the check friend query in Frinends");
		$nrows = mysql_num_rows($result);
		if($nrows==0){ return 0;}
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			if($isfriend_1==1 && $isfriend_2==1)
			{
				return 3;
			}

			if($isfriend_1==1 && $isfriend_2==0)
			{
				return 1;
			}

			if($isfriend_1==0 && $isfriend_2==1)
			{
				return 2;
			}

		}
		return 0;

	}

	function ignore_friend()
	{
		// right now it dows nothing
	}

	function unfriend($uid1 , $uid2)
	{

	}

	function mutual_friend_list($uid1, $uid2)
	{

	}
	function get_friend_count($uid)
	{
		$query = "SELECT COUNT(*) FROM friends WHERE user_id_1 = '$uid' and isfriend_1 = 1 and isfriend_2=1";
		$result = mysql_query($query);
		$data=mysql_fetch_assoc($result);
		return $data['total'];
	}


?>