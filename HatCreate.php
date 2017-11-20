<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hat</title>
<script>
function validateForm() {
    var hname = document.forms["myForm"]["hname"].value;
    if (hname == "") {
        alert("Name must be filled out");
        return false;
    }
	var price = document.forms["myForm"]["hprice"].value;
    if (price == "") 
	{
        alert("Price must be filled out");
        return false;
    }
	var hcategory = document.forms["myForm"]["hcategory"].value;
    if (hcategory == "") 
	{
        alert("Category ID must be filled out");
        return false;
    }
	var hsupplier = document.forms["myForm"]["hsupplier"].value;
    if (hsupplier == "") 
	{
        alert("Supplier ID must be filled out");
        return false;
    }
}
</script>
</head>

<body>

<div class="container">
	</br>
	<h2>Create Hat</h2>
	<form name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data"
	action="index.php?content_page=HatCreateAction">
	<table class="table">
	  <tr>
		<td>Name</td>
		<td><input type="text" name="hname" size="50"></td>
	  </tr>
	  <tr>
		<td>Description</td>
		<td><input type="text" name="hdescription" size="200"></td>
	  </tr>
	  <tr>
		<td>Image</td>
		<td><input type="file" name="himage" size="150"></td>
	  </tr>
	  <tr>
		<td>Price</td>
		<td><input type="text" name="hprice" size="9"></td>
	  </tr>
	  <tr>
		<td>CategoryID</td>
		<td><input type="text" name="hcategory" size="9"></td>
	  </tr>
	  <tr>
		<td>SupplierID</td>
		<td><input type="text" name="hsupplier" size="9"></td>
	  </tr>
	  <tr>
		<td colspan="2"><input type="Submit" name="submit" value="Create Hat">
	  	</td>
	  </tr>
	</table>
	</form>
</div>
</body>
</html>
