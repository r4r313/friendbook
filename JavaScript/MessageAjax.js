<script language="JavaScript">
	
	function message_ajax_post(url , args , targetid, add)
	{
		var formData = document.getElementById("message").value;
		var vars = args+' &message='+formData;
		//document.getElementById("message-display").innerHTML='hiiii';
		var xmlhttp;
		if(window.XMLHttpRequest)
		{
			// works for all browser abve IE7, chrome and firefox
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			//for IE5 and IE6 which i don't think i nedd to handle still
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		if(!xmlhttp)
			document.getElementById(targetid).innerHTML = "OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO";

		xmlhttp.open("POST",url, true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		

  		xmlhttp.onreadystatechange=function()
  		{
  			if(xmlhttp.readyState==4 && xmlhttp.status==200)
  			{
  				if(add==0)
  				{
  					document.getElementById(targetid).innerHTML += xmlhttp.responseText;
  				}
  				else
  				{
  					document.getElementById(targetid).innerHTML+= xmlhttp.responseText;
  				}
  			}
  			else
  			{
  				document.getElementById(targetid).innerHTML = "ABFIUEBFIUEWF EW FISEBFISEBISD SDBFSDFSRH";
  			}

  		};

  		xmlhttp.send(vars);
	}

</script>