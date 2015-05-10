 <?php

require_once("models/config.php");
if(!securePage($_SERVER['PHP_SELF'])){die();}

    $id = $_REQUEST["id"];
?>   
<!DOCTYPE html>
<html lang='en'>

<head>

<center> <link rel='stylesheet' type='text/css' href='resources/css/FAQs.css'</link>

<!-- jQuery -->
<script src='vendors/jquery-1.11.1/jquery.min.js'></script>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
    <style>
 
#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
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
body {
    background: #660066 url('resources/images/bg4.jpg') repeat;
}  
  </style>  
    
    
    
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
                        <li class ='last'><a href='faqs.php'>Question/Concerns</a></li>
		</ul>
	</div>
	<center>
			<br>
                        <img src='resources/images/mhmm.png'>


    
   <?php

if (isset($_POST ['submit'])) 
    {
    // connect to database
   
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
         echo "Peyton Manning";
           echo "</td><td>";
             echo "pmanning@student.pvamu.edu"; 
           echo "</td><td>";

            echo "(11*5)";echo"%";
            
           echo "</td><tr>";
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
 echo"</table>"; 
 }
 
   // mysql_close($con);
    
                                
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
