<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

// FOR LANDLORD PROFILES
function get_contact_info($id)
{
    global $mysqli,$db_table_prefix;
        
        $stmt = $mysqli->prepare("SELECT 
            business_num,
            email,
            business_hours_weekdays,
            business_hours_weekends
            FROM ".$db_table_prefix."users
            WHERE 
            id = ?
            LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($contact_num,$email,$hours_weekdays,$hours_weekends);
        while ($stmt->fetch()){
            $row = array($contact_num,$email,$hours_weekdays,$hours_weekends);
        }
        $stmt->close();
        return ($row);
}

// FOR STUDENT PROFILES!!!
function get_all_prefs($id)
{
    global $mysqli,$db_table_prefix;
        
        $stmt = $mysqli->prepare("SELECT 
                social,
                sleep,
                cleaning,
                p_type,
                p_rent,
                p_sharing,
                p_smoking
                FROM ".$db_table_prefix."preferences
                WHERE 
                s_id = ?
                LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($social, $sleep, $clean, $type, $rent, $sharing, $smoking);
        while ($stmt->fetch()){
            $row = array($social,$sleep,$clean,$type,$rent,$sharing,$smoking);
        }
        $stmt->close();
        return ($row);
}

function get_about_me($id)
{
     global $mysqli,$db_table_prefix;
        
        $stmt = $mysqli->prepare("SELECT 
                major,
                self_stmt
                FROM ".$db_table_prefix."preferences
                WHERE 
                s_id = ?
                LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($major,$self_stmt);
        while ($stmt->fetch()){
            $row = array($major,$self_stmt);
        }
        $stmt->close();
        
        switch($row[0])
        {
            case 1: $row[0] = "Accounting";
                break;
            case 2: $row[0] = "Agriculture";
                break;
            case 3: $row[0] = "Agriculture-Economics";
                break;
            case 4: $row[0] = "Animal Science";
                break;
            case 5: $row[0] = "Architecture";
                break;
            case 6: $row[0] = "Biology";
                break;
            case 7: $row[0] = "Chemical Engineering";
                break;
            case 8: $row[0] = "Chemistry";
                break;
            case 9: $row[0] = "Civil Engineering";
                break;
            case 10: $row[0] = "Clinical Adolescent Psychology";
                break;
            case 11: $row[0] = "Communications";
                break;
            case 12: $row[0] = "Community Development";
                break;
            case 13: $row[0] = "Computer Engineering";
                break;
            case 14: $row[0] = "Computer Engineering Technology";
                break;
            case 15: $row[0] = "Computer Information Systems";
                break;
            case 16: $row[0] = "Computer Science";
                break;
            case 17: $row[0] = "Construction Science";
                break;
            case 18: $row[0] = "Counseling";
                break;
            case 19: $row[0] = "Criminal Justice-Juvenile Justice";
                break;
            case 20: $row[0] = "Criminal Justice";
                break;
            case 21: $row[0] = "Curriculum and Instruction";
                break;
            case 22: $row[0] = "Curriculum and Instruction-Reading Education";
                break;
            case 23: $row[0] = "Drama";
                break;
            case 24: $row[0] = "Educational Administration";
                break;
            case 25: $row[0] = "Educational Leadership";
                break;
            case 26: $row[0] = "Electrical Engineering";
                break;
            case 27: $row[0] = "Electrical Engineering Technology";
                break;
            case 28: $row[0] = "Engineering";
                break;
            case 29: $row[0] = "English";
                break;
            case 30: $row[0] = "Family and Community Services";
                break;
            case 31: $row[0] = "Finance";
                break;
            case 32: $row[0] = "General Business Administration";
                break;
            case 33: $row[0] = "Health";
                break;
            case 34: $row[0] = "Health and Physical Education-Health";
                break;
            case 35: $row[0] = "Health and Physical Education-Physical Education";
                break;
            case 36: $row[0] = "History";
                break;
            case 37: $row[0] = "Human Nutrition and Food";
                break;
            case 38: $row[0] = "Human Performance";
                break;
            case 39: $row[0] = "Human Sciences";
                break;
            case 40: $row[0] = "Interdisciplinary Studies";
                break;
            case 41: $row[0] = "Juvenile Forensic Psychology";
                break;
            case 42: $row[0] = "Juvenile Justice";
                break;
            case 43: $row[0] = "Management";
                break;
            case 44: $row[0] = "Management Information Systems";
                break;
            case 45: $row[0] = "Marketing";
                break;
            case 46: $row[0] = "Mathematics";
                break;
            case 47: $row[0] = "Mechanical Engineering";
                break;
            case 48: $row[0] = "Music";
                break;
            case 49: $row[0] = "Nursing";
                break;
            case 50: $row[0] = "Nurse Administration";
                break;
            case 51: $row[0] = "Nurse Education";
                break;
            case 52: $row[0] = "Nurse Practitioner";
                break;
            case 53: $row[0] = "Physics";
                break;
            case 54: $row[0] = "Political Science";
                break;
            case 55: $row[0] = "Psychology";
                break;
            case 56: $row[0] = "Social Work";
                break;
            case 57: $row[0] = "Sociology";
                break;
            case 58: $row[0] = "Soil Science";
                break;
            case 59: $row[0] = "Spanish";
                break;
            case 60: $row[0] = "Special Education";
                break;
        }
        return ($row);
}

function get_pers_for_profile($id)
{
    global $mysqli,$db_table_prefix;
   
     $stmt = $mysqli->prepare("SELECT
             personality_result
             FROM ".$db_table_prefix."personality_quiz
             WHERE
             s_id = ?
             LIMIT 1");
     $stmt->bind_param("i",$id);
     $stmt->execute();
     $stmt->bind_result($result);
     while ($stmt->fetch()){
        $result;
     }
    $stmt->close();
    return ($result);
}

// FOR PERSONALITY QUIZ/SUGGESTED USERS
function get_user_pers_id($personality)
{
    global $mysqli,$db_table_prefix;
   
     $stmt = $mysqli->prepare("SELECT
             id
             FROM ".$db_table_prefix."personalities
             WHERE
             personality = ?
             LIMIT 1");
     $stmt->bind_param("s",$personality);
     $stmt->execute();
     $stmt->bind_result($p_id);
     while ($stmt->fetch()){
        $p_id;
     }
    $stmt->close();
    return ($p_id);
}

function get_compatible_personalities($personality_id,$compatibility)
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'PV_5.0';
    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT
            pv_personalities.personality
            FROM pv_compatibility_key, pv_personalities
            WHERE
            pv_compatibility_key.compatibility = '$compatibility' AND
            pv_compatibility_key.pers1 = '$personality_id' AND
            pv_compatibility_key.pers2 = pv_personalities.id    
            ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $id_array[] = $row;
        } 
    }
    
    $conn->close();
    return($id_array);
}

function get_id_from_pers_result($pers_id,$compatibility)
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'PV_5.0';
    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    $compatible_personalities = get_compatible_personalities($pers_id,$compatibility);
    if($compatibility == 3)
    {
        $compatible_personalities[3]['personality'] = get_pers_for_profile($pers_id);
    }
    
    for($i=0; $i <count($compatible_personalities); $i++)
    {
        $pers = $compatible_personalities[$i]['personality'];
        $sql = "SELECT
                s_id
                FROM pv_personality_quiz
                WHERE
                personality_result = '$pers'   
                ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $sugg_users_id[] = $row;
            } 
        }
    }
    
    $conn->close();
    return($sugg_users_id);
}

function convert_id_to_pers($p_id)
{
    global $mysqli,$db_table_prefix;
   
     $stmt = $mysqli->prepare("SELECT
             personality
             FROM ".$db_table_prefix."personalities
             WHERE
             id = ?
             ");
     $stmt->bind_param("i",$p_id);
     $stmt->execute();
     $stmt->bind_result($pers);
     while ($stmt->fetch()){
        $pers;
     }
    $stmt->close();
    return ($pers);
}


function get_user_prefs($id)
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'PV_5.0';
    // Create connection
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    $query = "SELECT s_id, major, major_imp, social,social_imp, sleep, sleep_imp, cleaning, cleaning_imp
        FROM pv_preferences
        WHERE s_id ='$id'";
    $result = $mysqli->query($query);
    echo 'Student Results:';
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user[] = $row;
        } 
    $mysqli->close();   
        return($user);
}

function get_sugg_user_prefs($id)
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'PV_5.0';
    // Create connection
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    $query = "SELECT s_id, major, major_imp, social,social_imp, sleep, sleep_imp, cleaning, cleaning_imp
        FROM pv_preferences
        WHERE s_id ='$id'";
    $result = $mysqli->query($query);
    //echo 'Student Results:';
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $sugg_users[] = $row;
        } 
    }
        $mysqli->close();
        return($sugg_users);
}
}
// Recently added
// -----------------------------------------------------------------------------
function check_user($user){
     global $mysqli,$db_table_prefix;
     $stmt = $mysqli->prepare("SELECT
                title 
                FROM ".$db_table_prefix."users 
                WHERE 
                user_name = ?
                LIMIT 1");
     $stmt->bind_param("s",$user);
     $stmt->execute();
     $stmt->bind_result($title);
     while ($stmt->fetch()){
         $title;
     }
     $stmt->close();
     return($title);
 }
 
 function take_quiz($id,$result)
 {
     global $mysqli,$db_table_prefix;
     
     $stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."personality_quiz (
                s_id,
                date_completed,
                personality_result
                )
                VALUES(
                ?,
                ".time().",
                ?
                )");
            $stmt->bind_param("is",$id,$result);
            $stmt->execute();
            $inserted_id = $mysqli->insert_id;
            $stmt->close();    
 }
 
 function get_quiz_results($id)
 {
     global $mysqli,$db_table_prefix;
   
     $stmt = $mysqli->prepare("SELECT
             s_id,
             personality_result
             FROM ".$db_table_prefix."personality_quiz
             WHERE
             s_id = ?
             LIMIT 1");
     $stmt->bind_param("i",$id);
     $stmt->execute();
     $stmt->bind_result($s_id,$result);
     while ($stmt->fetch()){
        $row = array([0]=> $s_id, [1]=>result);
     }
    $stmt->close();
    return ($row);
 }
 
function get_self_stmt($id)
 {
     global $mysqli,$db_table_prefix;
        
        $stmt = $mysqli->prepare("SELECT 
                self_stmt
                FROM ".$db_table_prefix."preferences
                WHERE 
                s_id = ?
                LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($self_stmt);
        while ($stmt->fetch()){
            $self_stmt;
        }
        $stmt->close();
        return ($self_stmt);
 }
 function get_preferences($id)
    {
        global $mysqli,$db_table_prefix;
        
        $stmt = $mysqli->prepare("SELECT 
                major,
                major_imp,
                social,
                social_imp,
                sleep,
                sleep_imp,
                cleaning,
                cleaning_imp
                FROM ".$db_table_prefix."preferences
                WHERE 
                s_id = ?
                LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($major, $major_imp, $social, $social_imp, $sleep, $sleep_imp, $clean, $clean_imp);
        while ($stmt->fetch()){
            $row = array(0 =>$major, 1 =>$major_imp, 2 =>$social, 3 =>$social_imp,
                4 =>$sleep, 5 =>$sleep_imp, 6 =>$clean, 7 =>$clean_imp);
        }
        $stmt->close();
        return ($row);
    }
    
 function fetchUserId($user){
     global $mysqli,$db_table_prefix;
     $stmt = $mysqli->prepare("SELECT
                id
                FROM ".$db_table_prefix."users
                WHERE
                user_name = ?
                LIMIT 1");
     $stmt->bind_param("s",$user);
     $stmt->execute();
     $stmt->bind_result($id);
     while($stmt->fetch()){
         $id;
     }
     $stmt->close();
     return($id);
 }
function fetchStudent($id)
{
    if($id != NULL) {
        $data = $id;
    }
    
    global $mysqli,$db_table_prefix;
    $stmt = $mysqli->prepare("SELECT 
            user_name,
            display_name,
            password,
            email,
            gender,
            classification
            FROM ".$db_table_prefix."users
            WHERE
            id = ?");
    $stmt->bind_param("i",$data);
    
    $stmt->execute();
    $stmt->bind_result($user,$display,$password,$email,$gender,$classification);
    
    while($stmt->fetch()) {
        $row = array('user_name'=>$user,'display_name'=>$display,'password'=>$password,'email'=>$email,'gender'=>$gender,'classification'=>$classification);
    }
    
    $stmt->close();
    return($row);
}

//Functions that do not interact with DB
//------------------------------------------------------------------------------

//Retrieve a list of all .php files in models/languages
function getLanguageFiles()
{
	$directory = "models/languages/";
	$languages = glob($directory . "*.php");
	//print each file name
	return $languages;
}

//Retrieve a list of all .css files in models/site-templates 
function getTemplateFiles()
{
	$directory = "models/site-templates/";
	$languages = glob($directory . "*.css");
	//print each file name
	return $languages;
}

//Retrieve a list of all .php files in root files folder
function getPageFiles()
{
	$directory = "";
	$pages = glob($directory . "*.php");
	//print each file name
	foreach ($pages as $page){
		$row[$page] = $page;
	}
	return $row;
}

//Destroys a session as part of logout
function destroySession($name)
{
	if(isset($_SESSION[$name]))
	{
		$_SESSION[$name] = NULL;
		unset($_SESSION[$name]);
	}
}

//Generate a unique code
function getUniqueCode($length = "")
{	
	$code = md5(uniqid(rand(), true));
	if ($length != "") return substr($code, 0, $length);
	else return $code;
}

//Generate an activation key
function generateActivationToken($gen = null)
{
	do
	{
		$gen = md5(uniqid(mt_rand(), false));
	}
	while(validateActivationToken($gen));
	return $gen;
}

//@ Thanks to - http://phpsec.org
function generateHash($plainText, $salt = null)
{
	if ($salt === null)
	{
		$salt = substr(md5(uniqid(rand(), true)), 0, 25);
	}
	else
	{
		$salt = substr($salt, 0, 25);
	}
	
	return $salt . sha1($salt . $plainText);
}

//Checks if an email is valid
function isValidEmail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	}
	else {
		return false;
	}
}

//Inputs language strings from selected language.
function lang($key,$markers = NULL)
{
	global $lang;
	if($markers == NULL)
	{
		$str = $lang[$key];
	}
	else
	{
		//Replace any dyamic markers
		$str = $lang[$key];
		$iteration = 1;
		foreach($markers as $marker)
		{
			$str = str_replace("%m".$iteration."%",$marker,$str);
			$iteration++;
		}
	}
	//Ensure we have something to return
	if($str == "")
	{
		return ("No language key found");
	}
	else
	{
		return $str;
	}
}

//Checks if a string is within a min and max length
function minMaxRange($min, $max, $what)
{
	if(strlen(trim($what)) < $min)
		return true;
	else if(strlen(trim($what)) > $max)
		return true;
	else
	return false;
}

//Replaces hooks with specified text
function replaceDefaultHook($str)
{
	global $default_hooks,$default_replace;	
	return (str_replace($default_hooks,$default_replace,$str));
}

//Displays error and success messages
function resultBlock($errors,$successes){
	//Error block
	if(count($errors) > 0)
	{
		echo "<div id='error'>
		<a href='#' onclick=\"showHide('error');\">[X]</a>
		<ul>";
		foreach($errors as $error)
		{
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
	//Success block
	if(count($successes) > 0)
	{
		echo "<div id='success'>
		<a href='#' onclick=\"showHide('success');\">[X]</a>
		<ul>";
		foreach($successes as $success)
		{
			echo "<li>".$success."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}

//Completely sanitizes text
function sanitize($str)
{
	return strtolower(strip_tags(trim(($str))));
}

//Functions that interact mainly with .users table
//------------------------------------------------------------------------------

//Delete a defined array of users
function deleteUsers($users) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."users 
		WHERE id = ?");
	$stmt2 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."user_permission_matches 
		WHERE user_id = ?");
	foreach($users as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
		$i++;
	}
	$stmt->close();
	$stmt2->close();
	return $i;
}

//Check if a display name exists in the DB
function displayNameExists($displayname)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		display_name = ?
		LIMIT 1");
	$stmt->bind_param("s", $displayname);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if an email exists in the DB
function emailExists($email)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		email = ?
		LIMIT 1");
	$stmt->bind_param("s", $email);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if a user name and email belong to the same user
function emailUsernameLinked($email,$username)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE user_name = ?
		AND
		email = ?
		LIMIT 1
		");
	$stmt->bind_param("ss", $username, $email);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Retrieve information for all users
function fetchAllUsers()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		user_name,
		display_name,
		password,
		email,
		activation_token,
		last_activation_request,
		lost_password_request,
		active,
		title,
		sign_up_stamp,
		last_sign_in_stamp
		FROM ".$db_table_prefix."users");
	$stmt->execute();
	$stmt->bind_result($id, $user, $display, $password, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn);
	
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'user_name' => $user, 'display_name' => $display, 'password' => $password, 'email' => $email, 'activation_token' => $token, 'last_activation_request' => $activationRequest, 'lost_password_request' => $passwordRequest, 'active' => $active, 'title' => $title, 'sign_up_stamp' => $signUp, 'last_sign_in_stamp' => $signIn);
	}
	$stmt->close();
	return ($row);
}

//Retrieve complete user information by username, token or ID
function fetchUserDetails($username=NULL,$token=NULL, $id=NULL)
{
	if($username!=NULL) {
		$column = "user_name";
		$data = $username;
	}
	elseif($token!=NULL) {
		$column = "activation_token";
		$data = $token;
	}
	elseif($id!=NULL) {
		$column = "id";
		$data = $id;
	}
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		user_name,
		display_name,
		password,
		email,
		activation_token,
		last_activation_request,
		lost_password_request,
		active,
		title,
		sign_up_stamp,
		last_sign_in_stamp,
                gender,
                classification,
                type,
                address,
                city,
                state,
                zipcode
		FROM ".$db_table_prefix."users
		WHERE
		$column = ?
		LIMIT 1");
		$stmt->bind_param("s", $data);
	
	$stmt->execute();
	$stmt->bind_result($id, $user, $display, $password, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn, $gender, $classification, $type, $address, $city, $state, $zipcode);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'user_name' => $user, 'display_name' => $display, 'password' => $password, 'email' => $email, 'activation_token' => $token, 'last_activation_request' => $activationRequest, 'lost_password_request' => $passwordRequest, 'active' => $active, 'title' => $title, 'sign_up_stamp' => $signUp, 'last_sign_in_stamp' => $signIn, 'gender' =>$gender, 'classification' => $classification, 'type' => $type, 'address' => $address, 'city' => $city, 'state' => $state, 'zipcode' => $zipcode);
	}
	$stmt->close();
	return ($row);
}

//Toggle if lost password request flag on or off
function flagLostPasswordRequest($username,$value)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET lost_password_request = ?
		WHERE
		user_name = ?
		LIMIT 1
		");
	$stmt->bind_param("ss", $value, $username);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}

//Check if a user is logged in
function isUserLoggedIn()
{
	global $loggedInUser,$mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT 
		id,
		password
		FROM ".$db_table_prefix."users
		WHERE
		id = ?
		AND 
		password = ? 
		AND
		active = 1
		LIMIT 1");
	$stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if($loggedInUser == NULL)
	{
		return false;
	}
	else
	{
		if ($num_returns > 0)
		{
			return true;
		}
		else
		{
			destroySession("userCakeUser");
			return false;	
		}
	}
}

//Change a user from inactive to active
function setUserActive($token)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET active = 1
		WHERE
		activation_token = ?
		LIMIT 1");
	$stmt->bind_param("s", $token);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Change a user's display name
function updateDisplayName($id, $display)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET display_name = ?
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("si", $display, $id);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}

//Update a user's email
function updateEmail($id, $email)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET 
		email = ?
		WHERE
		id = ?");
	$stmt->bind_param("si", $email, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Input new activation token, and update the time of the most recent activation request
function updateLastActivationRequest($new_activation_token,$username,$email)
{
	global $mysqli,$db_table_prefix; 	
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET activation_token = ?,
		last_activation_request = ?
		WHERE email = ?
		AND
		user_name = ?");
	$stmt->bind_param("ssss", $new_activation_token, time(), $email, $username);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Generate a random password, and new token
function updatePasswordFromToken($pass,$token)
{
	global $mysqli,$db_table_prefix;
	$new_activation_token = generateActivationToken();
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET password = ?,
		activation_token = ?
		WHERE
		activation_token = ?");
	$stmt->bind_param("sss", $pass, $new_activation_token, $token);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Update a user's title
function updateTitle($id, $title)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET 
		title = ?
		WHERE
		id = ?");
	$stmt->bind_param("si", $title, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;	
}

//Check if a user ID exists in the DB
function userIdExists($id)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Checks if a username exists in the DB
function usernameExists($username)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		user_name = ?
		LIMIT 1");
	$stmt->bind_param("s", $username);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if activation token exists in DB
function validateActivationToken($token,$lostpass=NULL)
{
	global $mysqli,$db_table_prefix;
	if($lostpass == NULL) 
	{	
		$stmt = $mysqli->prepare("SELECT active
			FROM ".$db_table_prefix."users
			WHERE active = 0
			AND
			activation_token = ?
			LIMIT 1");
	}
	else 
	{
		$stmt = $mysqli->prepare("SELECT active
			FROM ".$db_table_prefix."users
			WHERE active = 1
			AND
			activation_token = ?
			AND
			lost_password_request = 1 
			LIMIT 1");
	}
	$stmt->bind_param("s", $token);
	$stmt->execute();
	$stmt->store_result();
		$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Functions that interact mainly with .permissions table
//------------------------------------------------------------------------------

//Create a permission level in DB
function createPermission($permission) {
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."permissions (
		name
		)
		VALUES (
		?
		)");
	$stmt->bind_param("s", $permission);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Delete a permission level from the DB
function deletePermission($permission) {
	global $mysqli,$db_table_prefix,$errors; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permissions 
		WHERE id = ?");
	$stmt2 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."user_permission_matches 
		WHERE permission_id = ?");
	$stmt3 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permission_page_matches 
		WHERE permission_id = ?");
	foreach($permission as $id){
		if ($id == 1){
			$errors[] = lang("CANNOT_DELETE_NEWUSERS");
		}
		elseif ($id == 2){
			$errors[] = lang("CANNOT_DELETE_ADMIN");
		}
		else{
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt2->bind_param("i", $id);
			$stmt2->execute();
			$stmt3->bind_param("i", $id);
			$stmt3->execute();
			$i++;
		}
	}
	$stmt->close();
	$stmt2->close();
	$stmt3->close();
	return $i;
}

//Retrieve information for all permission levels
function fetchAllPermissions()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		name
		FROM ".$db_table_prefix."permissions");
	$stmt->execute();
	$stmt->bind_result($id, $name);
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'name' => $name);
	}
	$stmt->close();
	return ($row);
}

//Retrieve information for a single permission level
function fetchPermissionDetails($id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		name
		FROM ".$db_table_prefix."permissions
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->bind_result($id, $name);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'name' => $name);
	}
	$stmt->close();
	return ($row);
}

//Check if a permission level ID exists in the DB
function permissionIdExists($id)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT id
		FROM ".$db_table_prefix."permissions
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if a permission level name exists in the DB
function permissionNameExists($permission)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT id
		FROM ".$db_table_prefix."permissions
		WHERE
		name = ?
		LIMIT 1");
	$stmt->bind_param("s", $permission);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Change a permission level's name
function updatePermissionName($id, $name)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."permissions
		SET name = ?
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("si", $name, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;	
}

//Functions that interact mainly with .user_permission_matches table
//------------------------------------------------------------------------------

//Match permission level(s) with user(s)
function addPermission($permission, $user) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."user_permission_matches (
		permission_id,
		user_id
		)
		VALUES (
		?,
		?
		)");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $user);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($user)){
		foreach($user as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Retrieve information for all user/permission level matches
function fetchAllMatches()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		user_id,
		permission_id
		FROM ".$db_table_prefix."user_permission_matches");
	$stmt->execute();
	$stmt->bind_result($id, $user, $permission);
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'user_id' => $user, 'permission_id' => $permission);
	}
	$stmt->close();
	return ($row);	
}

//Retrieve list of permission levels a user has
function fetchUserPermissions($user_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT
		id,
		permission_id
		FROM ".$db_table_prefix."user_permission_matches
		WHERE user_id = ?
		");
	$stmt->bind_param("i", $user_id);	
	$stmt->execute();
	$stmt->bind_result($id, $permission);
	while ($stmt->fetch()){
		$row[$permission] = array('id' => $id, 'permission_id' => $permission);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Retrieve list of users who have a permission level
function fetchPermissionUsers($permission_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT id, user_id
		FROM ".$db_table_prefix."user_permission_matches
		WHERE permission_id = ?
		");
	$stmt->bind_param("i", $permission_id);	
	$stmt->execute();
	$stmt->bind_result($id, $user);
	while ($stmt->fetch()){
		$row[$user] = array('id' => $id, 'user_id' => $user);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Unmatch permission level(s) from user(s)
function removePermission($permission, $user) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."user_permission_matches 
		WHERE permission_id = ?
		AND user_id =?");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $user);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($user)){
		foreach($user as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Functions that interact mainly with .configuration table
//------------------------------------------------------------------------------

//Update configuration table
function updateConfig($id, $value)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."configuration
		SET 
		value = ?
		WHERE
		id = ?");
	foreach ($id as $cfg){
		$stmt->bind_param("si", $value[$cfg], $cfg);
		$stmt->execute();
	}
	$stmt->close();	
}

//Functions that interact mainly with .pages table
//------------------------------------------------------------------------------

//Add a page to the DB
function createPages($pages) {
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."pages (
		page
		)
		VALUES (
		?
		)");
	foreach($pages as $page){
		$stmt->bind_param("s", $page);
		$stmt->execute();
	}
	$stmt->close();
}

//Delete a page from the DB
function deletePages($pages) {
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."pages 
		WHERE id = ?");
	$stmt2 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permission_page_matches 
		WHERE page_id = ?");
	foreach($pages as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
	}
	$stmt->close();
	$stmt2->close();
}

//Fetch information on all pages
function fetchAllPages()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		page,
		private
		FROM ".$db_table_prefix."pages");
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$row[$page] = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Fetch information for a specific page
function fetchPageDetails($id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		page,
		private
		FROM ".$db_table_prefix."pages
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	return ($row);
}

//Check if a page ID exists
function pageIdExists($id)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT private
		FROM ".$db_table_prefix."pages
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();	
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Toggle private/public setting of a page
function updatePrivate($id, $private)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."pages
		SET 
		private = ?
		WHERE
		id = ?");
	$stmt->bind_param("ii", $private, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;	
}

//Functions that interact mainly with .permission_page_matches table
//------------------------------------------------------------------------------

//Match permission level(s) with page(s)
function addPage($page, $permission) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."permission_page_matches (
		permission_id,
		page_id
		)
		VALUES (
		?,
		?
		)");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $page);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($page)){
		foreach($page as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $page);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Retrieve list of permission levels that can access a page
function fetchPagePermissions($page_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT
		id,
		permission_id
		FROM ".$db_table_prefix."permission_page_matches
		WHERE page_id = ?
		");
	$stmt->bind_param("i", $page_id);	
	$stmt->execute();
	$stmt->bind_result($id, $permission);
	while ($stmt->fetch()){
		$row[$permission] = array('id' => $id, 'permission_id' => $permission);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Retrieve list of pages that a permission level can access
function fetchPermissionPages($permission_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT
		id,
		page_id
		FROM ".$db_table_prefix."permission_page_matches
		WHERE permission_id = ?
		");
	$stmt->bind_param("i", $permission_id);	
	$stmt->execute();
	$stmt->bind_result($id, $page);
	while ($stmt->fetch()){
		$row[$page] = array('id' => $id, 'permission_id' => $page);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Unmatched permission and page
function removePage($page, $permission) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permission_page_matches 
		WHERE page_id = ?
		AND permission_id =?");
	if (is_array($page)){
		foreach($page as $id){
			$stmt->bind_param("ii", $id, $permission);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $page, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Check if a user has access to a page
function securePage($uri){
	
	//Separate document name from uri
	$tokens = explode('/', $uri);
	$page = $tokens[sizeof($tokens)-1];
	global $mysqli,$db_table_prefix,$loggedInUser;
	//retrieve page details
	$stmt = $mysqli->prepare("SELECT 
		id,
		page,
		private
		FROM ".$db_table_prefix."pages
		WHERE
		page = ?
		LIMIT 1");
	$stmt->bind_param("s", $page);
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$pageDetails = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	//If page does not exist in DB, allow access
	if (empty($pageDetails)){
		return true;
	}
	//If page is public, allow access
	elseif ($pageDetails['private'] == 0) {
		return true;	
	}
	//If user is not logged in, deny access
	elseif(!isUserLoggedIn()) 
	{
		header("Location: login.php");
		return false;
	}
	else {
		//Retrieve list of permission levels with access to page
		$stmt = $mysqli->prepare("SELECT
			permission_id
			FROM ".$db_table_prefix."permission_page_matches
			WHERE page_id = ?
			");
		$stmt->bind_param("i", $pageDetails['id']);	
		$stmt->execute();
		$stmt->bind_result($permission);
		while ($stmt->fetch()){
			$pagePermissions[] = $permission;
		}
		$stmt->close();
		//Check if user's permission levels allow access to page
		if ($loggedInUser->checkPermission($pagePermissions)){ 
			return true;
		}
		//Grant access if master user
		elseif ($loggedInUser->user_id == $master_account){
			return true;
		}
		else {
			header("Location: account.php");
			return false;	
		}
	}
}

?>
