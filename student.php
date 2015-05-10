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

<title>Student Profile</title>
<script src='vendors/jquery-1.11.1/jquery.min.js'></script>
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
width:875px;
background-image:url('resources/images/white.jpg');
background-repeat:repeat;
overflow:hidden;
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
padding-right:65px;
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
font-size:18px;
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
border-bottom:2px solid #dfc326;
padding-top:10px;
margin-bottom:5px;
padding-bottom:4px;
}

#keywords thead {
  cursor: pointer;
  background: #C299C2;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}

#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}   

</style>
</head>

<body>

<div id='container'>

<div class='header'>
<img src='resources/images/profile.jpg'> 
</div>
<center>
<div class='navigation'>
<a class='nav' href='index.php'>Home</a>
<a class='nav' href='about.php'>About</a>
<a class='nav' href='suggested_users.php'>Suggested Users</a>
<a class='nav' href='faqs.php'>FAQs</a>
<a class='nav' href='logout-1.php'>Logout</a>

</div></center>

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
		<b style='font-size:12px;'><i>$about_me[1]</i></b>
		<br>
		
		<div id='messaging' class='label'>
		<a href=#1><img src='resources/images/message.jpg' style='height:20px; width=30px'></a>       
	</div>
		<div class= 'content'>
			<a name='1'>$loggedInUser->email</a>
		
		</div>
<!-- SCRIPT FOR MESSAGE BUTTON-->
<script>
	$('.content').hide();
	$('.label').click(function()
	{
		
		if ($('.content').is(':visible'))
		{
		$('.content').hide();
		}
		else
		$('.content').show();
		
		$('.content').hide();
		$(this).parent().children('.content').toggle();
		
	});
</script>

<h1>Personality Type</h1>";
switch($personality) 
{ 
case "INFP": 
     echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/INFP.png'/>";
break;

case "INFJ":
  echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/INFJ.png'/>";
break;
 
case"INTP":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/INTP.png'/>"; 
break;

case"ISFJ":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ISFJ.png'/>"; 
break;
  
case"ISFP":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ISFP.png'/>";
break;

case "ISTJ":
echo" <img src='http://www.truity.com/sites/default/files/imagecache/width_180/ISTJ.png'/>"; 
break;

case"ISTP":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ISTP.png'/>";
break;

case"ENFJ":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ENFJ.png'/>";
break; 

case"ENTP":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ENFP.png'/>"; 
break;

case "ENTJ":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ENTJ.png'/>";
break;

case "ENTP":                  
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ENTP.png'/>"; 
break;           
 
case"ESFJ":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ESFJ.png'/>";
break;

case "ESFP":
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ESFP.png'/>"; 
break;
 
case "ESTJ":       
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ESTJ.png'/>"; 
break;

case"ESTP":              
echo"<img src='http://www.truity.com/sites/default/files/imagecache/width_180/ESTP.png'/>"; 
break;
}

echo"</div>
<br><br>


<div class=main>

<h1>Preferences</h1><!--<a href='editabout-me.php?id=$id'>Edit Preferences</a>-->
<p>Social Habits: $preferences[0]</p>
<p>Sleep Habits: $preferences[1]</p>
<p>Cleaning Habits: $preferences[2]</p>
<br>
<p>Property Type: $preferences[3]</p>
<p>Rent Range: $preferences[4]</p>
<p>Number of Roommates: $preferences[5]</p>
<p>Smoking: $preferences[6]</p>
<br><br>


<h1>Suggested Roommates</h1>";
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'PV_5.0';
    // Create connection
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // what they type in the text box
    $query = "SELECT `pv_users`.`display_name`,`pv_users`.`email`,`pv_suggested_users`.`count`
     FROM `pv_suggested_users`,`pv_users`
     WHERE ((`pv_suggested_users`.`s_id` = '$id') AND (`pv_suggested_users`.`su_id` = `pv_users`.`id`))
     ";

    
    echo"<table id='keywords' cellspacing='0' cellpadding='0'>";
    echo"<tr>
     <thead>   
    <th> Name</th><th>Email</th>
    <th>Compatibility</th></tr>
    </thead>";
    
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               $sugg_user[] = $row;
               echo"<tr><td>";
     
            echo $sugg_user[0]['display_name'];
           echo "</td><td>";
             echo $sugg_user[0]['email']; 
           echo "</td><td>";

            echo ($sugg_user[0]['count']*5);echo"%";
           echo "</td><tr>";
                } 
        }
        
    echo"";
 echo"</table>
<br><br>
<br><br>
<br><br>


<!--<h1>Announcements</h1>
*EXTRACTED INFO FROM LANDLORDS PAGE*
<br>
Pictures with links for enlargement
<br><br>-->
<br><br>
<br><br>
<br><br>




</div>



 " ;
?>
</body>
</html>
</html>

