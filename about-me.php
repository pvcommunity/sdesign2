<?php

require_once("models/config.php");
if(!securePage($_SERVER['PHP_SELF'])){die();}

    $user = $_REQUEST["user"];
    //echo $user;
    $id = fetchUserId($user);
    //echo $id;


    
    
// Forms posted
if(!empty($_POST))
{
    $errors = array();
    
    //$s_id = $_GET["s-id"];
    $major = $_POST["major"];
    $self_stmt = $_POST["self_stmt"];
    $social = $_POST["social"];
    $sleep = $_POST["sleep"];
    $clean = $_POST["clean"];
    $major_imp = $_POST["major_imp"];
    $social_imp = $_POST["social_imp"];
    $sleep_imp = $_POST["sleep_imp"];
    $clean_imp = $_POST["clean_imp"];
    
    $p_type = $_POST["p_type"];
    $p_rent = $_POST["p_rent"];
    $p_sharing = $_POST["p_sharing"];
    $p_smoking = $_POST["p_smoking"];
    
    
    if(count($errors) == 0)
    {
        $student_preferences = new Preferences($id);
	$student_preferences->set_preferences($id,$self_stmt,$major,$major_imp,$social,$social_imp,$sleep,$sleep_imp,$clean,$clean_imp,$p_type,$p_rent,$p_sharing,$p_smoking);
        
        
    }
        
}

echo"
<title>About Me</title>
<link rel='stylesheet' type='text/css' href='resources/css/PersonalityQuiz.css'>
<!--<link rel='stylesheet' type='text/css' href='styles/bootstrap-3.2.0/css/bootstrap.min.css'>-->
<link rel='stylesheet' type='text/css' href='resources/css/Notifications.css'>
	
<script type='text/javascript' src='vendors/jquery-1.11.1/jquery.min.js'></script>
<script type='text/javascript' src='resources/js/sanwebe_char_counter.js'></script>

<style>
    legend {
    display: block;
    width: 50%;
    padding: 5px;
    padding-left: 15px;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: inherit;
    color: #333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}
body {
    background: #660066 url('resources/images/bg4.jpg') repeat;
}
label{
    font-weight: bold;
}
 h1 {
 font: Bernard MT Condensed; 
}
p {
    padding-left:300px;
}
label,
textarea{
  display:inline-block;
  vertical-align:middle;

}

label {
    width: 20%;
}

span {
    padding-left: 30%;
]
</style>
";
require 'models/site-templates/top.php';
echo"
	
	
<!--BANNER-->
	<center><img src='resources/images/preferences.png'></center>
			
";

echo resultBlock($errors,$successes);
//echo "$id| $major| $major_imp| $self_stmt| $social| $social_imp| $sleep| $sleep_imp| $clean| $clean_imp| $p_type| $p_rent| $p_sharing| $p_smoking";
echo "
<form name='registration_pt2' action=' ".$_SERVER['PHP_SELF']."' method='post'>
    
    <center><fieldset id='about-me'><legend>About Me</legend></center>
        <!--  Student's id in a hidden form -->
        <input type='hidden' name='s_id' value='".$id."'>
        <input type='hidden' name='user' value='".$user."'>   
        <p>
        <label>Major:</label>
        <select name='major'>
            <option value=''>Please Select a Major</option>
            <option value='Agriculture & Human Sciences'>Agriculture & Human Sciences</option>
            <option value='Architecture'>Architecture</option>
            <option value='Arts & Sciences'>Arts & Sciences</option>
            <option value='Business'>Business</option>
            <option value='Education'>Education</option>
            <option value='Engineering'>Engineering</option>
            <option value='Juvenile Justice & Psychology'>Juvenile Justice & Psychology</option>
            <option value='Nursing'>Nursing</option>
            <option value='Graduate Studies'>Graduate Studies</option>
        </select>
        </p>
        <p>
        <label>Importance:</label>
        <select name='major_imp'>
            <option value=''>How Important?</option>
            <option value='0'>Not Important</option>
            <option value='25'>Moderately Important</option>
            <option value='75'>Very Important</option>
        </select>
        </p>
	<p>
	<label>Self-Statement:</label>
	<textarea name='self_stmt' id='self-stmt' cols='45' rows='7'></textarea>
	<br/>
	<span name='countchars' id='countchars' style='font-weight:bold;'></span> Characters Remaining
	</p>
	<p>
	<label>Social Habits:</label>
	<select name='social'>
	    <option value=''>Please Select Your Social Habit</option>
            <option value='Quiet and Reserved'>Quiet and Reserved</option>
            <option value='Moderately Social'>Moderately Social</option>
            <option value='Friendly and Outgoing'>Friendly and Outgoing</option>
        </select>
        </p>
        <p>
        <label>Importance:</label>
        <select name='social_imp'>
            <option value=''>How Important?</option>
            <option value='0'>Not Important</option>
            <option value='25'>Moderately Important</option>
            <option value='75'>Very Important</option>
        </select>
        </p>
        <p>
        <label>Your Sleep Habits:</label>
        <select name='sleep' id='sleep'>
            <option value=''>Please Select Your Sleep Habits</option>
            <option value='Early Riser'>Early Riser</option>
            <option value='Flexible'>Flexible</option>
            <option value='Night Owl'>Night Owl</option>
        </select>
        </p>
        <p>
        <label>Importance:</label>
        <select name='sleep_imp'>
            <option value=''>How Important?</option>
            <option value='0'>Not Important</option>
            <option value='25'>Moderately Important</option>
            <option value='75'>Very Important</option>
        </select>
        </p>
        <p>
        <label>Your Cleaning Habits:</label>
        <select name='clean'>
            <option value=''>Please Select Your Cleaning Habits</option>
            <option value='Chaotic'>Chaotic</option>
            <option value='Casual'>Casual</option>
            <option value='Neat'>Neat</option>
        </select>
        </p>
        <p>
        <label>Importance:</label>
        <select name='clean_imp'>
            <option value=''>How Important?</option>
            <option value='0'>Not Important</option>
            <option value='25'>Moderately Important</option>
            <option value='75'>Very Important</option>
        </select>
        </p>
    </fieldset><br>
    <center><fieldset id='property-pref'><legend>Property Preferences</legend></center>
        <p>
        <label>Residence Type:</label>
       <select name='p_type'>
            <option value=''>Which Type of Residence Do You Prefer?</option>
            <option value='Apartment'>Apartment</option>
            <option value='Condo'>Condo</option>
            <option value='House'>House</option>
            <option value='Townhome'>Townhome</option>
       </select>
       </p>
       <p>
       <label>Rent:</label>
       <select name='p_rent'>
            <option value=''>What's Your Rent Range?</option>
            <option value='< $500'>< $500</option>
            <option value='$500-$800'>$500-$800</option>
            <option value='$800+'>$800+</option>
       </select>
       </p>
       <p>
       <label>Sharing:</label>
       <select name='p_sharing'>
            <option value=''>How Many Roommates?</option>
            <option value='<1'><1</option>
            <option value='<2'><2</option>
            <option value='<3'><3</option>
            <option value='3+'>3+</option>
       </select>
       </p>
       <p>
       <label>Smoking:</label>
       <select name='p_smoking'>
            <option value=''>Smoking?</option>
            <option value='Non-Smoking'>Non-Smoking</option>
            <option value='Occasional Smoker'>Occasional Smoker</option>
            <option value='Smoker'>Smoker</option>
       </select>
       </p>
    </fieldset><br><br>
    <center><input id='myBtn' type='submit' value='Submit' /></center>
</form>
";
?>