<?php
	session_start();
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: http://localhost/MatchMe/HTMLs/#loggedout"); // Redirecting To Home Page
	}
	oci_close($connection);
?>