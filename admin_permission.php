<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$permissionId = $_GET['id'];

//Check if selected permission level exists
if(!permissionIdExists($permissionId)){
	header("Location: admin_permissions.php"); die();	
}

$permissionDetails = fetchPermissionDetails($permissionId); //Fetch information specific to permission level

//Forms posted
if(!empty($_POST)){
	
	//Delete selected permission level
	if(!empty($_POST['delete'])){
		$deletions = $_POST['delete'];
		if ($deletion_count = deletePermission($deletions)){
		$successes[] = lang("PERMISSION_DELETIONS_SUCCESSFUL", array($deletion_count));
		}
		else {
			$errors[] = lang("SQL_ERROR");	
		}
	}
	else
	{
		//Update permission level name
		if($permissionDetails['name'] != $_POST['name']) {
			$permission = trim($_POST['name']);
			
			//Validate new name
			if (permissionNameExists($permission)){
				$errors[] = lang("ACCOUNT_PERMISSIONNAME_IN_USE", array($permission));
			}
			elseif (minMaxRange(1, 50, $permission)){
				$errors[] = lang("ACCOUNT_PERMISSION_CHAR_LIMIT", array(1, 50));	
			}
			else {
				if (updatePermissionName($permissionId, $permission)){
					$successes[] = lang("PERMISSION_NAME_UPDATE", array($permission));
				}
				else {
					$errors[] = lang("SQL_ERROR");
				}
			}
		}
		
		//Remove access to pages
		if(!empty($_POST['removePermission'])){
			$remove = $_POST['removePermission'];
			if ($deletion_count = removePermission($permissionId, $remove)) {
				$successes[] = lang("PERMISSION_REMOVE_USERS", array($deletion_count));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		
		//Add access to pages
		if(!empty($_POST['addPermission'])){
			$add = $_POST['addPermission'];
			if ($addition_count = addPermission($permissionId, $add)) {
				$successes[] = lang("PERMISSION_ADD_USERS", array($addition_count));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		
		//Remove access to pages
		if(!empty($_POST['removePage'])){
			$remove = $_POST['removePage'];
			if ($deletion_count = removePage($remove, $permissionId)) {
				$successes[] = lang("PERMISSION_REMOVE_PAGES", array($deletion_count));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
		
		//Add access to pages
		if(!empty($_POST['addPage'])){
			$add = $_POST['addPage'];
			if ($addition_count = addPage($add, $permissionId)) {
				$successes[] = lang("PERMISSION_ADD_PAGES", array($addition_count));
			}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
			$permissionDetails = fetchPermissionDetails($permissionId);
	}
}

$pagePermissions = fetchPermissionPages($permissionId); //Retrieve list of accessible pages
$permissionUsers = fetchPermissionUsers($permissionId); //Retrieve list of users with membership
$userData = fetchAllUsers(); //Fetch all users
$pageData = fetchAllPages(); //Fetch all pages

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
height:1100px;
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
<center><h1>Administration Permissions</h1></center>
<div class='navigation'>
<a class='nav' href='account.php'>Account Home</a>
<a class='nav' href='user_settings.php'>User Settings</a>
<a class='nav' href='admin_users.php'>Admin Users</a>
<a class='nav' href='admin_configuration.php'>Admin Config</a>
<a class='nav' href='admin_pages.php'>Admin Pages</a>
<a class='nav' href='logout.php'>Logout</a>
<br>
<br>
";





echo resultBlock($errors,$successes);

echo "
<center>
<form name='adminPermission' action='".$_SERVER['PHP_SELF']."?id=".$permissionId."' method='post'>
<table class='admin'>
<tr><td>
<h3>Permission Information</h3>
<div id='regbox'>
<p>
<label>ID:</label>
".$permissionDetails['id']."
</p>
<p>
<label>Name:</label>
<input type='text' name='name' value='".$permissionDetails['name']."' />
</p>
<label>Delete:</label>
<input type='checkbox' name='delete[".$permissionDetails['id']."]' id='delete[".$permissionDetails['id']."]' value='".$permissionDetails['id']."'>
</p>
</div></td><td>
<h3>Permission Membership</h3>
<div id='regbox'>
<p>
Remove Members:";

//List users with permission level
foreach ($userData as $v1) {
	if(isset($permissionUsers[$v1['id']])){
		echo "<br><input type='checkbox' name='removePermission[".$v1['id']."]' id='removePermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['display_name'];
	}
}

echo"
</p><p>Add Members:";

//List users without permission level
foreach ($userData as $v1) {
	if(!isset($permissionUsers[$v1['id']])){
		echo "<br><input type='checkbox' name='addPermission[".$v1['id']."]' id='addPermission[".$v1['id']."]' value='".$v1['id']."'> ".$v1['display_name'];
	}
}

echo"
</p>
</div>
</td>
<td>
<h3>Permission Access</h3>
<div id='regbox'>
<p>
Public Access:";

//List public pages
foreach ($pageData as $v1) {
	if($v1['private'] != 1){
		echo "<br>".$v1['page'];
	}
}

echo"
</p>
<p>
Remove Access:";

//List pages accessible to permission level
foreach ($pageData as $v1) {
	if(isset($pagePermissions[$v1['id']]) AND $v1['private'] == 1){
		echo "<br><input type='checkbox' name='removePage[".$v1['id']."]' id='removePage[".$v1['id']."]' value='".$v1['id']."'> ".$v1['page'];
	}
}

echo"
</p><p>Add Access:";

//List pages inaccessible to permission level
foreach ($pageData as $v1) {
	if(!isset($pagePermissions[$v1['id']]) AND $v1['private'] == 1){
		echo "<br><input type='checkbox' name='addPage[".$v1['id']."]' id='addPage[".$v1['id']."]' value='".$v1['id']."'> ".$v1['page'];
	}
}

echo"
</p>
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
