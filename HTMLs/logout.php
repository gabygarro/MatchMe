<?php
	/* Proyecto I Bases de Datos - Prof. Adriana Álvarez
   * match.me - Oracle
   * Alexis Arguedas, Gabriela Garro, Yanil Gómez
   * -------------------------------------------------
   * logout.php - Created: 20/09/2015
   * Logs the user out from the application by erasing the $_SESSION super array values, the redirecting to the index.
   */
	session_start(); //start the session so that it can be destroyed
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: index.php#loggedout"); // Redirecting To Home Page
	}
	oci_close($connection); //close the db connection
?>