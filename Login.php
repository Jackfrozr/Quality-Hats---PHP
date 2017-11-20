<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page - Quality Hats</title>
</head>

<body>
<div class="container">
	</br>
	<?php
	   session_start(); //starting session

	   // include username and password array and the function
	   require("UserDetails.php");

		// if the user has input username and password
		if (isset($_POST['form_username']) and isset($_POST['form_password']))
		{			
			//The login is not successful, set the login flag to false
				$_SESSION['flag'] = false;

				// call the pre-defined function and check if user is authenticated
				if (checkUserCredentals($_POST['form_username'], $_POST['form_password']))
				{
				//The login is successful, set the login flag to true and save the current user name
				$_SESSION['flag'] = true;
				$_SESSION['current_user'] = $_POST['form_username'];

				//redirect the user to the correct page
				//find out where to go after login
				$redirect_page = "http://dochyper.unitec.ac.nz/fuj16/PHPAssignment/index.php";

				//redirect the user to the correct page after login
				header("Location: ".$redirect_page);
				}
				echo '<p> Login unsuccesful, please make sure you enter the correct email and password, and that your account is enabled';
		} //Otherwise, stay in the login page

	?>
	<!-- User credential form -->
	<form method="post">
		<table>
		<tr>
			<td>Email : </td>
			<td>
			<input style="color:#000000;" type="text" name="form_username">
			</td>
		</tr>
		<tr>
			<td>Password : </td>
		<td>
			<input style="color:#000000;" type="password" name="form_password">
		</td>
			</tr>
		</table>
		</br>
	<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>
