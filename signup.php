<?php
	
	include_once("Includes/connect_to_database.php");
	include_once("Includes/master_login.inc");

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$dob_date = $_POST["dob_date"];
	$dob_month = $_POST["dob_month"];
	$dob_year = $_POST["dob_year"];
	$sex = $_POST["sex"];

	//echo $firstname.$lastname.$email.$password.$dob_date.$dob_month.$dob_year.$sex;
	$dob = $dob_date.'-'.$dob_month.'-'.$dob_year;
	$query = "INSERT INTO user_detail_master (firstname,lastname,password,email,sex,dob)
				VALUES('$firstname','$lastname','$password','$email','$sex','$dob')";
	$result = mysql_query($query) or die(mysql_error());

	$query_login = "INSERT INTO user_login_master (username,password)
					VALUES ('$email','$password')";
	$result_login = mysql_query($query_login) or die(mysql_error());

	header ("Location: thanks.php");
?>