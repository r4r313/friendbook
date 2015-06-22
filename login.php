<html>
<head>
	<title>
		Fb Experimental
	</title>
	<style>
				h2 
				{
					color:#000090;
				}
	</style>
	<link rel="stylesheet" type="text/css" href="CSS/home-page.css">
	<link rel="stylesheet" type="text/css" href="CSS/login-page.css">
	<link rel="stylesheet" type="text/css" href="CSS/Blue-line.css">
	
</head>
<body>
	<div class="login-top">
			<img class="login-top-image" src="Images/flogo.png"; height=30%; width=50%;>
		
		<div class="login-Details">
			<?php
				echo "<form action='authenticate.php' method='POST'>";

					echo "<a class='login-Email-Text' style='color:White;'>Username:</a>";
					echo "<input class='login-Email-Box' type='text' name='username' placeholder='Enter the Username'>";

					echo "<a class='login-Password-Text' style='color:White;' >Password:</a>";
					echo "<input class='login-Password-Box' type='Password' name='password' placeholder='Enter the Password'>";
					echo "<input class='login-Button' type='submit' value='Login'  style='color:white; Background:#627AAC;border-color:#627AAC;'>";
				echo"</form>";
			?>
		</div>
	</div>
	<div class="login-bottom-part">

		<div class="login-world-Details">
			<h2 class="login-text"color="Blue">					Connect with friends and the<br>world around you on Facebook.
			</h2>
					<br><br><br>
					<img class="login-world-image" src="Images/login-world.png">
			
		</div>
		
		<div class="sign-up-Details">
				<div class="sign-up-text">
					<a style="font-size:25;color:Blue"><b>Sign Up</b>
					</a>
					<a style="font-size:20;color:Blue"><br>It's free and always will be.
					</a>
				</div>

				<?php
				echo "<form action='signup.php' method='POST'>";
					echo "<div class='sign-up-General'>";
						
							echo "<input class='sign-up-name-box' placeholder='First Name' size='30' name='firstname' required >";
							
					echo "</div>";
					echo "<div class='sign-up-General'>";
											
							echo "<input class='sign-up-name-box' placeholder='Last Name' size='30' name='lastname' required >";
					echo "</div>";
					echo "<div class='sign-up-General'>";
							
							echo "<input type='Email' class='sign-up-name-box' placeholder='Your Email id' size='30' required>";
					echo "</div>";
					echo "<div class='sign-up-General'>
							
							<input class='sign-up-name-box' placeholder='Password' size='30' type='password' name='password' required >
					</div>
					<div class='sign-up-General'>
							
							<input class='sign-up-name-box' placeholder='Retype Password' size='30' type='password' name='repassword' required >
					</div>
					<div class='sign-up-General'>
							<select class='sign-up-s' name='sex' required>
								<option>Select Sex: </option>
								<option>Male</option>
								<option>Female</option>
							</select>
					</div>
					<div class='sign-up-General'>
						<a style='color:#12123B'>Birthday:</a>
						<div class='sign-up-date'>
							<select class='sign-up-s' name='dob_date' required ><option value='0'>Date:</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
								<option>14</option>
								<option>15</option>
								<option>16</option>
								<option>17</option>
								<option>18</option>
								<option>19</option>
								<option>20</option>
								<option>21</option>
								<option>22</option>
								<option>23</option>
								<option>24</option>
								<option>25</option>
								<option>26</option>
								<option>27</option>
								<option>28</option>
								<option>29</option>
								<option>30</option>
								<option>31</option>
							</select>
						</div>
						<div class='sign-up-month'>
							<select class='sign-up-s'name='dob_month' required >
								<option value='0'>Month:</option>
								<option value='1'>January</option>
								<option value='2'>February</option>
								<option value='3'>March</option>
								<option value='4'>April</option>
								<option value='5'>May</option>
								<option value='6'>June</option>
								<option value='7'>July</option>
								<option value='8'>August</option>
								<option value='9'>September</option>
								<option value='10'>October</option>
								<option value='11'>November</option>
								<option value='12'>December</option>
							</select>
						</div>
						<div class='sign-up-year'>
							<select class='sign-up-s' name='dob_year'required ><option value='0'>Year:</option>
							<option>1980</option><option>1981</option><option>1982</option><option>1983</option><option>1984</option><option>1985</option><option>1986</option><option>1987</option><option>1988</option><option>1989</option><option>1990</option><option>1991</option><option>1992</option><option>1993</option><option>1994</option><option>1995</option><option>1996</option><option>1997</option><option>1998</option><option>1999</option><option>2000</option><option>2001</option><option>2002</option><option>2003</option><option>2004</option><option>2005</option><option>2006</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option>
							</select>
						</div>
					</div>
					<div class='sign-up-button'>
						<input type='Submit' value='Sign up' style='font-size: 18px;font-weight: bold;background:#69A64D; 
						color:white;border: 1px solid #29447E;padding: 4px;font-family: 'Tahoma';'>
					</div>
				</form>";
				?>
		</div>
	
	</div>

</body>
</html>
