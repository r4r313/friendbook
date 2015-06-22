	
<?php
	
	include_once("Includes/master_login.inc");
	include_once("Includes/connect_to_database.php");
	include_once("Includes/Users.php");
	include_once("Includes/Friends.php");
	include_once("Includes/current_page_url.php");
	include_once("Includes/upload_photo.php");
	include_once("Includes/NewsFeed.php");
	include_once("Javascript/XML.js");
	include_once("profile_display.php");

	session_start();

	if(!user_online($_SESSION['uid']))	
	{
		header('Location :login.php');
	}

	$uid = $_SESSION['uid'];
	$username = $_SESSION['username'];

	//layout = 0 private profile only for friends
	//layout = 1 public profile open for everyone

	
	function display_profile($profile_id)
	{
		// inlcuding the css file
		echo "<link rel='stylesheet' type='text/css' href='../CSS/profile-page.css'>
			  <link rel='stylesheet' type='text/css' href='../CSS/post.css'>";
		echo "<body bgcolor='#DEDEFF'>";

		$uid = $_SESSION['uid'];
		$username = $_SESSION['username'];

		// just for debugging 
		//echo $username;
		//echo "<br>";
		//echo $profile_id;

		$profile_name = get_username($profile_id);
		$profile_image_path = '../'.fetch_profile_image_path($profile_id);


		if($profile_id==null)	$profile_id = $uid;
		$own_profile = false;

		if($profile_id==$uid)  	$own_profile = true;

		$friend_val = check_friend($uid, $profile_id );

		$layout  = 0;

		// top-bar showing profile-pic and all
		echo"
		<div class='div-top'>
			<table>
				<tr></tr>
				<tr>
					<td width='7'></td>
					<td >
						<a href='home.php'>
							<img src='../Images/flogo.png';height=30%; width	=55%;>
						</img>
						</a>
					</td>
					
					<td>
						<a href='#'>
							<img src='../Images/request.png';height = 30%; width=140%;>
						</a>
					</td>
					<td width='4'></td>
					<td>
						<a href='#'>
							<img src='../Images/message.png';height = 30%; width=140%;>
						</a>
					</td>
					<td width='4'></td>
					<td>
						<a href='#'>
							<img src='../Images/notification.png';height = 30%; width=140%;>
						</a>
					</td>
					<td width='90'></td>
						<form name='searchbox' action='Action.php?action=Search-Perform' method='post'>

							<td>
								<input class='text' type='text' name='query' onclick='asr(this.value);droplist_open_search(); mouseOver_search=1;' onblur='close_drop_lists();' onkeyup='asr(this.value);' 
								size='40'>
							</td>
							<td>
								<input class='image' type='image' src='../Images/top-search.png' width=75% height=46%>
							</td>
						</form>
						
							<td class='top-right' onclick='window.location=&quot;Construct.php&quot;'>
							<a>Home</a>
							</td>
							<td class='top-right' onclick='window.location=&quot;Construct.php&quot;'>
							<a>profile</a>
							</td>
							</td>
							<td class='top-right' onclick='window.location=&quot;Construct.php&quot;'>
							<a>Account</a>
							</td>
					
				</tr>
			</table>
		</div>";








		/*echo "<div id='profile_friend'>";
			echo "<form action='action.php?action=image-upload' method='POST' enctype='multipart/form-data'>";
			echo "<input type='file' name='img_file' id='img_file' />";
			echo "<input type='submit' class='submit_button' value='Submit' name='s'>";
			echo "</form>";


		if($own_profile==false)
		{

				//echo "<div id='profile-$uid' >";
				if(!$own_profile && $friend_val==0)
				{
					$layout =0;
					echo "<input type='submit' value='Add-Friend' onClick=\"ajax_post('Ajax.php?action=Add-Friend','uid=$profile_id&refresh=profile','profile-$uid',0);\" name='Add-friend'/> 
					&nbsp;
					<input type='submit' value='Message' name='Message'/>
					&nbsp;
					";
				}
				if(!$own_profile && $friend_val==1)
				{
					$layout = 0;
					echo "<input type='submit' value='Friend Request Sent' name='friend Request Sent'/>
					&nbsp;
					<input type='submit' value='Message' value='message' name='Message'/>
					&nbsp;";
				}
				if(!$own_profile && $friend_val==2)
				{
					$layout = 0;
					echo "<form action='action.php' method ='POST'>
					<input type='submit' value='Respond to Friend request' onClick=\"ajax_post('Ajax.php?action=Respond-Friend-Request','uid=$profile_id&refresh=profile','profile-$uid',0);\"name='Respond to friend request'/>
					&nbsp;
					<input type='submit' value='Message' name='Message'/>
					&nbsp;
					</form>";
				}
				if(!$own_profile && $friend_val==3)
				{
					$layout = 1;
					echo "<form action='#' method ='POST'>
					<input type='submit' value='Friends' name='Friends'/>
					&nbsp;
					<input type='submit' value='Message' name='Message'/>
					&nbsp;
					</form>";
				}
				//echo "</div>";
		}*/
		if($layout==0)
		{
			//if(get_privacy($profile_id)="Private")
				$layout = 0;
			//else
				$layout = 1;
		}

		//closing div of profile friend
		//echo "</div>";



		echo "
		<div class='profile-top'>
			<div class='profile-cover'>
				<img src='../Images/cover-pic5.jpg' width='850px' height='330px'>
			</div>
			<div class='profile-pic'>
				<img src=$profile_image_path width='200px' height='200px'>
			</div>";
			if($own_profile == true)
			{


			echo"<div class='profile-change-pic'>
				<br>&nbsp;&nbsp;
				<a href='../changeprofilepic.php'>
					Change
					<br>
					&nbsp;
					profile pic
				</a>
			</div>";

			}

			else
			{
				echo"<div class='profile-change-pic'>
				<br>&nbsp;&nbsp;
				<a href='../home.php'>
					My Home
				</a>
				</div>";


			}


			echo"<div class='profile-about'>
				<br>
				&nbsp;&nbsp;&nbsp;
				<a href='https://www.google.com'>About
				</a>
			</div>
			<div class='profile-friend'>
				<br>&nbsp;&nbsp;
				<a href='https://www.google.com'>Friends
				</a>
			</div>
			<div class='profile-photo'>
				<br>&nbsp;&nbsp;
				<a href='https://www.google.com'>Photos
				</a>
			</div>
			<div class='profile-more'>
				<br>&nbsp;&nbsp;
				<a href='https://www.google.com'>More
				</a>
			</div>
			<div class='profile-settings'>
				<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='https://www.google.com'>Settings
				</a>
			</div>
			<div class='profile-name'>
				<a href='https://www.google.com' >$profile_name
				</a>
			</div>
			<div class='profile-right'>
			<a href='https://www.google.com'>Create adds</a>
			</div>
	</div>
	<div class='profile-middle-part'>
		<div class='profile-middle-left'>
			
			<div class='profile-job-description'>
				<div class='profile-job-description-image'>
					<img src='../Images/job-description.png' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-job-description-text'>
					<a>Working at none.</a>
				</div>	
			</div>	


			<div class='profile-study-description'>
				<div class='profile-study-description-image'>
					<img src='../Images/study-description.jpg' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-study-description-text'>
					<a>Studies computer eng. at Bit Mesra.</a>
				</div>	
			</div>	


			<div class='profile-living-description'>
				<div class='profile-living-description-image'>
					<img src='../Images/living-description.jpg' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-living-description-text'>
					<a>Lives in Ranchi,Jharkhand.</a>
				</div>	
			</div>
	
			
			<div class='profile-from-description'>
				<div class='profile-from-description-image'>
					<img src='../Images/from-description.png' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-from-description-text'>
					<a>From Rajkot,Gujarat.</a>
				</div>	
			</div>	

			<div class='profile-left-part-bottom-margin'>
			</div>

		</div>
		<div class='profile-center'>";
			

		echo "<div class='middle-part'>";
			echo " <div class='status-box'>";
				echo " <form action='../action.php?action=status-update' name='status-box' method='POST'>";
				$defaulttext = 'What is on your mind.......';
				echo " <textarea name='status-data' class='status-text-box' placeholder='$defaulttext' style='color:#808080;' onClick=\"if(this.value=='$defaulttext'){ this.value=''; this.style.color='#000000'; }\" onBlur=\"if(this.value==''){ this.value='$defaulttext'; this.style.color='#808080'; }\" ></textarea>";
				echo " <input type='submit' value='Share' class='status-text-submit' onClick=\"e=document.newsfeed_write.data; if(e.value=='$defaulttext') e.value=''; \">";
				echo " </form>";
			echo " </div>";
			
		
		//echo $uid;
		//$friend_list = get_friend_list($uid);
		// limit on no of query result result was not working i need it to figure it out
		$query = "SELECT * FROM post where user_id = '$profile_id'
				 order by created DESC ";

		$result = mysql_query($query) or die(mysql_error());
		$nrows = mysql_num_rows($result);

		while($row = mysql_fetch_array($result))
		{
			echo "<div class='status'>";
					$post_user_image = '../Images/katrina.jpg';
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
								echo "<a href='../action.php?action=Like-Status&postid=$postid' name='Unlike'> Like </a>";
								echo "<a href='#' onClick='' > Comment </a>";
								echo "<a href='#' onClick='' > Share </a>";
							}
							else
							{
								//if user has already liked this post
								echo "<a href='../action.php?action=Unlike-Status&postid=$postid' name='Unlike'> Unlike </a>";
								echo "<a href='#' onClick='' > Comment </a>";
								echo "<a href='#' onClick='' > Share </a>";
							}

					echo "<hr>";
					echo"</div>";


					//echo "<div class='comment-area >";
						echo "<div class='post-likes'>";
							echo "<a href='#'> <img src='../Images/like_button.jpg' height='15' width='15'/>"."$likes"." like this </a>";
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
							$comment_user_img = '../Images/katrina.jpg';
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
								echo "<a href='../action.php?action=Delete-Comment&cmntid=$cmntid'> Delete </a>";
							}
							// attach a link to like the comment
							$isliked = check_comment_like($uid, $cmntid);

							if($isliked==0)
							{
								echo "&nbsp;<a href='../action.php?action=Like-Comment&cmntid=$cmntid'>$likes Like </a> ";
							}
							else
							{
								echo "<a href='../action.php?action=Unlike-Comment&cmntid=$cmntid'>$likes Unlike </a> ";
							}
						
								echo "$created";
							
							//like-post-comment div
							echo "</div>";

							
						}
						
						$fullname = 'katrina kaif';
						$user_img = '../Images/katrina.jpg';
						// give a text-box for current user to comment on this post
						echo "<div class='post-comment'>";
							echo "<div class='user-img-comment'>";
								echo "<img src='$user_img' height = '30' width='30'/>";
							echo "</div>";
							echo "<div class=user-name-comment>";
									echo "<form action='../action.php?action=post-comment' name='comment-box' method='POST'>";
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


			
		echo"
		</div>
	</div>
	";





			
	}





	

	function display_friends($profile_id)
	{
		// get conetent of the user
		
		// friends tab section

		if($layout==0)
		{
			
		}
		else
		{

		}

	}

?>