<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn())
{   
    $title = check_user($loggedInUser->username);
    
    switch($title){
        case "Administrator": header("Location: account.php"); break;
        case "Student": header("Location: student.php"); break;
        case "Property": header("Location: landlord.php"); break;
    }
    die();
}

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$email = trim($_POST["email"]);
	list($username, $domain) = explode("@", $email);
	$check_email = strpos($email, "@student.pvamu.edu");
        $first_name = trim($_POST["firstname"]);
	$last_name = trim($_POST["lastname"]);
	$displayname = $first_name." ".$last_name;
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$captcha = md5($_POST["captcha"]);
        $classification =$_POST["classification"];
	$gender = $_POST["gender"];
	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
	if(minMaxRange(5,25,$username))
	{
		$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(5,25));
	}
	if($check_email === FALSE)
	{
		$errors[] = lang("ACCOUNT_STUDENT_INVALID_EMAIL");
	}
	/*if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}*/
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
		$user = new Student($username,$displayname,$password,$email,$gender,$classification);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			//if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
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

echo "
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
";

require 'models/site-templates/top.php';

echo"
    <div id='main'><center>
<div class='container' id='container1'>
        <div class='row centered-form'>
            <div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>
                <div class='panel panel-default' style='width:350px;'>
                    <div class='panel-heading'>
                        <h3 class='panel-title text-center'>Submit Registration Request</h3>
                    </div>
                     <div class='panel-body'>
                            <div class='form-group'>";


echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<p>
<label>First Name:</label>
<input type='text' name='firstname' class='form-control input-sm' required/>
</p>
<p>
<label>Last Name:</label>
<input type='text' name='lastname' class='form-control input-sm' required/>
</p>
<!--<p>
<label>User Name:</label>
<input type='text' name='username' />
</p>
<p>
<label>Display Name:</label>
<input type='text' name='displayname' />
</p>-->
<p>
<label>Gender:</label>
<select name='gender' class='form-control input-sm' required>
    <option value=''>Select a Gender</option>
   <option value='Female'>Female</option>
    <option value='Male'>Male</option>
</select>
</p>
<p>
<label>Classification:</label>
<select name='classification' class='form-control input-sm' required>
    <option value=''>Select a Classification</option>
    <option value='Freshman'>Freshman</option>
    <option value='Sophomore'>Sophomore</option>
    <option value='Junior'>Junior</option>
    <option value='Senior'>Senior</option>
    <option value='Grad Student'>Grad Student</option>
</select>
<p>
<p>
<label>Password:</label>
<input type='password' name='password' class='form-control input-sm' required/>
</p>
<p>
<label>Confirm:</label>
<input type='password' name='passwordc' class='form-control input-sm' required/>
</p>
<p>
<label>Email:</label>
<input type='text' name='email' class='form-control input-sm' required/>
</p>
<p>
<label>Security Code:</label>
<img src='models/captcha.php'>
</p>
<label>Enter Security Code:</label>
<input name='captcha' type='text' class='form-control input-sm' required>
</p>
<label>&nbsp;<br>
<input id='myBtn' type='submit' value='Submit'/>
</p>

</form>
</div>

</div>
<div id='bottom'></div>
</div>
</body>
</html>";
?>
