<?php
$_SESSION['flag'] = false;
$_SESSION['current_user'] = "";
$_SESSION['admin'] = false;
$redirect_page = "http://dochyper.unitec.ac.nz/fuj16/PHPAssignment/index.php";
//redirect the user to the correct page after login
header("Location: ".$redirect_page);
			
?>