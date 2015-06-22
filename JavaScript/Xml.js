<script language="JavaScript">
	
	function ajax_post(url , args , targetid, add)
	{
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
			document.getElementById(targetid).innerHTML = "someerroor";

		xmlhttp.open("POST",url, false);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.setRequestHeader("Content-length", args.length);
  		xmlhttp.setRequestHeader("Connection", "close");

  		xmlhttp.onreadystatechange=function()
  		{
  			if(xmlhttp.readyState==4 && xmlhttp.status==200)
  			{
  				if(add==0)
  				{
  					document.getElementById(targetid).innerHTML = xmlhttp.responseText;
  				}
  				else
  				{
  					document.getElementById(targetid).innerHTML+= xmlhttp.responseText;
  				}
  			}
  			else
  			{
  				document.getElementById(targetid).innerHTML = "somewrroor";
  			}

  		};

  		xmlhttp.send(args);
	}

</script>