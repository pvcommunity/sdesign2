<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$pageId = $_GET['id'];

//Check if selected pages exist
if(!pageIdExists($pageId)){
	header("Location: admin_pages.php"); die();	
}

$pageDetails = fetchPageDetails($pageId); //Fetch information specific to page

//Forms posted
if(!empty($_POST)){
	$update = 0;
	
	if(!empty($_POST['private'])){ $private = $_POST['private']; }
	
	//Toggle private page setting
	if (isset($private) AND $private == 'Yes'){
		if ($pageDetails['private'] == 0){
			if (updatePrivate($pageId, 1)){
				$successes[] = lang("PAGE_PRIVATE_TOGGLED", array("private"));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
	}
	elseif ($pageDetails['private'] == 1){
		if (updatePrivate($pageId, 0)){
			$successes[] = lang("PAGE_PRIVATE_TOGGLED", array("public"));
		}
		else {
			$errors[] = lang("SQL_ERROR");	
		}
	}
	
	//Remove permission level(s) access to page
	if(!empty($_POST['removePermission'])){
		$remove = $_POST['removePermission'];
		if ($deletion_count = removePage($pageId, $remove)){
			$successes[] = lang("PAGE_ACCESS_REMOVED", array($deletion_count));
		}
		else {
			$errors[] = lang("SQL_ERROR");	
		}
		
	}
	
	//Add permission level(s) access to page
	if(!empty($_POST['addPermission'])){
		$add = $_POST['addPermission'];
		if ($addition_count = addPage($pageId, $add)){
			$successes[] = lang("PAGE_ACCESS_ADDED", array($addition_count));
		}
		else {
			$errors[] = lang("SQL_ERROR");	
		}
	}
	
	$pageDetails = fetchPageDetails($pageId);
}

$pagePermissions = fetchPagePermissions($pageId);
$permissionData = fetchAllPermissions();



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
height:1160px;
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
padding-right:15px;
}

a.nav:hover{
color:#785343;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:12px;
padding-right:15px;
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
text-align:center;
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
<br>
<center><h1>Administration Pages</h1></center>

<div class='navigation'>
<a class='nav' href='account.php'>Account Home</a>
<a class='nav' href='user_settings.php'>User Settings</a>
<a class='nav' href='admin_users.php'>Admin Users</a>
<a class='nav' href='admin_permissions.php'>Admin Permissions</a>
<a class='nav' href='admin_configuration.php'>Admin Config</a>
<a class='nav' href='admin_pages.php'>Admin Pages</a>
<a class='nav' href='logout.php'>Logout</a>
<br>
<br>

";

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<center>
<form name='adminPage' action='".$_SERVER['PHP_SELF']."?id=".$pageId."' method='post'>
<input type='hidden' name='process' value='1'>
<table class='admin'>
<tr><td>
<h3>Page Information</h3>
<div id='regbox'>
<p>
<label>ID:</label>
".$pageDetails['id']."
</p>
<p>
<label>Name:</label>
".$pageDetails['page']."
</p>
<p>
<label>Private:</label>";

//Display private checkbox
if ($pageDetails['private'] == 1){
	echo "<input type='checkbox' name='private' id='private' value='Yes' checked>";
}
else {
	echo "<input type='checkbox' name='private' id='private' value='Yes'>";	
}

echo "
</p>
</div></td><td>
<h3>Page Access</h3>
<div id='regbox'>
<p>
Remove Access:";

//Display list of permission levels with access
foreach ($permissionData as $v1) {
	if(isset($pagePermissions[$v1['id']])){
		echo "<br><input type='checkbox' name='removePermission[".$v1['id']."]' id='removePermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['name'];
	}
}

echo"
</p><p>Add Access:";

//Display list of permission levels without access
foreach ($permissionData as $v1) {
	if(!isset($pagePermissions[$v1['id']])){
		echo "<br><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['name'];
	}
}

echo"
</p>
</center>
</div>
</td>
</tr>
</table>
<p>
<label>&nbsp;</label>
<input type='submit' value='Update' class='submit' />
</p>
</form>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
