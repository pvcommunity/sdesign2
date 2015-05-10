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

$user = get_user_prefs($id);

$Quizresults = get_pers_for_profile($id);
$pers_id = get_user_pers_id($Quizresults);

$compatible_personalities = get_compatible_personalities($pers_id,3);
$compatible_personalities[3]['personality'] = $Quizresults;

for($i=3; $i>0; $i--)
{
    $sugg_users_id = get_id_from_pers_result($pers_id, $i);
}

for($i=0; $i < count($sugg_users_id); $i++)
{
    $sugg_users = get_user_prefs($sugg_users_id[$i]['s_id']);
}
   
$count = 0;

for($i=0; $i < count($sugg_users); $i++)
{
    if(($user[0]['major']==$sugg_users[$i]['major'])&&($user[0]['major_imp']==$sugg_users[$i]['major_imp']))
    {
        $count = $count + 5;
    }elseif($user[0]['major']==$sugg_users[$i]['major']){
        $count = $count + 5;
    }elseif([($user[0]['major'] != $sugg_users[$i]['major']) && ($user[0]['major_imp'] != $sugg_users[$i]['major_imp'])] || ($user[0]['major_imp'] = 25) || $sugg_users[$i]['major_imp']){
        $count = $count+2;
    }
    
    if(($user[0]['social']==$sugg_users[$i]['social'])&&($user[0]['social_imp']==$sugg_users[$i]['social_imp']))
    {
        $count = $count + 5;
    }elseif($user[0]['social']==$sugg_users[$i]['social']){
        $count = $count + 5;
    }elseif([($user[0]['social'] != $sugg_users[$i]['social']) && ($user[0]['social_imp'] != $sugg_users[$i]['social_imp'])] || ($user[0]['social_imp'] = 25) || $sugg_users[$i]['social_imp']){
        $count = $count+2;
    }
    
    if(($user[0]['sleep']==$sugg_users[$i]['sleep'])&&($user[0]['sleep_imp']==$sugg_users[$i]['sleep_imp']))
    {
        $count = $count + 5;
    }elseif($user[0]['sleep']==$sugg_users[$i]['sleep']){
        $count = $count + 5;
    }elseif([($user[0]['sleep'] != $sugg_users[$i]['sleep']) && ($user[0]['sleep_imp'] != $sugg_users[$i]['sleep_imp'])] || ($user[0]['sleep_imp'] = 25) || $sugg_users[$i]['sleep_imp']){
        $count = $count+2;
    }
    
    if(($user[0]['cleaning']==$sugg_users[$i]['cleaning'])&&($user[0]['cleaning_imp']==$sugg_users[$i]['cleaning_imp']))
    {
        $count = $count + 5;
    }elseif($user[0]['cleaning']==$sugg_users[$i]['cleaning']){
        $count = $count + 5;
    }elseif([($user[0]['cleaning'] != $sugg_users[$i]['cleaning']) && ($user[0]['cleaning_imp'] != $sugg_users[$i]['cleaning_imp'])] || ($user[0]['cleaning_imp'] = 25) || $sugg_users[$i]['cleaning_imp']){
        $count = $count+2;
    }
    echo '<br>Count:'.$count.'<br>Compatibility:'.(($count/20)*100).'%';
    
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'PV_5.0';
    // Create connection
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $user1 = $user[0]['s_id'];
    $sugg_user = $sugg_users[$i]['s_id'];
    
    $query = "INSERT INTO pv_suggested_users (s_id, su_id, count)
        VALUES ('$user1', '$sugg_user', '$count')";
    $result = $mysqli->query($query);
    $mysqli->close();   
}

?>