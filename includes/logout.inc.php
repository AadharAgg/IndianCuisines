<?php
include_once "config.inc.php";
	session_start();
	session_unset();
	session_destroy();

	header("Location: {$hostname}/login.php");

?>