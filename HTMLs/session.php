<?php
	//establishes a connection to the db
	$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
													      (ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.20)(PORT = 1521)))
													    (CONNECT_DATA = (SID = MATCHDB) (SERVER = DEDICATED)))");
	if (!$connection) {
		echo "Invalid connection " . var_dump(ocierror());
		die();
	}

	// Starting Session
	session_start();
	// Storing Session
	$userCheck = $_SESSION['userID'];
	//get user information
	$query = "select * from username where usernameID = '$userCheck'";
	$compiled = oci_parse($connection, $query);
	oci_execute($compiled, OCI_NO_AUTO_COMMIT);
	oci_commit($connection);

	//$userInformation = null;
	//mysql_query("select username from login where username='$user_check'", $connection);
	//$row = mysql_fetch_assoc($ses_sql);
	//$login_session =$row['username'];
	//if(!isset($login_session)){
	//mysql_close($connection); // Closing Connection
	//header('Location: index.php'); // Redirecting To Home Page
	//}
	oci_close($connection);
?>