
<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include business layer
require_once("/php-shopping/business_layer/business.inc.php");
?>
<div class="container">
<div class="jumbotron">
<h1>QUALITY HATS</h1>
</div>

<div class="row">
    <div class="col-sm-4" align="center">
        <h2>Cowboy hats</h2>
        <img src="WAImages/Ranger.png" alt="Smiley face" height="200" width="255">

    </div>
    <div class="col-sm-4" align="center">
        <h2>Garrison hats</h2>
        <img src="WAImages/Cap.png" alt="Smiley face" height="200" width="255">

    </div>
    <div class="col-sm-4" align="center">
        <h2>Beret</h2>
        <img src="WAImages/Beret.png" alt="Smiley face" height="200" width="255">
    </div>
</div>
	</br>
<?php
if($_SESSION['admin'] != true)
{
	echo "<h2>Shopping Cart</h2>";
	echo Business::ShowCart();
}
?>
</div>