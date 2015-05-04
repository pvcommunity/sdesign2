<?php
require_once('models/config.php');
if (!securePage($_SERVER['PHP_SELF'])){die();}

$id = $_REQUEST["id"];

$personality = get_pers_for_profile($id);
$preferences = get_all_prefs($id);
$about_me = get_about_me($id);

echo"
<!DOCTYPE html>
<html lang='en-US'>
<head>

<title>Profile</title>
<style type='text/css'>
body{

background-image:url('resources/images/purple.jpg') ;
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
background-image:url('resources/images/white.jpg');
background-repeat:repeat;
overflow:auto;
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
font-size:17px;
padding-right:70px;
}

a.nav:hover{
color:#785343;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:17px;
padding-right:70px;
}

a.nav2, a.nav2:active, a.nav2:visited, a.nav2:link{
color:#40113f;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:17px;
}

a.nav2:hover{
color:#785343;
text-decoration:none;
font-family:'century gothic';
font-weight:bold;
font-size:17px;
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
font-size:11px;
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
<a class='nav' href='index.php'>Home</a>
<a class='nav' href='about.php'>About</a>
<a class='nav' href='suggested_users.php'>Suggested Users</a>
<a class='nav' href='faqs.php'>FAQs</a>
<a class='nav' href='logout-1.php'>Logout</a>

</div>

<div class='sidebar'>";

echo "

<h1>Hello <strong><big>$loggedInUser->displayname</big></strong></h1>
		<br>
		<img src='resources/images/blank_avatar.jpg'> 
		<br>                  
		<a href=#><small><u>edit picture</u></small></a>
		<br>
		Gender: $loggedInUser->gender
		<br>
		Classification: $loggedInUser->classification
		<br>
		Major: $about_me[0]
                <br>
		<i>$about_me[1]</i>
		<br>
		<a href=#><img src='resources/images/message.jpg' style='height:20px; width=30px'></a>       


<h1>Personality Type</h1>
<b>$personality</b>

</div>
<br><br>


<div class=main>
<h1>Preferences</h1>
<p>Social Habits: $preferences[0]</p>
<p>Sleep Habits: $preferences[1]</p>
<p>Cleaning Habits: $preferences[2]</p>
<br>
<p>Property Type: $preferences[3]</p>
<p>Rent Range: $preferences[4]</p>
<p>Number of Roommates: $preferences[5]</p>
<p>Smoking: $preferences[6]</p>
<br><br>


<h1>Suggested Roommates</h1>
*CALCULATED INFO*
<br><br>
<br><br>
<br><br>


<h1>Announcements</h1>
*EXTRACTED INFO FROM LANDLORDS PAGE*
<br>
Pictures with links for enlargement
<br><br>
<br><br>
<br><br>
<br><br>




</div>



 " ;
?>
</body>
</html>
</html>

