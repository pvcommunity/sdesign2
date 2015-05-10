 <style>
            body {
                background: #660066 url('resources/images/bg4.jpg') repeat;
            }
        </style>



    <center> 
        <!--Personality Quiz stylesheet-->
        <link rel='stylesheet' type='text/css' href='resources/css/PersonalityQuiz.css'</link>

        <!-- jQuery -->
        <script src='vendors/jquery-1.11.1/jquery.js'></script>

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
        <title>Personality Quiz</title>
        </head>


        <body>
            <div class='container'>
                <div id='wrapper'> 
                    <div id='logo'>


                        <br>
                        <br>
                        <br>
                        <center><h1><a href='#'>PV Student Community</a></h1></center>       
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
                        <!--BANNER-->
                  

                        <!--Questions Progression-->

                        <tr>
                        <br>
                        <br>
                        <tr>







<?php
// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect('localhost', $dbuser, $dbpass, 'PV_5.0');

    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        //*** Connect to the database*****
        $dbLink = new mysqli($dhhost, $dbuser, $dbpass, 'PV_5.0');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `file` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
            mysql_select_db('PV_5.0');
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="landlord.php">here</a> to go back</p>';
header( "refresh:1;url=landlord.php" );
?>
 
                            </head>
                            </body>