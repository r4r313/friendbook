<?php 
	
	include_once("Includes/Status_Likes_Comment.php");
	//include_once("JavaScript/Xml.js");

	function newsfeed_stream($uid)
	{
		// NOTE: location has not been considered in newsfeed right now.
		echo "<div class='middle-part'>";
			echo " <div class='status-box'>";
				echo " <form action='action.php?action=status-update' name='status-box' method='POST'>";
				$defaulttext = 'What on your mind.......';
				echo " <textarea name='status-data' class='status-text-box' placeholder='$defaulttext' style='color:#808080;' onClick=\"if(this.value=='$defaulttext'){ this.value=''; this.style.color='#000000'; }\" onBlur=\"if(this.value==''){ this.value='$defaulttext'; this.style.color='#808080'; }\" ></textarea>";
				echo " <input type='submit' value='Share' class='status-text-submit' onClick=\"e=document.newsfeed_write.data; if(e.value=='$defaulttext') e.value=''; \">";
				echo " </form>";
			echo " </div>";
			
		
		//echo $uid;
		//$friend_list = get_friend_list($uid);
		// limit on no of query result result was not working i need it to figure it out
		$query = "SELECT * FROM post where user_id in (
				 SELECT user_id_2 FROM friends where user_id_1='$uid' 
				 and isfriend_1 = 1 and isfriend_2=1 ) 
				UNION
				(SELECT * FROM post where user_id='$uid')
				
				 order by created DESC ";

		$result = mysql_query($query) or die(mysql_error());
		$nrows = mysql_num_rows($result);

		while($row = mysql_fetch_array($result))
		{
			echo "<div class='status'>";
					$post_user_image = 'Images/katrina.jpg';
					$post_user_name = 'katrina kaif';
					extract($row);
					echo "<div class='about-user'>";
						echo "<div class='user-img'> <img src='$post_user_image' width='50' height='50'/></div>";
						echo "<div class='user-name'> $post_user_name </div>";
					echo "</div>";

					echo"<div class='post-data'> <p>";
						echo "$post_text";
						echo "</p>";
					echo "</div>";

					if($post_type==2)
					{
						//display image
					}

					$check_like = check_status_like($uid,$postid);

					//problem is timestamp gets updated with every like or unlike

					echo "<div class='post-buttons'>";

							if($check_like==0)
							{
								// if user has not liked this post
								//echo "<a href='#' onClick=\"ajax_post('Ajax.php?action=Like-Status','postid=$postid&refresh=home','like_status_link',0);\" name='Like'><div id='like_status_link'> Like </div> </a>";
								echo "<a href='action.php?action=Like-Status&postid=$postid' name='Unlike'> Like </a>";
								echo "<a href='#' onClick='' > Comment </a>";
								echo "<a href='#' onClick='' > Share </a>";
							}
							else
							{
								//if user has already liked this post
								echo "<a href='action.php?action=Unlike-Status&postid=$postid' name='Unlike'> Unlike </a>";
								echo "<a href='#' onClick='' > Comment </a>";
								echo "<a href='#' onClick='' > Share </a>";
							}

					echo "<hr>";
					echo"</div>";


					//echo "<div class='comment-area >";
						echo "<div class='post-likes'>";
							echo "<a href='#'> <img src='Images/like_button.jpg' height='15' width='15'/>"."$likes"." like this </a>";
							echo " $created time";
							echo "<hr>";
						echo"</div>";
						
						// show all the comment on this post 
						$query_comment = "SELECT * FROM comment where postid = $postid";
						$result_comment = mysql_query($query_comment) or die(mysql_error());
						$nrows_comment = mysql_num_rows($result_comment);
						//echo $nrows_comment;
						while($row_comment = mysql_fetch_array($result_comment))
						{
							$comment_user_img = 'Images/katrina.jpg';
							$comment_user_name ='Katrina kaif';
							extract($row_comment);
							echo "<div class='post-comment' >";
								echo "<div class='user-img-comment'><img src='$comment_user_img' width='30' height='30'/></div>";
								echo "<div class='user-name-comment'><b>";
								echo "<a href='#' > $comment_user_name </b></a>";
								//echo "<b> $user_id </b> &nbsp";
								echo "$comment_text </div>";
							echo "</div>";

							echo "<div class='like-post-comment'>";
							if($user_id==$uid)
							{
								// give a option to delete the comment or edit the comment
								echo "<a href='action.php?action=Delete-Comment&cmntid=$cmntid'> Delete </a>";
							}
							// attach a link to like the comment
							$isliked = check_comment_like($uid, $cmntid);

							if($isliked==0)
							{
								echo "&nbsp;<a href='action.php?action=Like-Comment&cmntid=$cmntid'>$likes Like </a> ";
							}
							else
							{
								echo "<a href='action.php?action=Unlike-Comment&cmntid=$cmntid'>$likes Unlike </a> ";
							}
						
								echo "$created";
							
							//like-post-comment div
							echo "</div>";

							
						}
						
						$fullname = 'katrina kaif';
						$user_img = 'Images/katrina.jpg';
						// give a text-box for current user to comment on this post
						echo "<div class='post-comment'>";
							echo "<div class='user-img-comment'>";
								echo "<img src='$user_img' height = '30' width='30'/>";
							echo "</div>";
							echo "<div class=user-name-comment>";
									echo "<form action='action.php?action=post-comment' name='comment-box' method='POST'>";
									echo "<input type='hidden' name='postid' value='$postid'/>";
									echo "<input type='text' name='comment-data' class='input-user-comment' onkeydown='if (event.keyCode == 13) { this.form.submit(); return false; }' />";
									echo "</form>";
							echo"</div>";
						echo"</div>";
					
					//comment-area div
					//echo"</div>";
		//status-div
						echo "<div class='after-comment-box'></div>";
		echo"</div>";
			
		}
		echo "</div>";
	}

?>