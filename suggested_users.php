    
   <!DOCTYPE html>
<html lang='en'>

<head>

<center> <link rel='stylesheet' type='text/css' href='styles/FAQs.css'</link>

<!-- jQuery -->
    <script src='js/jquery.js'></script>

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
   
    mysql_connect("localhost","root","");
    mysql_select_db("testdb");
    $category = $_POST['category'];
    $criteria = $_POST['criteria'];

    // what they type in the text box
    $sql = mysql_query("SELECT * FROM personalityresults WHERE $category LIKE '%".$criteria."%'");
    
    $Quizresults = 'quizresults';
    $Firstname = 'Firstname';
    $Lastname = 'Lastname';
     if (mysql_num_rows($sql) == 0)
              
      {
     echo"<table id='keywords' cellspacing='0' cellpadding='0'>";
    echo"<tr>
     <thead>   
    <th> First name</th><th>Last name</th>
    <th>Quiz Results </th></tr>
    </thead>";    
         echo"<tr><td>";
        echo "No Matches Found";
       echo "</td><td>";
         echo "No Matches Found";
       echo "</td><td>";
        echo "No Matches Found";
       echo "</td><tr>";
       echo"";
 echo"</table>"; 
      }
 else {
    echo"<table id='keywords' cellspacing='0' cellpadding='0'>";
    echo"<tr>
     <thead>   
    <th> First name</th><th>Last name</th>
    <th>Quiz Results </th></tr>
    </thead>";
    while($row = mysql_fetch_array($sql))
    {
        
     
          

      // query goes here 
       echo"<tr><td>";
     
        echo $row[$Firstname];
       echo "</td><td>";
         echo $row[$Lastname]; 
       echo "</td><td>";
      
        echo $row[$Quizresults];
       echo "</td><tr>";
        
    }
    echo"";
 echo"</table>"; 
 }
 
   // mysql_close($con);
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
