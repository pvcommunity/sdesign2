<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forms posted
if(!empty($_POST))
{
	$deletions = $_POST['delete'];
	if ($deletion_count = deleteUsers($deletions)){
		$successes[] = lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
	}
	else {
		$errors[] = lang("SQL_ERROR");
	}
}

$userData = fetchAllUsers(); //Fetch information for all users

echo "
<!DOCTYPE html>
<html lang='en-US'>
<head>

<title>PV Student Community</title>
<style type='text/css'>
body{

background-image:url('resources/images/bg4.jpg') ;
background-repeat:repeat;
background-color:#40113f;
font-family:'lucida sans unicode';
font-size:11px;
line-height:16px;
text-align:justify;
}

#container{
position:absolute;
left:50%;
margin-left:-392px;
top:0px;
width:775px;
height:625px;
background-image:url('resources/images/white.jpg');
background-repeat:repeat;

}

.header{
margin-top:40px;
text-align:center;
}

.navigation{
width:690px;
padding:5px;
margin-left:40px;
margin-top:40px;
margin-bottom:20px;
text-align:center;

}

.title{
font-family:'century gothic';
font-size:23px;
font-weight:bold;
color:#40113f;
display:block;
text-align:left;
margin-left:140px;
margin-top:5px;}

.sidebar{
float:left;
margin-left:40px;
width:200px;
}

.main{
float:right;
margin-right:50px;
_margin-right:30px;
width:460px;
}

a.nav, a.nav:active, a.nav:visited, a.nav:link{
color:#40113f;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:12px;
padding-right:30px;
}

a.nav:hover{
color:#785343;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:12px;
padding-right:30px;
}

a.nav2, a.nav2:active, a.nav2:visited, a.nav2:link{
color:#40113f;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:12px;
}

a.nav2:hover{
color:#785343;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:12px;
}

a, a:active, a:visited, a:link{
color:#dfc326;
text-decoration:none;
}

a:hover{
color:#dfc326;
text-decoration:none;
}

b, strong{
color:#dfc326;
text-decoration:none;
font-family:'century gothic';
font-size:25px;
}

i, em{
color:#dfc326;
}

u{
border-bottom:1px dotted #dfc326;
text-decoration:none;
}


h1{
font-family:'century gothic';
font-size:22px;
text-align:left;
letter-spacing:0px;
color:#40113f;
border-bottom:2px dotted #dfc326;
padding-top:10px;
margin-bottom:5px;
padding-bottom:4px;
}

</style>
</head>

<body>

<div id='container'>

<div class='header'>
<img src='resources/images/profile.jpg'> 
</div>

<div class='navigation'>
<a class='nav' href='account.php'>Account Home</a>
<a class='nav' href='user_settings.php'>User Settings</a>
<a class='nav' href='admin_permissions.php'>Admin Permissions</a>
<a class='nav' href='admin_configuration.php'>Admin Config</a>
<a class='nav' href='admin_pages.php'>Admin Pages</a>
<a class='nav' href='logout.php'>Logout</a>
<br>
<br>
";





echo resultBlock($errors,$successes);

echo "
<form name='adminUsers' action='".$_SERVER['PHP_SELF']."' method='post'>
<table class='admin'>
<tr>
<th>Delete</th><th>Username</th><th>Display Name</th><th>Title</th><th>Last Sign In</th>
</tr>";

//Cycle through users
foreach ($userData as $v1) {
	echo "
	<tr>
	<td><input type='checkbox' name='delete[".$v1['id']."]' id='delete[".$v1['id']."]' value='".$v1['id']."'></td>
	<td><a href='admin_user.php?id=".$v1['id']."'>".$v1['user_name']."</a></td>
	<td>".$v1['display_name']."</td>
	<td>".$v1['title']."</td>
	<td>
	";
	
	//Interprety last login
	if ($v1['last_sign_in_stamp'] == '0'){
		echo "Never";	
	}
	else {
		echo date("j M, Y", $v1['last_sign_in_stamp']);
	}
	echo "
	</td>
	</tr>";
}

echo "
</table>
<input type='submit' name='Submit' value='Delete' />
</form>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
