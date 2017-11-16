<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register - Quality Hats</title>
<script>
function validateForm() {
    var email = document.forms["myForm"]["email"].value;
    if (email == "") {
        alert("Email must be filled out");
        return false;
    }
	var password = document.forms["myForm"]["password"].value;
    if (password == "") 
	{
        alert("Password must be filled out");
        return false;
    }
	var rname = document.forms["myForm"]["name"].value;
    if (rname == "") 
	{
        alert("Name must be filled out");
        return false;
    }
	var raddress = document.forms["myForm"]["address"].value;
    if (raddress == "") 
	{
        alert("Address must be filled out");
        return false;
    }
}
</script>
</head>

<body>

<div class="container">
	</br>
	<h2>Register</h2>
	<h4>Create a new account</h4>
	<form name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data"
	action="index.php?content_page=RegisterAction">
	<table class="table">
		<tr><td><h4>Required Field</h4></td></tr>
	  <tr>
		<td>Email</td>
		<td><input type="email" name="email" size="50"></td>
	  </tr>
	  <tr>
		<td>Password</td>
		<td><input type="password" name="password" value="" size="50"></td>
	  </tr>
	  <tr>
		<td>Name</td>
		<td><input type="text" name="name" size="50"></td>
	  </tr>
	  <tr>
		<td>Address</td>
		<td><input type="text" name="address" size="150"></td>
	  </tr>
		<tr>
		<td colspan="2"><input type="Submit" name="submit" value="Register">
		</td>
	  </tr>
	  <tr><td>Optional Field</td></tr>
	  <tr>
		<td>HomePhoneNumber</td>
		<td><input type="text" name="hpnumber" size="25"></td>
	  </tr>
	  <tr>
		<td>WorkPhoneNumber</td>
		<td><input type="text" name="wknumber" size="25"></td>
	  </tr>
	  <tr>
		<td>MobilePhoneNumber</td>
		<td><input type="text" name="mbnumber" size="25"></td>
	  </tr>
	  <tr>
		<td colspan="2"><input type="Submit" name="submit" value="Register">
	  </td>
	  </tr>
	</table>
	</form>
</div>
</body>
</html>
