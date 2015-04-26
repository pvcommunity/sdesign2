<?php

require_once("models/config.php");
if(!securePage($_SERVER['PHP_SELF'])){die();}

//$query_string = $_SERVER['QUERY_STRING'];
//list($field,$value) = explode('=',$query_string);
//$query = array('field'=>$field,'value'=>$id);
    //echo $query_string;
    $id = $_REQUEST["id"];
    echo $id;
    //$s_id = intval($id);
    //echo $s_id;

    
    
// Forms posted
if(!empty($_POST))
{
    $errors = array();
    
    
    $s_major = $_POST["s_major"];
    $s_self_stmt = $_POST["s_self_stmt"];
    $s_social = $_POST["s_social"];
    $s_sleep = $_POST["s_sleep"];
    $s_cleaning = $_POST["s_cleaning"];
    
    $r_major = $_POST["r_major"];
    $r_major_imp = $_POST["r_major_imp"];
    $r_social = $_POST["r_social"];
    $r_social_imp = $_POST["r_social_imp"];
    $r_sleep = $_POST["r_sleep"];
    $r_sleep_imp = $_POST["r_sleep_imp"];
    $r_cleaning = $_POST["r_cleaning"];
    $r_cleaning_imp = $_POST["r_cleaning_imp"];
    
    $p_type = $_POST["p_type"];
    $p_type_imp = $_POST["p_type_imp"];
    $p_rent = $_POST["p_rent"];
    $p_rent_imp = $_POST["p_rent_imp"];
    $p_sharing = $_POST["p_sharing"];
    $p_sharing_imp = $_POST["p_sharing_imp"];
    $p_smoking = $_POST["p_smoking"];
    $p_smoking_imp = $_POST["p_smoking_imp"];
    
    
    //count($errors) = 0;
    if(count($errors) == 0)
    {
        $student_preferences = new Preferences($s_id);
	$student_preferences->set_about_me($s_major,$s_self_stmt,$s_social,$s_sleep,$s_cleaning);
	$student_preferences->set_preferences($r_major,$r_major_imp,$r_social,$r_social_imp,$r_sleep,$r_sleep_imp,$r_cleaning,$r_cleaning_imp,$p_type,$p_type_imp,$p_rent,$p_rent_imp,$p_sharing,$p_sharing_imp,$p_smoking,$p_smoking_imp);
        
        $successes[] = lang("ACCOUNT_PERSONALITY_QUIZ",array($id));
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
/*fieldset{
    padding-left: 25px;
}*/
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
echo "
<form name='registration_pt2' action=' ".$_SERVER['PHP_SELF']."' method='post'>
    <center><fieldset id='about-me'><legend>About Me</legend></center>
        <p>
        <label>Major:</label>
        <select name='s_major'>
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
	<label>Self-Statement:</label>
	<textarea name='s_self_stmt' id='self-stmt' cols='45' rows='7'></textarea>
	<br/>
	<span name='countchars' id='countchars' style='font-weight:bold;'></span> Characters Remaining
	</p>
	<p>
	<label>Social Habits:</label>
	<select name='s_social'>
	     <option value=''>Please Select Your Social Habit</option>
             <option value='Quiet and Reserved'>Quiet and Reserved</option>
             <option value='Moderately Social'>Moderately Social</option>
             <option value='Friendly and Outgoing'>Friendly and Outgoing</option>
        </select>
        </p>
        <p>
        <label>Your Sleep Habits:</label>
        <select name='s_sleep' id='s_sleep'>
            <option value=''>Please Select Your Sleep Habits</option>
            <option value='Early Riser'>Early Riser</option>
            <option value='Flexible'>Flexible</option>
            <option value='Night Owl'>Night Owl</option>
        </select>
        </p>
        <p>
        <label>Your Cleaning Habits:</label>
        <select name='s_cleaning' id='s_cleaning'>
            <option value=''>Please Select Your Cleaning Habits</option>
            <option value='Chaotic'>Chaotic</option>
            <option value='Casual'>Casual</option>
            <option value='Neat'>Neat</option>
        </select>
        </p>	
    </fieldset><br>
    <center><fieldset id='roommate-pref'><legend>Roommate Preferences</legend></center>
<p>
			   <label>Major:</label>
			   <select name='r_major'>
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
                           <select name='r_major_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
			   <p>
			   <label>Social Habits:</label>
			   <select name='r_social'>
                                <option value='Friendly and Outgoing'>Friendly and Outgoing</option>
                                <option value='Moderately Social'>Moderately Social</option>
                                <option value='Quiet and Reserved'>Quiet and Reserved</option>
			   </select>
			   </p>
			   <p>
                           <label>Importance:</label>
                           <select name='r_social_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
			   <p>
			   <label>Sleep Habits:</label>
			   <select name='r_sleep'>
                                <option value='Early Bird'>Early Bird</option>
                                <option value='Flexible'>Flexible</option>
                                <option value='Night Owl'>Night Owl</option>
			   </select>
			   </p>
                           <p>
                           <label>Importance:</label>
                           <select name='r_sleep_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
			   <p>
			   <label>Cleaning Habits:</label>
			   <select name='r_cleaning'>
                                <option value='Chaotic'>Chaotic</option>
                                <option value='Casual'>Casual</option>
                                <option value='Neat'>Neat</option>
			   </select>
			   </p>
			   <p>
                           <label>Importance:</label>
                           <select name='r_cleaning_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>	
    </fieldset><br>
    <center><fieldset id='property-pref'><legend>Property Preferences</legend></center>
                            <p>
                            <label>Residence Type:<label>
			   <select name='p_type'>
                                <option value='Apartment'>Apartment</option>
                                <option value='Condo'>Condo</option>
                                <option value='House'>House</option>
                                <option value='Townhome'>Townhome</option>
			   </select>
			   </p>
 			   <p>
                           <label>Importance:</label>
                           <select name='p_type_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
			   <p>
			   <label>Rent:<label>
			   <select name='p_rent'>
                                <option value='< $500'>< $500</option>
                                <option value='$500-$800'>$500-$800</option>
                                <option value='$800+'>$800+</option>
			   </select>
			   </p>
 			   <p>
                           <label>Importance:</label>
                           <select name='p_rent_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
			   <p>
			   <label>Sharing:<label>
			   <select name='p_sharing'>
                                <option value='<1'><1</option>
                                <option value='<2'><2</option>
                                <option value='<3'><3</option>
                                <option value='3+'>3+</option>
			   </select>
			   </p>
 			   <p>
                           <label>Importance:</label>
                           <select name='p_sharing_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
			   <p>
			   <label>Smoking:<label>
			   <select name='p_smoking'>
                                <option value=''>Doesn't Matter</option>
                                <option value='Non-Smoking'>Non-Smoking</option>
                                <option value='Occasional Smoker'>Occasional Smoker</option>
                                <option value='Smoker'>Smoker</option>
			   </select>
			   </p>
			    <p>
                           <label>Importance:</label>
                           <select name='p_smoking_imp'>
                                <option value='0'>Not Important</option>
				<option value='25'>Moderately Important</option>
				<option value='75'>Very Important</option>
			   </select>
			   </p>
    </fieldset><br>
    <input id='myBtn' type='submit' value='Submit' />
</form>
";
?>