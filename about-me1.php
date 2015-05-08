<?php

require_once("models/config.php");
if(!securePage($_SERVER['PHP_SELF'])){die();}

// INSERT STANDARD USERCAKE CONNECTION ** UNCOMMMENT 
//require_once("models/config.php"); 
/*$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('PV_5.0');*/
global $mysqli,$db_table_prefix;
$id = 2;

/*$stmt = $mysqli->prepare("SELECT
        s_id,
        major,
        major_imp,
        social,
        social_imp,
        sleep,
        sleep_imp,
        cleaning,
        cleaning_imp
        FROM pv_preferences
        WHERE s_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($s_id,$major,$major_imp,$social,$social_imp, $sleep,$sleep_imp, $clean,$clean_imp);
while ($stmt->fetch()){
    $user = array(
        $s_id,
        array($major,$social,$sleep,$clean),
        array($major_imp,$social_imp,$sleep_imp,$clean_imp)
    );
}
$stmt->close();*/

$query = "SELECT s_id, major, major_imp, social,social_imp, sleep, sleep_imp, cleaning, cleaning_imp
        FROM pv_preferences
        WHERE s_id ='$id'";
$result = $mysqli->query($query);
echo 'Student Results:';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $user[] = $row;
    } 
}
print_r($user);
echo '<br>'.$user[0]['s_id'];//.'<br>'.$user[1][0].'<br>'.$user[2][0];//.'<br>'.$user[3];

$Quizresults = get_pers_for_profile($id);
$pers_id = get_user_pers_id($Quizresults);

$compatible_personalities = get_compatible_personalities($pers_id,3);
$compatible_personalities[3]['personality'] = $Quizresults;

$compatibility = 0;     
$count = 0;


// query is call to access the preference page where were are selecting from combined result 
//$num_rows = mysqli_num_fields($dbcon, $query);
// inserts new table for count to the data base
//$squery = "SELECT pselect,pimport FROM Prefernce_results ";
//$sqldata = mysqli_query($dbcon, $squery) or die (' Issues Getting data ');


/*_while our connection is open a query need to loop through the tables*
while ( $row = mysqli_fetch_assoc($retval, MYSQL_ASSOC))
{
    for ( $a = 0; $a<$num_fields; $a++)
    {
        //for ($b = 0; $b<$num_rows; $b++)
       // {
            for ($i = 0; $x <= $Pref_results.length; $i ++)
            {
                for($j = 0; $j <= $Pref_Import.lenght;$j ++)
                {
                    // i need help calling the rows from database
                    if($combined[$i][$j] == $row[$i][$j])
                    { $count+5; $compatibility+1.0; }

                    else if ( $combined[$j] && $row[$j] == 0 )
                    {$count+5; $compatibility+1.0;}

                    if ($combined[$i][$j] != $row[$i][$j]  
                            && $combined[$j] && $row[$j] == 25 )
                    { $count+2; $compatibility+0.5;}
                }

         $mysql= "INSERT INTO Preference_results ('count') VALUES('$count')";    
         mysql_select_db('PV_5.0');
        }

           if( $count >= 11 )
                { 
                    // results from the query search that matches the case must print here 
                    // store matches in $match

                        $match = $row['username'];
                        $mysql= "INSERT INTO Student_Profile ('matches') VALUES('$match')"; 
                        mysql_select_db('PV_5.0');
                    // && print compatibility 
                    echo " your compatibility score: $compatibility";
                }

                else if($count >= 7 && $count <= 10 )
                {
                    // store possible in $possible 
                   // results from the query search that matches the case must print here 
                     $possible = $row['username'];
                     $mysql= "INSERT INTO Student_Profile ('possible_matches') VALUES('$possible')"; 
                     mysql_select_db('PV_5.0');
                     // && print compatibility 
                    echo " your compatibility score: $compatibility";
                }
                else if($count<= 6 )
                { 
                    echo " no matches found for preferences";
                    echo " compatibitity score is to low";
                }     
  }

}*/
?>