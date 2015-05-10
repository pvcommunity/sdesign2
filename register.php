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
        case "Administrator": header("Location: account.php?id=".$id.""); break;
        case "Student": header("Location: student.php?id=".$id.""); break;
        case "Property": header("Location: landlord.php?id=".$id.""); break;
    }
    die();
}

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["username"]);
	$displayname = trim($_POST["displayname"]);
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$captcha = md5($_POST["captcha"]);
	
	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
	if(minMaxRange(5,25,$username))
	{
		$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($username)){
		$errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
	}
	if(minMaxRange(5,25,$displayname))
	{
		$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(5,25));
	}
	if(!ctype_alnum($displayname)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
	}
	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$user = new User($username,$displayname,$password,$email);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			if(!$user->userCakeAddUser())
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	if(count($errors) == 0) {
		$successes[] = $user->success;
	}
}

/*require_once("models/header.php");
echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>UserCake</h1>
<h2>Register</h2>

<div id='left-nav'>";
include("left-nav.php");
echo "
</div>

<div id='main'>";*/
echo "
<head>
<title>Register</title>
<link rel='stylesheet' type='text/css' href='resources/css/Registration (2).css'>
<link rel='stylesheet' type='text/css' href='resources/css/AssembledStylesheet.css'>
<link rel='stylesheet' type='text/css' href='resources/css/Notifications.css'>
<script type='text/javascript' src='models/funcs.js'></script>

<style>
body {
    background: #660066 url('resources/images/bg4.jpg') repeat;
}
</style>
</head>
<body>

<div id='container'>

<div class='header'>
</div>
";

require 'models/site-templates/top.php';

echo"<br>
    <div id='main'><center>
<div class='container' id='container1'>
        <div class='row centered-form'>
            <div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>
                <div class='panel panel-default' style='width:350px;'>
                    <div class='panel-heading'>
                        <h3 class='panel-title text-center'>Admin Registration</h3>
                    </div>
                     <div class='panel-body'>
                            <div class='form-group'>";

echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<p>
<label>User Name:</label>
<input type='text' name='username' class='form-control input-sm' required />
</p>
<p>
<label>Display Name:</label>
<input type='text' name='displayname' class='form-control input-sm' required />
</p>
<p>
<label>Password:</label>
<input type='password' name='password' class='form-control input-sm' required />
</p>
<p>
<label>Confirm:</label>
<input type='password' name='passwordc' class='form-control input-sm' required />
</p>
<p>
<label>Email:</label>
<input type='text' name='email' class='form-control input-sm' required />
</p>
<p>
<label>Security Code:</label>
<img src='models/captcha.php'>
</p>
<label>Enter Security Code:</label>
<input name='captcha' type='text' class='form-control input-sm' required />
</p>
<label>&nbsp;<br>
<input type='submit' value='Register'/>
</p>

</form>
</div>

</div>
<div id='bottom'></div>
</div>
</body>
</html>";
?>
