<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier</title>
</head>

<body>

<div class="container">
	</br>
	<h2>Create Supplier</h2>
	<form method="post" enctype="multipart/form-data"
	action="index.php?content_page=SupplierCreateAction">
	<table class="table">
	  <tr>
		<td>Name</td>
		<td><input type="text" name="sname" size="50"></td>
	  </tr>
	  <tr>
		<td>Email Address</td>
		<td><input type="email" name="semail" value="" size="50"></td>
	  </tr>
	  <tr>
		<td>HomePhoneNumber</td>
		<td><input type="text" name="hphone" size="25"></td>
	  </tr>
	  <tr>
		<td>WorkPhoneNumber</td>
		<td><input type="text" name="wphone" size="25"></td>
	  </tr>
	  <tr>
		<td>MobilePhoneNumber</td>
		<td><input type="text" name="mphone" size="25"></td>
	  </tr>
	  <tr>
		<td colspan="2"><input type="Submit" name="submit" value="Create Supplier">
	  	</td>
	  </tr>
	</table>
	</form>
</div>
</body>
</html>
