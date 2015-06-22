<?php
	include_once("master_login.inc");
	include_once("connect_to_database.php");
	function add_message($from,$to,$message)
	{
		$query = "INSERT INTO chat (chat.from,chat.to,message,sent,recd) VALUES ('$from','$to','$message', NOW(),0)";
		$result = mysql_query($query) or die(mysql_error());
	}

	function display_message($from,$to)
	{
		$query = "SELECT * FROM chat WHERE chat.from='$from' and chat.to='$to' UNION SELECT * FROM chat WHERE chat.from='$to' and chat.to='$from'";
		$result = mysql_query($query) or die(mysql_error());
		$messages = "";
		while($row = mysql_fetch_array($result))
		{
			extract($row);
			$str = "";
			//echo $message;
			//foreach ($message as $value) {
				# code...
			//	$str = $str.$value;
			//}

			//array_push($messages, (string)strval($message));
			//array_push($messages, '<br>');
			$user_name = get_username($from);
			$messages = $messages.'<div class=\'t1\'> &nbsp '.$user_name.'  '.$message.'</div><br>';
		}
		//$messages = $messages.'</div>';
		return $messages;
	}

	function display_message_box($from,$to)
	{
		
		echo"<div id='message-display'> message";
		//echo display_message($from,$to);
		echo "<form  action='' method='POST'>";
		echo "<input type='text' name='message'id='message'/>";
		echo "<input type='hidden' name='to' value='$to'/> ";
		echo "<input type='submit' value='send' onClick=\"ajax_post('Ajax.php?action=Chat-Send','to=$to','message-display',0);\"/>";
		echo"</form>";

		echo "</div>";
	}
?>