<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}


//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) { 
    
    $title = check_user($loggedInUser->username);
    $id = fetchUserId($loggedInUser->username);
    
    switch($title){
        case "Administrator": header("location: account.php?id=".$id.""); break;
        case "Student": header("location: student.php?id=".$id.""); break;
        case "Property": header("location: landlord.php?id=".$id.""); break;
    }
    die(); 
}

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$username = sanitize(trim($_POST["username"]));
	$password = trim($_POST["password"]);
	
	//Perform some validation
	//Feel free to edit / change as required
	if($username == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
	}
	if($password == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}

	if(count($errors) == 0)
	{
		//A security note here, never tell the user which credential was incorrect
		if(!usernameExists($username))
		{
			$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
		}
		else
		{
			$userdetails = fetchUserDetails($username);
			//See if the user's account is activated
			if($userdetails["active"]==0)
			{
				$errors[] = lang("ACCOUNT_INACTIVE");
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["password"]);
				
				if($entered_pass != $userdetails["password"])
				{
					//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
					$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
				}
				else
				{
					//Passwords match! we're good to go'
					
					//Construct a new logged in user object
					//Transfer some db data to the session object
					$loggedInUser = new loggedInUser();
					//$loggedInUser->email = $userdetails["email"];
					$loggedInUser->user_id = $userdetails["id"];
					$loggedInUser->hash_pw = $userdetails["password"];
					$loggedInUser->title = $userdetails["title"];
					$loggedInUser->displayname = $userdetails["display_name"];
					$loggedInUser->username = $userdetails["user_name"];
					$loggedInUser->gender = $userdetails["gender"];
                                        $loggedInUser->classification = $userdetails["classification"];
                                        $loggedInUser->address = $userdetails["address"];
                                        $loggedInUser->city = $userdetails["city"];
                                        $loggedInUser->state = $userdetails["state"];
                                        $loggedInUser->zipcode = $userdetails["zipcode"];
					
					//Update last sign in
					$loggedInUser->updateLastSignIn();
					$_SESSION["userCakeUser"] = $loggedInUser;
					
					//Redirect to user account page
                                        if(isUserLoggedIn()) { 
                                            $title = check_user($username);
                                            $id = fetchUserId($username);
                                            
                                             switch($title){
                                                case "Administrator": header("location: account.php?id=".$id.""); break;
                                                case "Student": header("location: student.php?id=".$id.""); break;
                                                case "Property": header("location: landlord.php?id=".$id.""); break;
                                             }
                                             die(); 
                                        }
					
				}
			}
		}
	}
}

//require_once("models/header.php");
echo "
<title>Login</title>
<link rel='stylesheet' type='text/css' href='resources/css/Notifications.css'>
<style>
    body {
        background: #660066 url('resources/images/bg4.jpg') repeat;
    }
    </style>
";

echo "
<body>
<div id='wrapper'>
<p><a href='registration-select.php'>Register</a> | <a href='login.php'>Login</a></p>


<div id='logo'>

  
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center><h2>PV Student Community</h2></center> 

</div>

    <center><div id='main'>
        	</div>
        	<div id='menu'>
                
		<ul>
                        <li class ='last'><a href='index.php'>Home</a></li>
                        <li><a href='about.php'>About</a></li>
                        <li class ='last'><a href='faqs.php'>Question/Concerns</a></li>
		</ul>
	</div>


<div id='main'>";

echo "
<title>Login</title>
<link rel='stylesheet' type='text/css' href='resources/css/Login.css'</link>";

echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='login' action='".$_SERVER['PHP_SELF']."' method='post'>
<p>
<label>Username:</label>
<input type='text' name='username' placeholder='username' />
</p>
<p>
<label>Password:</label>
<input type='password' name='password' placeholder='password' />
</p>
<p>
<label>&nbsp;</label>
<input type='submit' value='Login' class='submit' />
</p>
</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
