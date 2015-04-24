<!DOCTYPE html>
<html lang='en-US'>
<head>

<title>PV Student Community</title>
<style type="text/css">
body{

background-image:url('resources/images/purple.jpg') ;
background-repeat:repeat;
background-color:#40113f;
font-family:"lucida sans unicode";
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
background-image:url('resources/images/36366ac.png');
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
font-family:"century gothic";
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
font-family:"century gothic";
font-weight:bold;
font-size:17px;
padding-right:70px;
}

a.nav:hover{
color:#785343;
text-decoration:none;
font-family:"century gothic";
font-weight:bold;
font-size:17px;
padding-right:70px;
}

a.nav2, a.nav2:active, a.nav2:visited, a.nav2:link{
color:#40113f;
text-decoration:none;
font-family:"century gothic";
font-weight:bold;
font-size:17px;
}

a.nav2:hover{
color:#785343;
text-decoration:none;
font-family:"century gothic";
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
font-family:"century gothic";
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
font-family:"century gothic";
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

<div id="container">

<div class="header">
<img src='resources/images/profile.jpg'> 
</div>

<div class="navigation">
<a class="nav" href="index.php">Home</a>
<a class="nav" href="about.php">About</a>
<a class="nav" href="suggested_users.php">Suggested Users</a>
<a class="nav" href="faqs.php">FAQs</a>

</div>

<div class="sidebar">




<?php
require_once('models/config.php');
if (!securePage($_SERVER['PHP_SELF'])){die();}
echo "

<h1>Hello<strong><big>$loggedInUser->displayname</big></strong></h1>
		<br>
		<img src='styles/images/blank_avatar.jpg'> 
		<br>                  
		<a href=#><small><u>edit picture</u></small></a>
		<br>
		Gender: $loggedInUser->gender
		<br>
		Classification: $loggedInUser->classification
		<br>
		Major:
		<br>
		<i>'self statement'</i>
		<br>
		<a href=#><img src='styles/images/message.jpg' style='height:20px; width=30px'></a>       


<h1>Personality Type</h1>
*EXTRACTED INFORMATION*
</div>
<br><br>


<div class=main>
<h1>Preferences</h1>
*EXTRACTED INFORMATION*
<br><br>
<br><br>
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

<?php
/*require_once('models/config.php');
if (!securePage($_SERVER['PHP_SELF'])){die();}


echo "   
<!DOCTYPE html>
<html lang='en-US'>
<head>

<title>PV Student Community</title>
<style type='text/css'>
body{
background-image:url(https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSvqrtMblxZERcRiBWfH8v0u_DxoB0P6GWJrd-A5mn_7lz9I_IuAA) ;
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
background-image:url(http://cbimg6.com/layouts/10/07/36366ac.png);
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
font-family:century gothic;
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
font-family:century gothic;
font-weight:bold;
font-size:17px;
padding-right:70px;
}

a.nav:hover{
color:#785343;
text-decoration:none;
font-family:century gothic;
font-weight:bold;
font-size:17px;
padding-right:70px;
}

a.nav2, a.nav2:active, a.nav2:visited, a.nav2:link{
color:#40113f;
text-decoration:none;
font-family:century gothic;
font-weight:bold;
font-size:17px;
}

a.nav2:hover{
color:#785343;
text-decoration:none;
font-family:century gothic;
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
font-family:century gothic;
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
font-family:century gothic;
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
<img src='C:\Users\Samsung\Desktop\profile.jpg'>
</div>

<div class='navigation'>
<a class='nav' href='C:\Users\Samsung\Desktop\sdesign\index.php'>Home</a>
<a class='nav' href='C:\Users\Samsung\Desktop\sdesign\about.php'>About</a>
<a class='nav' href='C:\Users\Samsung\Desktop\sdesign\suggestedusers.php'>Suggested Users</a>
<a class='nav' href='C:\Users\Samsung\Desktop\sdesign\FAQs.php'>FAQs</a>

</div>

<div class='sidebar'>

<h1>Hello<strong><big>$loggedInUser->displayname</big></strong></h1>
		<br>
		<img src='styles/images/blank_avatar.jpg'> 
		<br>                  
		<a href=#><small><u>edit picture</u></small></a>
		<br>
		Gender: $loggedInUser->gender
		<br>
		Classification: $loggedInUser->classification
		<br>
		Major:
		<br>
		<i>'self statement'</i>
		<br>
		<a href=#><img src='styles/images/message.jpg' style='height:20px; width=30px'></a>       


<h1>Personality Type</h1>
*EXTRACTED INFORMATION*
</div>
<br><br>


<div class='main'>
<h1>Preferences</h1>
*EXTRACTED INFORMATION*
<br><br>
<br><br>
<br><br>


<h1>Suggested Roommates</h1>
*CALCULATED INFO*
<br><br>
<br><br>
<br><br>


<h1>Announcements</h1>
*EXTRACTED INFO FROM LANDLORDS PAGE*
<br>
'Pictures with links for enlargement'
<br><br>
<br><br>
<br><br>
<br><br>




</div>



</body>
</html>
</html> ";*/

/*require_once('models/config.php');
if (!securePage($_SERVER['PHP_SELF'])){die();}


echo '
<!DOCTYPE html>
<html lang='en-US'>
<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='STUDENTPROFILE'>
    <meta name='author' content='LISA P'>

	<title>Student Profile</title>

	<link rel='stylesheet' type='text/css' href='styles/TestStylesheet.css'</link>
	<link rel='stylesheet' type='text/css' href='styles/AssembledStylesheet.css'</link>

</head>



<!-- TITLE HERE -->
<div id='wrapper'>
	<div id='header'>
		<div id='logo'>
                   
                    <br>
                    <br>
                    <br>
			<center><h2> Welcome To </h2>
			 <h1><a href='index.php'>PV Student Community</a></h1></center>
                   
                        
		</div>
		<br>
	</div>
	<!-- MENU HERE -->
	<div id='menu'>
		<ul>
			<li class='current_page_item'><a href='index.php'>Home</a></li>
                        <li><a href='about.php'>About</a></li>
                        <li class ='last'><a href='faqs.php'>Question/Concerns</a></li>
						<li><a href='logout-1.php'>Logout</a></li>
		</ul>
	</div>
    
        
        <!-- COLUMNS BEGIN HERE -->
	<div id='wrap'>
	<div id='two-columns'>
		<div class='content'>
				<div id='wrap'>
	
		<br>
		<div class='name'>
		Hello <strong><big>$loggedInUser->displayname</big></strong>
		<br><br>
		<img src='styles/images/blank_avatar.jpg'> 
		<br>                  
		<a href=#><small><u>edit picture</u></small></a>
		<br>
		Gender: $loggedInUser->gender
		<br>
		Classification: $loggedInUser->classification
		<br>
		Major:
		<br>
		<i>'self statement'</i>
		<br>
		<br>
		<a href=#><img src='styles/images/message.jpg' style='height:20px; width=30px'></a>       
	</div>
	
					</li>
				</ul>
			</div>
			<div id='column2'>
				<div class='preferences'>
		<center><strong><big>Preferences</big></strong></center>
		<br>
		'extracted information'
		<br>
	</div>


	
			</div>
			<div id='column3'>
				<div class='suggestedroommates'>
		<center><strong><big>Suggested Roommates</big></strong></center>
		<br>
		'calculated info'
	</div>       

	<div class='personality'>
		<center><strong><big>Personality Type</strong>
		<br>
		'extracted personality name'
		</big>
		</center>   
		<br>
		'personality description'
		<br> 
	</div>
	
	<div class='personality'>
		<center><strong><big>Announcements</strong>
		<br>
		'extracted the landlord's page'
		</big>
		</center>   
		<br>
		'pictures with attached links for enlargement as the marquee scroll them'
		<br> 
	</div>
			</div>
			
		</div>
	</div>

    </div>
	<div id='footer'>
            <p> All rights reserved. </p>
	</div>
	
</div>
</html> ';*/
