<?php
	
	include_once("master_login.inc");
	include_once("connect_to_database.php");

	 function upload_image($uid,$imgfile,$tmp_fil)
	{

    	$folderName = "user_images/";
		$filePath = $folderName. rand(10000, 990000). '_'. time();

		if ( move_uploaded_file( $tmp_fil, $filePath)) {
			//$instr = fopen($filepath,"rb");
        	//$image = addslashes(fread($instr,filesize($filepath)));
    		$sql = "INSERT INTO tbl_demo5(user_id,filepath) VALUES ('$uid','$filePath')";
    		$msg = ( mysql_query($sql)) or die(mysql_error());
    		 
  		} else
  		 {

  			echo "some error occured while uploading the image.";
  		}
	}

	function upload_profile_image($uid,$imgfile,$tmp_fil)
	{
		$folderName = "user_images/";
		$filePath = $folderName. rand(10000, 990000). '_'. time().'.jpg';

		if ( move_uploaded_file( $tmp_fil, $filePath)) {
			//$instr = fopen($filepath,"rb");
        	//$image = addslashes(fread($instr,filesize($filepath)));
        	$sql = "SELECT * FROM profile_pic WHERE user_id = '$uid'";
        	$msg = mysql_query($sql) or die(mysql_error());
        	$nrows = mysql_num_rows($msg);
        	if($nrows==0)
        	{
	    		$sql = "INSERT INTO profile_pic(user_id,filepath) VALUES ('$uid','$filePath')";
	    		$msg = ( mysql_query($sql)) or die(mysql_error());
	    	}
	    	else
	    	{
	    		$sql = "DELETE FROM profile_pic WHERE user_id='$uid'";
	    		$msg = mysql_query($sql) or die(mysql_error());
	    		$sql = "INSERT INTO profile_pic(user_id,filepath) VALUES ('$uid','$filePath')";
	    		$msg = ( mysql_query($sql)) or die(mysql_error());
	    	}
    		 
  		} 
  		else
  		{

  			echo "some error occured while uploading the image.";
  		}

	}

	function fetch_profile_image_path($uid)
	{
		$sql = "SELECT * FROM profile_pic WHERE user_id = '$uid'";
		$msg = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($msg))
		{
			extract($row);
			return $filepath;
		}

	}
?>
