<?php
	//Start session
	session_start();
	//Check whether the session variable
	//SESS_USER_ID is present or not
	if(!isset($_SESSION['session_user']) || (trim($_SESSION['session_user'])=='')) {
		header("location: index.php");
		exit();
	}
?>