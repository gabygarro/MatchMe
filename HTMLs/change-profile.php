<?php
    include('session.php');
    $error = "* Null values: ";
	if (empty($_POST['name']) || empty($_POST['last-name']) || empty($_POST['zodiac'])
		 || empty($_POST['gender']) || empty($_POST['sexual-orientation'])  || empty($_POST['relationship-status'])
		 || empty($_POST['religion']) || !isset($_POST['height'])
		 || empty($_POST['body-type']) || empty($_POST['skin-color']) || empty($_POST['eye-color']) 
		 || empty($_POST['hair-color']) || !isset($_POST['smoker']) || !isset($_POST['drinker'])  
		 || empty($_POST['exercise-frequency']) || !isset($_POST['number-kids']) || !isset($_POST['interested-children']) 
		 || !isset($_POST['likes-pets']) ) {

		if (empty($_POST['name'])) $error = $error . "name, ";
		if (empty($_POST['last-name'])) $error = $error . "last name, ";
		if (empty($_POST['zodiac'])) $error = $error . "zodiac sign, ";
		if (empty($_POST['gender'])) $error = $error . "gender, ";
		if (empty($_POST['sexual-orientation'])) $error = $error . "sexual orientation, ";  
		if (empty($_POST['relationship-status'])) $error = $error . "relationship status, ";
		if (empty($_POST['religion'])) $error = $error . "religion, ";
		if (empty($_POST['height'])) $error = $error . "height, ";
		if (empty($_POST['body-type'])) $error = $error . "body type, "; 
		if (empty($_POST['skin-color'])) $error = $error . "skin color, "; 
		if (empty($_POST['eye-color'])) $error = $error . "eye color, ";
		if (empty($_POST['hair-color'])) $error = $error . "hair color, ";
		if (!isset($_POST['smoker'])) $error = $error . "smoker, ";
		if (!isset($_POST['drinker'])) $error = $error . "drinker, "; 
		if (empty($_POST['exercise-frequency'])) $error = $error . "exercise frequency, ";
		if (empty($_POST['number-kids'])) $error = $error . "number of kids, ";
		if (!isset($_POST['interested-children'])) $error = $error . "interested in children, ";
		if (!isset($_POST['likes-pets'])) $error = $error . "likes pets, ";
		
		$_SESSION['error'] = substr($error, 0, -2);
		header("Location: create-profile.php#invalidData");
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

		//update picture
		$target_dir = "pictures/";
		if (isset($_FILES["picture"]["name"])) {
			$target_file = $target_dir . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$target_file = $target_dir . $_SESSION['usernameID'] . "." . $imageFileType;
			// Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES["picture"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		    if ($_FILES["picture"]["size"] > 5242880) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			if ($uploadOk == 0) {
    		echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			if (!empty($_SESSION['picture'])) {	//the picture exists
				$query = 'BEGIN updatePicture(:usernameID, :fileLocation); END;';
				$compiled = oci_parse($connection, $query);
				oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
				oci_bind_by_name($compiled, ':fileLocation', $target_file, 200);
				oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				$_SESSION['picture'] = $target_file;
			}
			else { //picture didn't exist before
				$query = 'BEGIN insertPicture(:usernameID, :fileLocation); END;';
				$compiled = oci_parse($connection, $query);
				oci_bind_by_name($compiled, ':usernameID', $usernameID, 5);
				oci_bind_by_name($compiled, ':fileLocation', $target_file, 200);
				oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				$_SESSION['picture'] = $target_file;
			}
			
		}

	    //update name
	    if ($_SESSION['name'] != $_POST['name']) {
	    	$query = 'BEGIN updatePerson.firstname(:usernameID, :firstname); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':firstname', $_POST['name'], 50);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['name'] = $_POST['name'];
	    }

	    //update last name 1
	    if ($_SESSION['lastName'] != $_POST['last-name']) {
	    	$query = 'BEGIN updatePerson.lastname1(:usernameID, :lastname); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':lastname', $_POST['last-name'], 50);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['lastName'] = $_POST['last-name'];
	    }

	    //update last name 2
	    if ($_SESSION['lastName2'] != $_POST['last-name2']) {
	    	$query = 'BEGIN updatePerson.lastname2(:usernameID, :lastname2); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':lastname2', $_POST['last-name2'], 50);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['lastName2'] = $_POST['last-name2'];
	    }

	    //update nickname
	    if ($_SESSION['nickname'] != $_POST['nickname']) {
	    	$query = 'BEGIN updatePerson.nickname(:usernameID, :nickname); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':nickname', $_POST['nickname'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['nickname'] = $_POST['nickname'];
	    }

	    //update birthday
	    if (!empty($_POST['bday'])) { //if it's not empty 
	    	//convert the bday to its db format. HTML format is yyyy-mm-dd
		    $birthday = $_POST['bday'];
		    $date = preg_split('/[- :]/',$birthday);
		    $birthday = $date[2] . "/" . $date[1] . "/" . $date[0];
		    $_SESSION['birthdayIn'] = $birthday; //write the format to input date to db

	    	$query = 'BEGIN updatePerson.birthday(:usernameID, :birthday); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':birthday', $_SESSION['birthdayIn'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['birthday'] = $_POST['birthdayIn'];
	    }

	    //update zodiac sign
	    if ($_SESSION['zodiacID'] != $_POST['zodiac']) {
	    	$query = 'BEGIN updatePerson.zodiacSignID(:usernameID, :zodiacID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':zodiacID', $_POST['zodiac'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['zodiacID'] = $_POST['zodiac'];
	    }

	    //update gender
	    if ($_SESSION['genderID'] != $_POST['gender']) {
	    	$query = 'BEGIN updatePerson.genderID(:usernameID, :genderID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':genderID', $_POST['gender'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['genderID'] = $_POST['gender'];
	    }

	    //update sexual orientation ID
	    if ($_SESSION['sexualOrientationID'] != $_POST['sexual-orientation']) {
	    	$query = 'BEGIN updatePerson.orientationID(:usernameID, :sexualOrientationID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':zodiacID', $_POST['zodiac'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['zodiacID'] = $_POST['zodiac'];
	    }

	    //update relationship Status ID
	    if ($_SESSION['relationshipStatusID'] != $_POST['relationship-status']) {
	    	$query = 'BEGIN updatePerson.relationshipStatusID(:usernameID, :relationshipStatusID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':relationshipStatusID', $_POST['relationship-status'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['relationshipStatusID'] = $_POST['relationship-status'];
	    }

	    if (!empty($_POST['state'])) { // if it's not empty it means it was changed
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

		    $query = 'BEGIN updatePerson.cityID(:usernameID, :cityID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 50);
			oci_bind_by_name($compiled, ':cityID', $_SESSION['cityID'], 4);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
		    oci_commit($connection);
		}

		//update address
	    if ($_SESSION['address'] != $_POST['address']) {
	    	$query = 'BEGIN updatePerson.address(:usernameID, :address); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':address', $_POST['address'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['address'] = $_POST['address'];
	    }

	    //update age range
	    if ($_SESSION['ageRangeID'] != $_POST['age-range']) {
	    	$query = 'BEGIN updatePerson.rangeID(:usernameID, :ageRangeID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':ageRangeID', $_POST['ageRangeID'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['ageRangeID'] = $_POST['age-range'];
	    }

	    //update high school
	    if ($_SESSION['highschool'] != $_POST['highschool']) {
	    	$query = 'BEGIN updatePerson.highschool(:usernameID, :highschool); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':highschool', $_POST['highschool'], 100);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['highschool'] = $_POST['highschool'];
	    }

	    //update university
	    if ($_SESSION['university'] != $_POST['university']) {
	    	$query = 'BEGIN updatePerson.university(:usernameID, :university); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':university', $_POST['university'], 100);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['university'] = $_POST['university'];
	    }

	    //update work
	    if ($_SESSION['work'] != $_POST['work']) {
	    	$query = 'BEGIN updatePerson.work(:usernameID, :work); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':work', $_POST['work'], 100);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['work'] = $_POST['work'];
	    }

	    //update salary
	    if ($_SESSION['salary'] != $_POST['salary']) {
	    	$query = 'BEGIN updatePerson.salary(:usernameID, :salary); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':salary', $_POST['salary'], 10);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['salary'] = $_POST['salary'];
	    }

	    //update religion
	    if ($_SESSION['religionID'] != $_POST['religion']) {
	    	$query = 'BEGIN updatePerson.religionID(:usernameID, :religion); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':religion', $_POST['religion'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['religionID'] = $_POST['religion'];
	    }

	    //update height
	    $height = str_replace(".", ",", (string) $_POST['height']);
	    if ($_SESSION['height'] != $_POST['height']) {
	    	$query = 'BEGIN updatePerson.height(:usernameID, :height); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':height', $height, 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['height'] = $height;
	    }

	    //update address
	    if ($_SESSION['bodyTypeID'] != $_POST['body-type']) {
	    	$query = 'BEGIN updatePerson.bodyTypeID(:usernameID, :bodyTypeID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':bodyTypeID', $_POST['body-type'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['bodyTypeID'] = $_POST['body-type'];
	    }

	    //update skin color
	    if ($_SESSION['skinColorID'] != $_POST['skin-color']) {
	    	$query = 'BEGIN updatePerson.skinColorID(:usernameID, :skinColorID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':skinColorID', $_POST['skin-color'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['skinColorID'] = $_POST['skin-color'];
	    }

	    //update eye color
	    if ($_SESSION['eyeColorID'] != $_POST['eye-color']) {
	    	$query = 'BEGIN updatePerson.eyeColorID(:usernameID, :eyeColorID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':eyeColorID', $_POST['eye-color'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['eyeColorID'] = $_POST['eye-color'];
	    }

	    //update hair color
	    if ($_SESSION['hairColorID'] != $_POST['hair-color']) {
	    	$query = 'BEGIN updatePerson.hairColorID(:usernameID, :hairColorID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':hairColorID', $_POST['hair-color'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['hairColorID'] = $_POST['hair-color'];
	    }

	    //update if person smokes
	    if ($_SESSION['smoker'] != $_POST['smoker']) {
	    	$query = 'BEGIN updatePerson.smoker(:usernameID, :smoker); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':smoker', $_POST['smoker'], 1);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['smoker'] = $_POST['smoker'];
	    }

	    //update if person drinks
	    if ($_SESSION['drinker'] != $_POST['drinker']) {
	    	$query = 'BEGIN updatePerson.drinker(:usernameID, :drinker); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':drinker', $_POST['drinker'], 1);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['drinker'] = $_POST['drinker'];
	    }

	    //update exercise frequency
	    if ($_SESSION['exerciseFrequencyID'] != $_POST['exercise-frequency']) {
	    	$query = 'BEGIN updatePerson.exerciseFreqID(:usernameID, :exerciseFrequencyID); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':exerciseFrequencyID', $_POST['exercise-frequency'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['exerciseFrequencyID'] = $_POST['exercise-frequency'];
	    }

	    //update number of kids
	    if ($_SESSION['numberKids'] != $_POST['number-kids']) {
	    	$query = 'BEGIN updatePerson.numberOfKids(:usernameID, :numberKids); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':numberKids', $_POST['number-kids'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['numberKids'] = $_POST['number-kids'];
	    }

	    //update if person likes pets
	    if ($_SESSION['likesPets'] != $_POST['likes-pets']) {
	    	$query = 'BEGIN updatePerson.likesPets(:usernameID, :likesPets); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':likesPets', $_POST['likes-pets'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['likesPets'] = $_POST['likes-pets'];
	    }

	    //update if person found partner
	    if ($_SESSION['foundPartner'] != $_POST['found-partner']) {
	    	$query = 'BEGIN updatePerson.foundPartner(:usernameID, :foundPartner); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':foundPartner', $_POST['found-partner'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['foundPartner'] = $_POST['found-partner'];
	    }

	    //update if person got married
	    if ($_SESSION['gotMarried'] != $_POST['got-married']) {
	    	$query = 'BEGIN updatePerson.gotMarried(:usernameID, :gotMarried); END;';
			$compiled = oci_parse($connection, $query);
			oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
			oci_bind_by_name($compiled, ':gotMarried', $_POST['got-married'], 25);
			oci_execute($compiled, OCI_NO_AUTO_COMMIT);
			oci_commit($connection);
			$_SESSION['gotMarried'] = $_POST['got-married'];
	    }

	    //get languages
	    for ($i = 0; $i < $_SESSION['countLanguages']; $i++) {
	    	if (isset($_POST['language' . $i]) && isset($_SESSION['language' . $i])) {
	    		//do nothing
	    	}
	    	else if (empty($_POST['language' . $i]) && isset($_SESSION['language' . $i])) {
	    		//delete the language
	    		$query = 'BEGIN deletes.personlanguage(:usernameID, :languageID); END;';
	    		$compiled = oci_parse($connection, $query);
	    		oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
	    		oci_bind_by_name($compiled, ':languageID', $_SESSION['language' . $i], 3);
	    		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				unset($_SESSION['language' . $i]);
	    	}
	    	else if (!empty($_POST['language' . $i]) && !isset($_SESSION['language' . $i])) {
	    		//set the language
				$query = 'BEGIN inserts.languagesByPerson(:languageID, :usernameID); END;';
            	$compiled = oci_parse($connection, $query);
            	oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
				oci_bind_by_name($compiled, ':languageID', $_POST['language' . $i], 3);
	            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				$_SESSION['language' . $i] = $_POST['language' . $i];
			}	
		}

	    //get hobbies
	    for ($i = 0; $i < $_SESSION['countHobbies']; $i++) {
	    	if (isset($_POST['hobbie' . $i]) && isset($_SESSION['hobbie' . $i])
	    		) {
	    		//do nothing
	    	}
	    	else if (empty($_POST['hobbie' . $i]) && isset($_SESSION['hobbie' . $i])) {
	    		//delete the hobbie
	    		$query = 'BEGIN deletes.personhobbie(:usernameID, :hobbieID); END;';
	    		$compiled = oci_parse($connection, $query);
	    		oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
	    		oci_bind_by_name($compiled, ':hobbieID', $_SESSION['hobbie' . $i], 3);
	    		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				unset($_SESSION['hobbie' . $i]);
	    	}
	    	else if (!empty($_POST['hobbie' . $i]) && !isset($_SESSION['hobbie' . $i])) {
	    		//set the hobbie
				$query = 'BEGIN inserts.hobbiesByPerson(:hobbieID, :usernameID); END;';
            	$compiled = oci_parse($connection, $query);
            	oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
				oci_bind_by_name($compiled, ':hobbieID', $_POST['hobbie' . $i], 3);
	            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				$_SESSION['hobbie' . $i] = $_POST['hobbie' . $i];
			}	
		}

	    //get interests
	    for ($i = 0; $i < $_SESSION['countInterests']; $i++) {
	    	if (isset($_POST['interest' . $i]) && isset($_SESSION['interest' . $i])) {
	    		//do nothing
	    	}
	    	else if (empty($_POST['interest' . $i]) && isset($_SESSION['interest' . $i])) {
	    		//delete the interest
	    		$query = 'BEGIN deletes.personInterest(:usernameID, :interestID); END;';
	    		$compiled = oci_parse($connection, $query);
	    		oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
	    		oci_bind_by_name($compiled, ':interestID', $_SESSION['interest' . $i], 3);
	    		oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				unset($_SESSION['interest' . $i]);
	    	}
	    	else if (!empty($_POST['interest' . $i]) && !isset($_SESSION['interest' . $i])) {
	    		//set the interest
				$query = 'BEGIN inserts.interestsByPerson(:interestID, :usernameID); END;';
            	$compiled = oci_parse($connection, $query);
            	oci_bind_by_name($compiled, ':usernameID', $_SESSION['usernameID'], 5);
				oci_bind_by_name($compiled, ':interestID', $_POST['interest' . $i], 3);
	            oci_execute($compiled, OCI_NO_AUTO_COMMIT);
				oci_commit($connection);
				$_SESSION['interest' . $i] = $_POST['interest' . $i];
			}	
		}

		header("Location: homepage.php#changessaved");
	}
?>