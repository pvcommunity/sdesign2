<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$pages = getPageFiles(); //Retrieve list of pages in root usercake folder
$dbpages = fetchAllPages(); //Retrieve list of pages in pages table
$creations = array();
$deletions = array();

//Check if any pages exist which are not in DB
foreach ($pages as $page){
	if(!isset($dbpages[$page])){
		$creations[] = $page;	
	}
}

//Enter new pages in DB if found
if (count($creations) > 0) {
	createPages($creations)	;
}

if (count($dbpages) > 0){
	//Check if DB contains pages that don't exist
	foreach ($dbpages as $page){
		if(!isset($pages[$page['page']])){
			$deletions[] = $page['id'];	
		}
	}
}

//Delete pages from DB if not found
if (count($deletions) > 0) {
	deletePages($deletions);
}

//Update DB pages
$dbpages = fetchAllPages();



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
/*height:1160px;*/
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
<br>
<center><h1>Administration Pages</h1></center>

<div class='navigation'>
<a class='nav' href='account.php'>Account Home</a>
<a class='nav' href='user_settings.php'>User Settings</a>
<a class='nav' href='admin_users.php'>Admin Users</a>
<a class='nav' href='admin_permissions.php'>Admin Permissions</a>
<a class='nav' href='admin_configuration.php'>Admin Config</a>
<a class='nav' href='logout.php'>Logout</a>
<br>
<br>
";



echo "

<center>
<div id='main'>
<table class='admin'>

<tr><th>Id</th><th>Page</th><th>Access</th></tr>";

//Display list of pages
foreach ($dbpages as $page){
	echo "
	<tr>
	<td>
	".$page['id']."
	</td>
	<td>
	<a href ='admin_page.php?id=".$page['id']."'>".$page['page']."</a>
	</td>
	<td>";
	
	//Show public/private setting of page
	if($page['private'] == 0){
		echo "Public";
	}
	else {
		echo "Private";	
	}
	
	echo "
	</td>
	</tr>";
}

echo "
</table>
</center>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";

?>
