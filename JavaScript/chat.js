<script type="text/javascript">
			function pop(div) 
			{
				var to  = document.getElementById('to').value;
				document.getElementById(div).style.display = 'block';
				window.location.href = "home.php?message="+to;
			}
			function hide(div) 
			{
				document.getElementById(div).style.display = 'none';
			}
			//To detect escape button
			
		</script>