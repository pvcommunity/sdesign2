<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
Creator : Olivia Benjamin 
-->
<!doctype html>
<html>
<head>
<title>Register</title>
<link rel='stylesheet' type='text/css' href='styles/Landlordstyle.css'</link>
<!-- JQUERY AND AJAX UPLOAD STARTS HERE -->
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/ajaxupload.js" type="text/javascript"></script>
<!-- JQUERY AND AJAX UPLOAD STARTS HERE -->
</head>
<body>
<center>
<div id="wrapper"> 
 <!-- ============ MENU STARTS  ============== -->
    <div id="menu">
		<ul>
                    <li><a href="HomePage.php">Home</a></li>
                    <li class = "last"><a href="#">Preview Page</a></li>
                    <li class = "last"><a href="LogoutPage.php">Logout</a></li>
                    
                </ul>
	</div>
<!-- ============ TABLES STARTS  ============== -->
<table width="100%" style="height: 95%;" cellpadding="10" cellspacing="0" border="0">
    
<td colspan="3" style="height: 200px;" bgcolor="#E0E0D1">
  <a href=# align="left"><small>Change Logo Image</small></a>
   <center><img  src="https://imageshack.com/i/p1sX7984j" alt="Complex picture" height="250" width="1170" > </center>   
   
</td></tr>
    
<tr>

<!-- ============ LEFT COLUMN  ============== -->
<td width="20%" valign="top" bgcolor="#C299C2">



<h4>Welcome back</h4><h2>Name</h2>

                                                <p>Apartment Address  
                                                 <a href=#><small><u>edit info</u></small></a> 
                                                </p>
                                                <p>Business Number 
                                                 <a href=#><small><u>edit info</u></small></a> 
                                                </p>
                                                <p>Contact Email 
                                                 <a href=#><small><u>edit info</u></small></a> 
                                                </p>
                                                <p>Business Hours
                                                 <a href=#><small><u>edit info</u></small></a> 
                                                </p>
                                                <p><a href="#" <size = small class="link-style">Publish</a></p>
</td>

<!-- ============ RIGHT COLUMN (CONTENT) ============== -->
<td width="50%" valign="top" bgcolor="#E0E0D1">
<!-- floor plans edit information starts here -->
<!-- floor plans edit information stops here -->
<center><h2>Floor Plans</h2></center>
<div 
<ul class=floorplan>
    <p><h4>1 bedroom  1 bath Suite</h4>
    Cost : $585.00 + Utilities<br>
    <p><h4>Utilities include:</p></h4>
        <li>Water</li>
        <li>Electricity</li><ul> <a href=#><small><u>edit info</u></small></a> </p>
<!-- floor plans image information starts here -->
        <center><img  src="https://imageshack.com/i/p1HthunXj" alt="profilepic" height="350" width="350" border="5">
 <br>
  <a href=#><small><u>Change floor plan image</u></small></a></center>
 </p>
 <!-- floor plans image information stops here -->
 
 


<?php
$con = mysql_connect("localhost", "root", "");

if (isset($_POST['submit']))
{
    if(getimagesize($_FILES ['images'] ['tmp_name'])== FALSE)
    { 
        echo " Please select an image. ";
    }
    else 
    { 
        $images = addslashes($_FILES['images']['tmp_name']);
        $name = addslashes($_FILES['images']['name']);
        $images = file_get_contents($images); 
        $images = base64_encode($images);
        saveimage($name, $images);
    }
}
displayimage();
function saveimage($name, $images)
{ 
    $con = mysql_connect("localhost", "root", ""); 
    mysql_select_db('testdb', $con); // change this information to our database 
    $qry = " insert into images(name, images) value ('$name', '$images')"; 
    $result = mysql_query($qry, $con);
    if ($result)
    { 
        echo " <br/> Image Uploaded."; 
    }
    else 
    { 
           echo " <br/> Image not Uploaded."; 
    }
}
function displayimage() 
{ 
    $con = mysql_connect("localhost", "root", ""); 
    mysql_select_db('testdb', $con); // change this information to our database 
    $qry = " select * from images"; 
    $result = mysql_query($qry, $con);
    while($row = mysql_fetch_array($result))
    {
        echo"
<div 
<ul class=floorplan>
    <p><h4>1 bedroom  1 bath Suite</h4>
    Cost : $585.00 + Utilities<br>
    <p><h4>Utilities include:</p></h4>
        <li>Water</li>
        <li>Electricity</li><ul> <a href=#><small><u>edit info</u></small></a> </p>";
        echo " <img height = '400' width='400' src'data:image/jpeg;base64,<?php echo base64_encode($images);'> ";// might give trouble
       
        echo"<br> 
            
<small><u>Add More Floor Plan Info</u></small> <br>  <a href=#><small><u>Edit Title</u></small></a>
<br> ";
    }
    mysql_close($con);
}
?>
<!-- floor plans add image/information starts here -->


            <br> 
            <small><u>Add More Floor Plan Image</u></small> <br> 
            <form method="post" method="post" enctype="multipart/form-data">
            <input type ="file" name ="images"/><br> 
            <input type ="submit" name ="submit" value ="upload"/>
             </form>
            <br> 

<br>
            <small><u>Add Slide Show</u></small> <br> 
            <form action="post" method="post" enctype="multipart/form-data">
            <input type ="file" name ="images"/><br> 
            <input type ="submit" name ="submit" value ="upload"/>
            </form>
            <br>             

<!-- floor plans image information stops here -->
</form> 
 <br></div>
<p><a href="#" <size = small class="link-style">Publish</a></p>
</td>


<!-- ============ THIRD RIGHT COLUMN (CONTENT) ============== -->
<td width="30%" valign="top" bgcolor="#C299C2">&nbsp;

<center><h2> Apartment Documents </h2></center>
 <br> 
 <br>
 <center> <p><h3>Leasing Information</h3> </p></center>
     <br>
<form action="add_file.php" method="post" enctype="multipart/form-data">
    <center>  <input type="file" name="uploaded_file">
        <br>
        <input type="submit" value="Upload file"></center>
</form>
<?php
// Connect to the database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbLink = new mysqli('localhost', $dbuser, $dbpass, 'testdb');

if(mysqli_connect_errno()) {
    die("MySQL connection failed: ". mysqli_connect_error());
}
 
// Query for a list of all existing files
$sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
$result = $dbLink->query($sql);
 
// Check if it was successfull
if($result) {
    // Make sure there are some files in there
    if($result->num_rows == 0) {
        echo '<center><p>Housing administration has not uploaded any </p></center>';
    }
    else {
        // Print the top of a table
        echo '<table width="100%">
                <tr>
                <center><h3><big><u><p>UPLOADED LEASING DOCUMENTS </u></big></h3> </p></center>
                    <td><b>Name</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        // Print each file
        while($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_files.php?id={$row['id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>';
    }
 
    // Free the result
    $result->free();
}
else
{
    echo 'Error! SQL query failed:';
    echo "<pre>{$dbLink->error}</pre>";
}
 
// Close the mysql connection
$dbLink->close();
?>


 <br> 
<p><a href="#" <size = small class="link-style">Publish</a></p>
</td>

</tr>


<!-- ============ FOOTER SECTION ============== -->
<tr><td colspan="3" align="center" height="20" bgcolor="#E6CC80">All rights reserved.<br> PVCOMMUNITY </td></tr>
</table>

        <br>
      

<head>
<title>lANDLORD PAGE</title>

</head>
</body>
