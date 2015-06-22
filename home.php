<?php
	
	include_once('Includes/master_login.inc');
	include_once('Includes/connect_to_database.php');
	include_once('Includes/Users.php');
	include_once('Includes/NewsFeed.php');
	include_once('Includes/message.php');
	include_once('Includes/Friends.php');
	include_once('JavaScript/MessageAjax.js');
	
	session_start();

	if(!user_online($_SESSION['uid']))	
	{
		header('Location :login.php');
	}

	$uid = $_SESSION['uid'];

	display_home($uid);
	
	/*newsfeed_stream($uid);

	echo'friends suggestion.......' .'\n';
	$query = 'SELECT * FROM user_login_master where userID!='$uid'';
	$result = mysql_query($query) or die('could not execute the all friend suggestion query..');
	$nrows = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		extract ($row);
		echo '<a href = http://localhost/fb-experimental/profile.php?ref='.$username.'>'.$username.'/>'.'\n';
		echo '<a href = http://localhost/fb-experimental/profile.php?ref='.$username.'>'.$username.'/>'.'\n';
	}




	
	$pending_list = pending_friend_request($uid);*/
	

function display_home($uid)
{
	if(!user_online($_SESSION['uid']))	
	{
		header('Location :login.php');
	}
	
	//include_once("Javascript/comment_submit.js");

	$firstname = user_firstname($uid);
	$lastname = user_lastname($uid);
	$fullname = $firstname.' '.$lastname;
	echo"
	<html>
	<head>
		<title>
			friendbook
		</title>
		<link rel='stylesheet' type='text/css' href='CSS/home-page.css'>
		<link rel='stylesheet' type='text/css' href='CSS/login-page.css'>
		<link rel='stylesheet' type='text/css' href='CSS/Blue-line.css'>
		<link rel='stylesheet' type='text/css' href='CSS/post.css'>
		<link rel='stylesheet' type='text/css' href='CSS/chat.css'>

	
	</head>
	<script type='text/javascript'>
			function pop(div) 
			{
				document.getElementById(div).style.display = 'block';
			}
			function hide(div) 
			{
				document.getElementById(div).style.display = 'none';
			}
			//To detect escape button
			
		</script>
	<body bgcolor='#E6E6EF'>
		<div class='div-top'>
			<table>
				<tr></tr>
				<tr>
					<td width='7'></td>
					<td >
						<a href='home.php'>
							<img src='Images/flogo.png';height=30%; width	=55%;>
						</img>
						</a>
					</td>
					
					<td>
						<a href='#'>
							<img src='Images/request.png';height = 30%; width=140%;>
						</a>
					</td>
					<td width='4'></td>
					<td>
						<a href='#'>
							<img src='Images/message.png';height = 30%; width=140%;>
						</a>
					</td>
					<td width='4'></td>
					<td>
						<a href='#'>
							<img src='Images/notification.png';height = 30%; width=140%;>
						</a>
					</td>
					<td width='90'></td>
						<form name='searchbox' action='Action.php?action=Search-Perform' method='post'>

							<td>
								<input class='text' type='text' name='query' onclick='asr(this.value);droplist_open_search(); mouseOver_search=1;' onblur='close_drop_lists();' onkeyup='asr(this.value);' 
								size='40'>
							</td>
							<td>
								<input class='image' type='image' src='Images/top-search.png' width=75% height=46%>
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
		</div>
			<div class='total'>
				<div class='left_part' >

						<div class='profile-view'>
								<div class='profile-image'>
									<input class='profile_image' type='image' src='Images/profile.jpg' width=100px height=100px id='profile3' style='float:left;'>
								</div>
								<div class='profile-name'>
									<a class='user_name' href='profile.php?uid=$uid' text-align='center' style='float:left;'>$fullname </a>
									<a class='Edit_profile' href='https://www.google.com' text-align='center' style='float:left;'>Edit Profile</a>
								</div>
								
						</div>
						<div class='information'>
							
							<div class='news-feed'>
								<div class='news-feed-image'>
									<input class='news-feed_image' type='image' src='Images/news-feed.png' width=18px height=18px id='news-feed' style='float:left;'>
								</div>
								<div class='news-feed-name'>

									<a class='news-feed_name' href='https://www.google.com' text-align='center' style='float:left;'>News Feed
									</a>
								</div>
							</div>

							<div class='newline'>
							</div>

							<div class='Messages'>
								<div class='Messages-image'>
									<input class='Messages_image' type='image' src='Images/Messages.png' width=18px height=18px id='Messages' style='float:left;'>
								</div>
								<div class='Messages-name'>

									<a class='Messages_name' href='https://www.google.com' text-align='center' style='float:left;'>Messages
									</a>
								</div>
							</div>

							<div class='newline'>
							</div>

							<div class='Events'>
								<div class='Events-image'>
									<input class='Events_image' type='image' src='Images/Events.png' width=18px height=18px id='Events' style='float:left;'>
								</div>
								<div class='Events-name'>

									<a class='Events_name' href='https://www.google.com' text-align='center' style='float:left;'>Events
									</a>
								</div>
							</div>
							
							<div class='newline'>
							</div>

							<div class='Photos'>
								<div class='Photos-image'>
									<input class='Photos_image' type='image' src='Images/Photos.png' width=18px height=18px id='Photos' style='float:left;'>
								</div>
								<div class='Photos-name'>

									<a class='Photos_name' href='https://www.google.com' text-align='center' style='float:left;'>Photos
									</a>
								</div>
							</div>

							<div class='newline'>
							</div>

							<div class='Friends'>
								<div class='Friends-image'>
									<input class='Friends_image' type='image' src='Images/Friends.png' width=18px height=18px id='Friends' style='float:left;'>
								</div>
								<div class='Friends-name'>

									<a class='Friends_name' href='https://www.google.com' text-align='center' style='float:left;'>Friends
									</a>
								</div>
							</div>

							<div class='newline'>
							</div>

							<div class='Pages'>
								<div class='Pages-image'>


									<input class='Pages_image' type='image' src='Images/Pages.png' width=18px height=18px id='Pages' style='float:left;'>
								</div>
								<div class='Pages-name'>

									<a class='Pages_name' href='https://www.google.com' text-align='center' style='float:left;'>Pages
									</a>
								</div>
							</div>

							<div class='newline'>
							</div>

							<div class='Groups'>
								<div class='Groups-image'>
									<input class='Groups_image' type='image' src='Images/Groups.png' width=18px height=18px id='Groups' style='float:left;'>
								</div>
								<div class='Groups-name'>

									<a class='Groups_name' href='https://www.google.com' text-align='center' style='float:left;'>Groups
									</a>
								</div>
							</div>
						</div>

						<div class = 'Border' >
						</div>
				</div>
				";
				
				newsfeed_stream($uid);
		echo"
			<div class='chat-box'><br/>
				  ";
				  	  $friendlist = get_friend_list($uid);
				  	  //echo $friendlist;
				  	  foreach($friendlist as  $value) {
				  	  	# code...

				  	  	echo "
				  	  	<div class='online-user'>
				  	     &nbsp
				  	  	<a href = 'home.php?message=$value'>";

					  		echo get_username((int)$value);
					  	echo"</a></div><br/>";
				  	  }
					  
					echo"  
				  
				  <br/>
				  	</div>

	<div class='c-box' id='c-b'>
			<div class='b-l'>
				<div class='name-cb'>";
					if(isset($_GET["message"]))
					{
						$to = $_GET["message"];
						$_SESSION["to"] = $to;
					}
					else
					{
						if(isset($_SESSION["to"]))
						{
							$to = $_SESSION["to"];
						}
						else
						{
							$to = $uid;
						}
					}
					
					echo get_username($to);
				echo"</div>
				<a onClick=\"hide('c-b')\">
					<image src='Images/1_1.jpg' class='close-image'></image>
				</a>
			</div>
			
			<div class='pre-msg'>";
			
			echo display_message($uid,$to);
			echo"</div>";
			echo "<div class='txt-area'>";
			echo "<form action='action.php?action=Chat-Send' method='POST'>";
			echo "<input class='txt' type='text' name='message' id='message'/>"; 
			echo "<input type='hidden' name='to' value='$to'/>";
			echo "<input type='submit' value='send' />";
			echo "</form>";
			echo "</div>";
				
echo "
	</body>
	</html>";
	
}
?>