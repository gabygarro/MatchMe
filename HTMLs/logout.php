<?php
	session_start();
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: index.php#loggedout"); // Redirecting To Home Page
	}
	oci_close($connection);
?>