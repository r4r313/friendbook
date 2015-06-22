<?php
	include_once("master_login.inc");
	include_once("connect_to_database.php");

	function update_status($uid, $data)
	{
		$query_status = "INSERT INTO post (user_id,post_text,post_type,attachment,likes) 
						values('$uid','$data',1,0,0)";
		$result_status = mysql_query($query_status) or die(mysql_error());
	}

	function like_status($uid, $postid)
	{
		$query_like = "INSERT INTO likes (postid,user_id) 
						values($postid,'$uid')";
		$result_like = mysql_query($query_like) or die(mysql_error());

		// to avoid unnecessary looking up the table to get the number of likes update the number of likes directly in the post table
		$query_update_likes_count = "UPDATE post set likes = likes+1
									where postid = $postid";
		$result_update_likes_count = mysql_query($query_update_likes_count) or die(mysql_error());
	} 

	function check_status_like($uid,$postid)
	{
		$query_check = "SELECT * FROM likes where user_id = '$uid' and postid = $postid";
		$result_check = mysql_query($query_check) or die(mysql_error());
		$nrows = mysql_num_rows($result_check);
		return $nrows;
	}

	function unlike_status($uid,$postid)
	{
		$query_unlike ="DELETE FROM likes where user_id = '$uid' and postid = $postid";
		$result_unlike = mysql_query($query_unlike) or die(mysql_error());

		$query_update_likes_count = "UPDATE post set likes = likes-1
									where postid = $postid";
		$result_update_likes_count = mysql_query($query_update_likes_count) or die(mysql_error());

	}

	function delete_status($uid,$postid)
	{
			
	}

	function post_comment($uid,$postid,$data)
	{
		$query_post_comment = "INSERT INTO comment (postid, user_id, comment_text, likes)
								VALUES($postid,'$uid','$data',0)";
		$result_post_comment = mysql_query($query_post_comment) or die(mysql_error());

	}

	function like_comment($uid, $cmntid)
	{
		$query_like_comment  = "INSERT INTO comment_likes (cmntid, user_id) 
								values($cmntid, '$user_id')";
		$result_like_comment = mysql_query($query_like_comment) or die(mysql_error());

		// update likes in comment 

		$query_update_like = "UPDATE comment SET likes = likes+1 
							  WHERE cmntid= $cmntid";
		$result_update_like = mysql_query($query_update_like) or die(mysql_error());

	}

	function unlike_comment($uid,$cmntid)
	{
		$query_unlike ="DELETE FROM comment_likes where user_id = '$uid' and cmntid = $cmntid";
		$result_unlike = mysql_query($query_unlike) or die(mysql_error());

		$query_update_likes_count = "UPDATE comment set likes = likes-1
									where cmntid = $cmntid";
		$result_update_likes_count = mysql_query($query_update_likes_count) or die(mysql_error());
	}

	function check_comment_like($uid,$cmntid)
	{
		$query_check = "SELECT * FROM comment_likes WHERE cmntid = $cmntid";
		$result_check = mysql_query($query_check) or die(mysql_error());
		$nrows = mysql_num_rows($result_check);
		return $nrows;
	}

	function delete_comment($uid,$cmntid)
	{
		$query_delete_comment = "DELETE FROM comment where cmntid='$cmntid'";
		$result_delete_comment = mysql_query($query_delete_comment) or die(mysql_error());

		$query_delete_comment_likes = "DELETE FROM comment_likes where cmntid = $cmntid";
		$result_delete_comment_likes = mysql_query($query_delete_comment_likes) or die(mysql_error());
	}


?>