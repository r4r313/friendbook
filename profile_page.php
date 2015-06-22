<?php

function display_profile_page( $profile_id)
{

	echo "<link rel='stylesheet' type='text/css' href='CSS/profile-page.css'>";
	echo "<body bgcolor='#DEDEFF'>";

	echo "<div class='div_top'>";
		echo "<table>";
			echo "<tr></tr>";
			echo "<tr>";
				echo "<td width='7'></td>";
				echo "<td >
					<a href='https://www.google.com'>
						<img src='Images/flogo.png';height=30%; width	=55%;>
					</img>
					</a>
				</td>";
				
				echo "<td>
					<a href='https://www.google.com'>
						<img src='Images/request.png';height = 30%; width=140%;>
					</a>
				</td>";

				echo "<td width='4'></td>
				<td>
					<a href='https://www.google.com'>
						<img src='Images/message.png';height = 30%; width=140%;>
					</a>
				</td>";

				echo "<td width='4'></td>
				<td>
					<a href='https://www.google.com'>
						<img src='Images/notification.png';height = 30%; width=140%;>
					</a>
				</td>";

				echo "<td width='90'></td>";

					echo "<form name='searchbox' action='Action.php?action=Search-Perform' method='post'>';

						echo "<td>
							<input class='text' type='text' style='border-radius: 4px;' name='query' onclick='asr(this.value);droplist_open_search(); mouseOver_search=1;' onblur='close_drop_lists();' onkeyup='asr(this.value);' 
							size='40'>
						</td>
						<td>
							<input class='image' type='image' src='Images/top-search.png' width=75% height=46%>
						</td>
					</form>
					
						<td class='top_right' onclick='window.location=&quot;home.php&quot;'>
						<a>Home</a>
						</td>
						<td class='top_right' onclick='window.location=&quot;profile.php&quot;'>
						<a>profile</a>
						</td>
						</td>
						<td class='top_right' onclick='window.location=&quot;Construct.php&quot;'>
						<a>Account</a>
						</td>
				
			</tr>
		</table>
	</div>

	// to show friends option
	echo "<div id='friends-option'>";

	$uid = $_SESSION['uid'];
	$username = $_SESSION['username'];

	if($profile_id==null)	$profile_id = $uid;
		$own_profile = false;

		if($profile_id=='uid')  	$own_profile = true;

		$friend_val = check_friend($uid, $profile_id );

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
		}
		if($layout==0)
		{
			//if(get_privacy($profile_id)="Private")
				$layout = 0;
			//else
				$layout = 1;
		}
		


	echo "</div>";




	 echo "<div class='profile-top'>
		<div class='profile-cover'>
			<img src='Images/cover-pic5.jpg' width='850px' height='330px'>
		</div>
		<div class='profile-pic'>
			<img src='Images/profile.jpg' width='200px' height='200px'>
		</div>
		<div class='profile-change-pic'>
			<br>&nbsp;&nbsp;
			<a href='https://www.google.com'>
				Change
				<br>
				&nbsp;
				profile pic
			</a>
		</div>
		<div class='profile-about'>
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
			<a href='https://www.google.com' >Rohit Nandani
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
					<img src='Images/job-description.png' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-job-description-text'>
					<a>Working at none.</a>
				</div>	
			</div>	


			<div class='profile-study-description'>
				<div class='profile-study-description-image'>
					<img src='Images/study-description.jpg' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-study-description-text'>
					<a>Studies computer eng. at Bit Mesra.</a>
				</div>	
			</div>	


			<div class='profile-living-description'>
				<div class='profile-living-description-image'>
					<img src='Images/living-description.jpg' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-living-description-text'>
					<a>Lives in Ranchi,Jharkhand.</a>
				</div>	
			</div>
	
			
			<div class='profile-from-description'>
				<div class='profile-from-description-image'>
					<img src='Images/from-description.png' 
					style='width:20px;height:20px;'/>
				</div>
				<div class='profile-from-description-text'>
					<a>From Rajkot,Gujarat.</a>
				</div>	
			</div>	

			<div class='profile-left-part-bottom-margin'>
			</div>

		</div>
		<div class='profile-center'>
				<br>
				<br>
				<p>hello there??</p>

		</div>
	</div>
	";
}
</body>

?>
