<?php
	//Start session
	session_start();
	$error = ""; 						// Variable to store error message
	//tomar todos los campos desde el form y escribirlos en el array Session
	if (!empty($_POST['name'])) 				$_SESSION['name'] = 				$_POST['name'];
	if (!empty($_POST['last-name'])) 			$_SESSION['lastName'] = 			$_POST['last-name'];
	if (!empty($_POST['last-name2'])) 			$_SESSION['lastName2'] = 			$_POST['last-name2'];
	if (!empty($_POST['nickname']))				$_SESSION['nickname'] = 			$_POST['nickname'];	
	if (!empty($_POST['zodiac'])) 				$_SESSION['zodiacID'] = 			intval($_POST['zodiac']);
	if (!empty($_POST['tagline'])) 				$_SESSION['tagline'] = 				$_POST['tagline'];
	if (!empty($_POST['gender'])) 				$_SESSION['genderID'] = 			intval($_POST['gender']);
	if (!empty($_POST['sexual-orientation'])) 	$_SESSION['sexualOrientationID'] = 	intval($_POST['sexual-orientation']);
	if (!empty($_POST['relationship-status'])) 	$_SESSION['relationshipStatusID'] = intval($_POST['relationship-status']);
	if (!empty($_POST['address'])) 				$_SESSION['address'] = 				$_POST['address'];
	if (!empty($_POST['highschool'])) 			$_SESSION['highschool'] = 			$_POST['highschool'];
	if (!empty($_POST['university'])) 			$_SESSION['university'] = 			$_POST['university'];
	if (!empty($_POST['work'])) 				$_SESSION['work'] = 				$_POST['work'];
	if (!empty($_POST['salary'])) 				$_SESSION['salary'] = 				intval($_POST['salary']);
	if (!empty($_POST['religion'])) 			$_SESSION['religionID'] = 			intval($_POST['religion']);
	if (!empty($_POST['height'])) 				$_SESSION['height'] = 				intval($_POST['height']);
	if (!empty($_POST['body-type'])) 			$_SESSION['bodyTypeID'] = 			intval($_POST['body-type']);
	if (!empty($_POST['skin-color'])) 			$_SESSION['skinColorID'] = 			intval($_POST['skin-color']);
	if (!empty($_POST['eye-color'])) 			$_SESSION['eyeColorID'] = 			intval($_POST['eye-color']);
	if (!empty($_POST['hair-color'])) 			$_SESSION['hairColorID'] = 			intval($_POST['hair-color']);
	if (isset($_POST['smoker'])) 				$_SESSION['smoker'] = 				intval($_POST['smoker']);
	if (isset($_POST['drinker'])) 				$_SESSION['drinker'] = 				intval($_POST['drinker']);
	if (!empty($_POST['exercise-frequency'])) 	$_SESSION['exerciseFrequencyID'] = 	intval($_POST['exercise-frequency']);
	if (isset($_POST['number-kids'])) 			$_SESSION['numberKids'] = 			intval($_POST['number-kids']);
	if (isset($_POST['interested-children'])) 	$_SESSION['interestedChildren'] = 	intval($_POST['interested-children']);
	if (isset($_POST['likes-pets'])) 			$_SESSION['likesPets'] = 			intval($_POST['likes-pets']);
	if (!empty($_POST['age-range'])) 			$_SESSION['ageRangeID'] = 			intval($_POST['age-range']);

	//save the languages
	for ($i = 0; $i < $_SESSION['countLanguages']; $i++) {
		if (isset($_POST['language' . $i])) {
			$_SESSION['language' . $i] = $_POST['language' . $i];
		}	
	}

	//save the interests
	for ($i = 0; $i < $_SESSION['countInterests']; $i++) {
		if (isset($_POST['interest' . $i])) {
			$_SESSION['interest' . $i] = $_POST['interest' . $i];
		}	
	}

	//save the hobbies
	for ($i = 0; $i < $_SESSION['countHobbies']; $i++) {
		if (isset($_POST['hobbie' . $i])) {
			$_SESSION['hobbie' . $i] = $_POST['hobbie' . $i];
		}	
	}
			
	//if (isset($_POST["submit"])) {
		$error = "* Null values: ";
		if (empty($_POST['name']) || empty($_POST['last-name']) || empty($_POST['bday']) || empty($_POST['zodiac'])
			 || empty($_POST['gender']) || empty($_POST['sexual-orientation'])  || empty($_POST['relationship-status'])
			 || empty($_POST['state']) || empty($_POST['religion']) || empty($_POST['height'])
			 || empty($_POST['body-type']) || empty($_POST['skin-color']) || empty($_POST['eye-color']) 
			 || empty($_POST['hair-color']) || !isset($_POST['smoker']) || !isset($_POST['drinker'])  
			 || empty($_POST['exercise-frequency']) || !isset($_POST['number-kids']) || !isset($_POST['interested-children']) 
			 || !isset($_POST['likes-pets']) ) {

			if (empty($_POST['name'])) $error = $error . "name, ";
			if (empty($_POST['last-name'])) $error = $error . "last name, ";
			if (empty($_POST['bday'])) $error = $error . "birthday, ";
			if (empty($_POST['zodiac'])) $error = $error . "zodiac sign, ";
			if (empty($_POST['gender'])) $error = $error . "gender, ";
			if (empty($_POST['sexual-orientation'])) $error = $error . "sexual orientation, ";  
			if (empty($_POST['relationship-status'])) $error = $error . "relationship status, ";
			if (empty($_POST['state'])) $error = $error . "city, ";
			if (empty($_POST['religion'])) $error = $error . "religion, ";
			if (empty($_POST['height'])) $error = $error . "height, ";
			if (empty($_POST['body-type'])) $error = $error . "body type, "; 
			if (empty($_POST['skin-color'])) $error = $error . "skin color, "; 
			if (empty($_POST['eye-color'])) $error = $error . "eye color, ";
			if (empty($_POST['hair-color'])) $error = $error . "hair color, ";
			if (empty($_POST['smoker'])) $error = $error . "smoker, ";
			if (empty($_POST['drinker'])) $error = $error . "drinker, "; 
			if (empty($_POST['exercise-frequency'])) $error = $error . "exercise frequency, ";
			if (empty($_POST['number-kids'])) $error = $error . "number of kids, ";
			if (empty($_POST['interested-children'])) $error = $error . "interested in children, ";
			if (empty($_POST['likes-pets'])) $error = $error . "likes pets";
			
			$_SESSION['error'] = substr($error, 0, -2);
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

			//convert the city's name to its ID and store it
			$_SESSION['city'] = $_POST['state']; 	//save the city's name
			$cityID; //this will store the city ID
			$query = 'BEGIN getCatalog.cityID(:cityName, :cityID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':cityname', $_SESSION['city'], 50);
			oci_bind_by_name($compiled, ':cityID', $cityID, 4);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
		    oci_commit($connection);
		    $_SESSION['cityID'] = $cityID;

		    //convert the bday to its db format. HTML format is yyyy-mm-dd
		    $birthday = $_POST['bday'];
		    $date = preg_split('/[- :]/',$birthday);
		    $birthday = $date[2] . "/" . $date[1] . "/" . $date[0];
		    $_SESSION['birthdayIn'] = $birthday; //write the format to input date to db
		    $_SESSION['birthday'] = $_SESSION['birthdayIn'];

			$query = 'BEGIN inserts.Person(:usernameID, :firstName, :lastName, :lastName2, :bday, :nickname, :address, :tagline,
						:highschool, :university, :work, :salary, :height, :smoker, :numberKids, :interestedChildren, :likesPets,
						:eyeColor, :gender, :sexualOrientation, :ageRange, :skinColor, :hairColor, :religion, :zodiac, 
						:relationshipStatus, :bodyType, :exerciseFrequency, :city, :foundPartner, :gotMarried, :drinker); END;';
			
			$compiled = oci_parse($connection, $query);

			$_SESSION['foundPartner'] = 0;
			$_SESSION['gotMarried'] = 0;
			$_SESSION['lastName2'] = "";

			oci_bind_by_name($compiled, ':usernameID', 			$_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':firstName', 			$_SESSION['name'], 50);
			oci_bind_by_name($compiled, ':lastName', 			$_SESSION['lastName'], 50);
			oci_bind_by_name($compiled, ':lastName2', 			$_SESSION['lastName2'], 50);
			oci_bind_by_name($compiled, ':bday', 				$_SESSION['birthdayIn'], 50);
			oci_bind_by_name($compiled, ':nickname', 			$_SESSION['nickname'], 25);
			oci_bind_by_name($compiled, ':address', 			$_SESSION['address'], 140);
			oci_bind_by_name($compiled, ':tagline', 			$_SESSION['tagline'], 200);
			oci_bind_by_name($compiled, ':highschool', 			$_SESSION['highschool'], 100);
			oci_bind_by_name($compiled, ':university', 			$_SESSION['university'], 100);
			oci_bind_by_name($compiled, ':work', 				$_SESSION['work'], 100);
			oci_bind_by_name($compiled, ':salary', 				$_SESSION['salary'], 7);
			oci_bind_by_name($compiled, ':height', 				$_SESSION['height'], 4);
			oci_bind_by_name($compiled, ':smoker', 				$_SESSION['smoker'], 1);
			oci_bind_by_name($compiled, ':numberKids', 			$_SESSION['numberKids'], 2);
			oci_bind_by_name($compiled, ':interestedChildren', 	$_SESSION['interestedChildren'], 1);
			oci_bind_by_name($compiled, ':likesPets', 			$_SESSION['likesPets'], 1);
			oci_bind_by_name($compiled, ':eyeColor', 			$_SESSION['eyeColorID'], 3);
			oci_bind_by_name($compiled, ':gender', 				$_SESSION['genderID'], 3);
			oci_bind_by_name($compiled, ':sexualOrientation', 	$_SESSION['sexualOrientationID'], 3);
			oci_bind_by_name($compiled, ':ageRange', 			$_SESSION['ageRangeID'], 3);
			oci_bind_by_name($compiled, ':skinColor', 			$_SESSION['skinColorID'], 3);
			oci_bind_by_name($compiled, ':hairColor', 			$_SESSION['hairColorID'], 2);
			oci_bind_by_name($compiled, ':religion', 			$_SESSION['religionID'], 2);
			oci_bind_by_name($compiled, ':zodiac', 				$_SESSION['zodiacID'], 2);
			oci_bind_by_name($compiled, ':relationshipStatus',	$_SESSION['relationshipStatusID'], 2);
			oci_bind_by_name($compiled, ':bodyType', 			$_SESSION['bodyTypeID'], 1);
			oci_bind_by_name($compiled, ':exerciseFrequency', 	$_SESSION['exerciseFrequencyID'], 1);
			oci_bind_by_name($compiled, ':city', 				$_SESSION['cityID'], 4);
			oci_bind_by_name($compiled, ':foundPartner', 		$_SESSION['foundPartner'], 1);
			oci_bind_by_name($compiled, ':gotMarried', 			$_SESSION['gotMarried'], 1);
			oci_bind_by_name($compiled, ':drinker', 			$_SESSION['drinker'], 1);

			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);

			//input its languages
			for ($i = 0; $i < $_SESSION['countLanguages']; $i++) {
				$query = 'BEGIN inserts.languagesByPerson(:languageID, :usernameID); END;';
	            $compiled = oci_parse($connection, $query);
	            oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
				if (isset($_POST['language' . $i])) {
					$languageID = $_POST['language' . $i];
					oci_bind_by_name($compiled, ':languageID', $languageID, 3);
		            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
					oci_commit($connection);
				}	
			}

			//input interests
			for ($i = 0; $i < $_SESSION['countInterests']; $i++) {
				$query = 'BEGIN inserts.interestsByPerson(:interestID, :usernameID); END;';
	            $compiled = oci_parse($connection, $query);
	            oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
				if (isset($_POST['interest' . $i])) {
					$interestID = $_POST['interest' . $i];
					oci_bind_by_name($compiled, ':interestID', $interestID, 3);
		            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
					oci_commit($connection);
				}	
			}

			//input hobbies
			for ($i = 0; $i < $_SESSION['countHobbies']; $i++) {
				$query = 'BEGIN inserts.hobbiesByPerson(:hobbieID, :usernameID); END;';
	            $compiled = oci_parse($connection, $query);
	            oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
				if (isset($_POST['hobbie' . $i])) {
					$hobbieID = $_POST['hobbie' . $i];
					oci_bind_by_name($compiled, ':hobbieID', $hobbieID, 3);
		            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
					oci_commit($connection);
				}	
			}


			header("Location: http://localhost/MatchMe/HTMLs/homepage.php");
		}
	//}
	//else {		//if the submit action wasn't set, redirect
	//	echo "?";
	//	header("Location: http://localhost/MatchMe/HTMLs/index.php#login");
	//}
?>