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
	$email = trim($_POST["o-email"]);
	$displayname = trim($_POST["p-name"]);
        $username = strtolower(str_replace(" ","-",$displayname));
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$captcha = md5($_POST["captcha"]);
        $o_fname = trim($_POST["o-fname"]);
        $o_lname = trim($_POST["o-lname"]);
        $o_name = $o_fname." ".$o_lname;
        $type = trim($_POST["p-type"]);
        $addr1 = $_POST["addr1"];
        $addr2 = $_POST["addr2"];
        $address = $addr1."\n".$addr2;
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zipcode = $_POST["zipcode"];
        
        $weekday_open = $_POST["businesshours1_open"];
        $weekday_close = $_POST["businesshours1_close"];
        $weekday_hours = $weekday_open."am-".$weekday_close."pm";
        $weekend_open = $_POST["businesshours2_open"];
        $weekend_close = $_POST["businesshours2_open"];
	$weekend_hours = $weekend_open."am-".$weekend_close."pm";
        
        $contact_num1 = $_POST["contactnum"];
        $contact_num2 = $_POST["contactnum2"];
        $contact_num3 = $_POST["contactnum3"];
        $contactnum = "(".$contact_num1.")".$contact_num2."-".$contact_num3;
	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
	
	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	/*if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}*/
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$user = new Property($username,$displayname,$password,$email,$type,$address,$city,$state,$zipcode,$o_name,$contactnum,$weekday_hours,$weekend_hours);
		
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

echo "
<title>Register</title>
<link rel='stylesheet' type='text/css' href='resources/css/Registration (2).css'> 
<link rel='stylesheet' type='text/css' href='resources/css/Notifications.css'>
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
            <!--<div class='col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4'>-->
                <div class='panel panel-default' style='width:350px;'>
                    <div class='panel-heading'>
                        <h3 class='panel-title text-center'>Submit Registration Request</h3>
                    </div>
                     <div class='panel-body'>
                            <div class='form-group'>";

echo resultBlock($errors,$successes);

echo "
<br>
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<p>
<label>Owner's First Name:</label>
<input type='text' name='o-fname' class='form-control input-sm' required/>
</p>
<p>
<label>Owner's Last Name:</label>
<input type='text' name='o-lname' class='form-control input-sm' required/>
</p>
<p>
<label>Contact Email:</label>
<input type='email' name='o-email' class='form-control input-sm' required/>
</p>

<!--<p>
<label>User Name:</label>
<input type='text' name='username' />
</p>-->
<p>
<label>Property Name:</label>
<input type='text' name='p-name' class='form-control input-sm' required/>
</p>
<p>
<label>Type of Property:</label>
<select name='p-type' class='form-control input-sm' required>
    <option value=''>Please Select a Type</option>
    <option value='apartment'>Apartment</option>
    <option value='condo'>Condo</option>
    <option value='house'>House</option>
    <option value='townhome'>Townhome</option>
</select>
</p>

<!--<p>
<label>Submitter's Name:</label>
<input type='text' name='emp-name' />
</p>-->
<p>
<label>Address Line 1:</label>
<input type='text' name='addr1' class='form-control input-sm' required/>
</p>
<p>
<label>Address Line 2:</label>
<input type-'text' name='addr2' class='form-control input-sm'/>
</p>
<div style='float:left;width:60%;'>
<p>
<label>City:</label>
<input type='text' name='city' class='form-control input-sm' required/>
</p></div>
<div style='float:right;width:25%'>
<p>
<label>State:</label>
<input type='text' name='state' class='form-control input-sm' maxlength='2' required/>
</p></div>
<p>
<label>Zipcode:</label>
<input type='number' name='zipcode' class='form-control input-sm' maxlength='5' required/>
</p>
<p>
<label>Business Weekly Hours:</label>
<div style='float:left;width:40%;'>
<input type='businesshours1' name='businesshours1_open' class='form-control input-sm' placeholder='am' maxlength='5' required/>
</div> to
<div style='float:right;width:40%'>
<input type='businesshours1' name='businesshours1_close' class='form-control input-sm' placeholder='pm' maxlength='5' required/>
</div>
</p>
<p>
<label>Business Weekend Hours:</label>
<div style='float:left;width:40%;'>
<input type='businesshours2' name='businesshours2_open' class='form-control input-sm' placeholder='am' maxlength='5' required/>
</div> to
<div style='float:right;width:40%'>
<input type='businesshours2' name='businesshours2_close' class='form-control input-sm' placeholder='pm' maxlength='5' required/>
</div>
</p>
<p>
<label>Contact Number:</label><br>
<div style='float:left;width:50px'>
<input type='contactnum1' name='contactnum' maxlength='3' class='form-control input-med' required/> 	
</div>
<div style='float:left;width:50px'>
<input type='contactnum2' name='contactnum2' maxlength='3' class='form-control input-med' required/>
</div>
<div style='float:left;width:100px'>
<input type='contactnum3' name='contactnum3' maxlength='4' class='form-control input-med' required/>
</div>
</p>
<br/><br/><br/>
<label>Password:</label>
<input type='password' name='password' class='form-control input-sm' required/>
</p>
<p>
<label>Confirm:</label>
<input type='password' name='passwordc' class='form-control input-sm' required/>
</p>
<br>
<p>
<label>Security Code:</label>
<img src='models/captcha.php'>
</p>
<label>Enter Security Code:</label>
<input name='captcha' type='text'class='form-control input-sm' required>
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
