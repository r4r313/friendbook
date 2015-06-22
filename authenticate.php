<?php
		
		/*-- connect to the database*/
		include_once("Includes/master_login.inc");
		include_once("Includes/connect_to_database.php");
		include_once("Includes/Users.php");

		/*-----extracting user information from session to authenticate the user-----*/
		$username = $_POST['username'];
		$pass= $_POST['password'];

		/* checking from database userdetailmaster */
		$query = "SELECT * from user_login_master where username= '$username'";
		$result = mysql_query($query) or die("couldnot execute query");
		$nrows = mysql_num_rows($result);

			if($nrows==0)
			{
				session_start();
				$_SESSION['ERR_MSG'] = "wrong username password";
				header('Location: login.php');
			}
			else
			{
				$row = mysql_fetch_array($result);
				extract($row);
		
				if($pass == "$password")
				{
					user_login($userID,$username);
					echo "user logged in succesfully";
					header('Location: home.php');
				}
				else
				{
				session_start();
				$_SESSION['ERR_MSG'] = "wrong username password";
				header('Location: login.php');
				}	

			}


?>
