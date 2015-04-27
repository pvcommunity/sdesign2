  
   <!DOCTYPE html>
<html lang='en'>

<head>

<center> <link rel='stylesheet' type='text/css' href='styles/FAQs.css'</link>

<!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
</head>

<body>

<div class='container'>
<div id='wrapper'> 
    <div id='logo'>
       
                  
                    <br>
                    <br>
                    <br>
                      <center><h1><a href='index.php'>PV Student Community</a></h1></center>       
					<br>
					<br>
                    <br>
	</div>
	<div id='menu'>
		<ul>
			<li class='current_page_item'><a href='index.php'>Home</a></li>
			<li><a href='login.php'>Login</a></li>
			<li class ='last'><a href=#>Question/Concerns</a></li>
		</ul>
	</div>
	<center>
			<br>
			<img src='images/mhmm.png'>
<?php

if (isset($_POST ['submit'])) 
    {

    // connect to database
    $con = mysql_connect("localhost", "root", "");
    mysql_select_db("quizresult", $con);
    $category = $_POST['Category'];
    $criteria = $_POST['Criteria'];
    $mysqli = "SELECT * FROM quizResults ORDER BY Results";
    $mysqli = "SELECT * FROM quizresults WHERE $Category = '$criteria'";
    $result = mysqli_query($dbcon, $mysqli) or die (' Issues Getting data ');
    echo"<table>"; 
    echo"<tr><th><Student Name></th> <th> Username </th> Personality Result</th>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      
/*for (  needs to loop 5 times)*/
echo"<table style='width:50%'>";
  echo"<tr>";
    echo"<td> Display name:";
        $s_displayname->displayname;
            $row['displayname']; 
    echo"</td>";
    echo"<td> Username:";
        $s_username->username; 
        $row['username'];
    echo"</td>";
    echo"<td> Gender:";
        $s_gender->gender; 
        $row['gender'];
    echo"</td>";
   echo"</tr>";
  echo"<tr>";
	echo"<td>Student Picture</td>";
	echo"<td>";
        $s_classification->classification; 
        $row['classification'];
        echo"</td>";
  echo"</tr>";
echo"</table>";
echo"<br>";
 }
    mysql_close($con);
}   

function getresults() 
{ 
    $con = mysql_connect("localhost", "root", "");
    mysql_select_db("quizresult", $con);
    $mysql = "SELECT p_results,quizresults * FROM quizResults";
    
}

?> 			
    
</div>
</div>


  <footer>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 text-center'>
                    <p>Copyright &copy; PV Student Community 2014</p>
                </div>
            </div>
        </div>
    </footer>
</center>
</body>
</html> 
