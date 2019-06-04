<?php
	
	if(!isset($_SESSION["cliente"])){
		header("location: form_login.php");
	}
?>