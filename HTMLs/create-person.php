<?php
	//Start session
	session_start();
	$error = ""; 						// Variable to store error message
	//tomar todos los campos desde el form y escribirlos en el array Session
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['lastName'] = $_POST['last-name'];
	$_SESSION['lastName2'] = $_POST['second-last-name2'];
	$_SESSION['nickname'] = $_POST['nickname'];	
	$_SESSION['bday'] = $_POST['bday'];
	$_SESSION['zodiac'] = $_POST['zodiac'];
	$_SESSION['tagline'] = $_POST['tagline'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['sexualOrientation'] = $_POST['sexual-orientation'];
	$_SESSION['relationshipStatus'] = $_POST['relationship-status'];
	$_SESSION['state'] = $_POST['state'];
	$_SESSION['address'] = $_POST['address'];
	$_SESSION['highschool'] = $_POST['highschool'];
	$_SESSION['university'] = $_POST['university'];
	$_SESSION['work'] = $_POST['work'];
	$_SESSION['salary'] = $_POST['salary'];
	$_SESSION['religion'] = $_POST['religion'];
	$_SESSION['height'] = $_POST['height'];
	$_SESSION['bodyType'] = $_POST['body-type'];
	$_SESSION['skinColor'] = $_POST['skin-color'];
	$_SESSION['eyeColor'] = $_POST['eye-color'];
	$_SESSION['hairColor'] = $_POST['hair-color'];
	$_SESSION['smoker'] = $_POST['smoker'];
	$_SESSION['drinker'] = $_POST['drinker'];
	$_SESSION['exerciseFrequency'] = $_POST['exercise-frequency'];
	$_SESSION['numberKids'] = $_POST['number-kids'];
	$_SESSION['interestedChildren'] = $_POST['interested-children'];
	$_SESSION['likesPets'] = $_POST['likes-pets'];
	$_SESSION['ageRange'] = $_POST['age-range'];

	//if (isset($_POST["submit"])) {
		if (empty($_POST['name']) || empty($_POST['last-name']) || empty($_POST['bday']) || empty($_POST['zodiac'])
			 || empty($_POST['gender']) || empty($_POST['sexual-orientation'])  || empty($_POST['relationship-status'])
			 || empty($_POST['bday']) || empty($_POST['state']) || empty($_POST['religion']) || empty($_POST['height'])
			 || empty($_POST['body-type']) || empty($_POST['skin-color']) || empty($_POST['eye-color']) || empty($_POST['hair-color']) 
			 || empty($_POST['smoker']) || empty($_POST['drinker']) || empty($_POST['bday'])  || empty($_POST['exercise-frequency']) 
			 || empty($_POST['number-kids']) || empty($_POST['interested-children']) || empty($_POST['likes-pets']) ) {
			$error = "One or more null values";
			$_POST['error'] = $error;
			header("Location: http://localhost/MatchMe/HTMLs/create-profile.php#invalidData");
		}
		else {
			//establishes a connection to the db
			$connection = oci_connect("ADMINISTRATOR", "ADMINISTRATOR", "(DESCRIPTION = (ADDRESS_LIST =
      							(ADDRESS = (PROTOCOL = TCP)(HOST = 172.26.50.118)(PORT = 1521)))
								(CONNECT_DATA =(SERVICE_NAME = MATCHME)))");
			if (!$connection) {
				echo "Invalid connection " . var_dump(ocierror());
				die();
			}

			// gets values from create-profile.php
			/*$name = $_POST["name"];
			$lastName = $_POST["last-name"];
			$lastName2 = $_POST["last-name2"];
			$nickname = $_POST["nickname"];
			$bday = $_POST["bday"];
			$zodiac = $_POST["zodiac"];
			$tagline = $_POST["tagline"];
			$gender = $_POST["gender"];
			$sexualOrientation = $_POST["sexual-orientation"];
			$relationshipStatus = $_POST["relationship-status"];
			$city = $_POST["state"];		//I can get the city's name, though not its code.
			echo $city;
			$address = $_POST["address"];
			$highschool = $_POST["highschool"];
			$university = $_POST["university"];
			$work = $_POST["work"];
			$salary = $_POST["salary"];
			$religion = $_POST["religion"];
			$height = $_POST["height"];
			$bodyType = $_POST["body-type"];
			$skinColor = $_POST["skin-color"];
			$eyeColor = $_POST["eye-color"];
			$hairColor = $_POST["hair-color"];
			$smoker = $_POST["smoker"];
			$drinker = $_POST["drinker"];
			$excerciseFreq = $_POST["exercise-frequency"];
			$numberKids = $_POST["number-kids"];
			$interestedChildren = $_POST["interested-children"];
			$likesPets = $_POST["likes-pets"];*/

			$query = 'BEGIN inserts.Person(:usernameID, :firstName, :lastName, :lastName2, :birthday, :nickname, :address, :tagline,
						:highschool, :university, :work, :salary, :height, :smoker, :numberKids, :interestedChildren, :likesPets,
						:eyeColor, :gender, :sexualOrientation, :ageRange, :skinColor, :hairColor, :religion, :zodiac, :relationshipStatus,
						:bodyType, :exerciseFrequency, :city, :foundPartner, :gotMarried, :drinker); END;';
			$compiled = oci_parse($connection, $query);

			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID']);
			oci_bind_by_name($compiled, ':firstName', $_SESSION['firstName']);
			oci_bind_by_name($compiled, ':lastName', $_SESSION['lastName']);
			oci_bind_by_name($compiled, ':lastName2', $_SESSION['lastName2']);
			oci_bind_by_name($compiled, ':birthday', $_SESSION['birthday']);
			oci_bind_by_name($compiled, ':nickname', $_SESSION['nickname']);
			oci_bind_by_name($compiled, ':address', $_SESSION['address']);
			oci_bind_by_name($compiled, ':tagline', $_SESSION['tagline']);
			oci_bind_by_name($compiled, ':highschool', $_SESSION['highschool']);
			oci_bind_by_name($compiled, ':university', $_SESSION['university']);
			oci_bind_by_name($compiled, ':work', $_SESSION['work']);
			oci_bind_by_name($compiled, ':salary', $_SESSION['salary']);
			oci_bind_by_name($compiled, ':height', $_SESSION['height']);
			oci_bind_by_name($compiled, ':smoker', $_SESSION['smoker']);
			oci_bind_by_name($compiled, ':smoker', $_SESSION['smoker']);

			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);

				if ($userType == 1) { //if user is administrator
					header("Location: http://localhost/MatchMe/HTMLs/admin-homepage.php");
				}
				else {
					header("Location: http://localhost/MatchMe/HTMLs/homepage.php");
				}
			}
			else {			//if the combination username+password were denied by the db
				$loginerror = "Username and password combination were invalid.";
				$_POST['loginerror'] = $loginerror;
				header("Location: http://localhost/MatchMe/HTMLs/index.php#username+passworddonotmatch");
			}
			oci_close($connection);
		}
	//}
	//else {		//if the submit action wasn't set, redirect
	//	echo "?";
	//	header("Location: http://localhost/MatchMe/HTMLs/index.php#login");
	//}
?>