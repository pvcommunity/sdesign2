<?php 

require_once("models/config.php");

if(!securePage($_SERVER['PHP_SELF'])){die();}




    $id = $_REQUEST["id"];

    //echo $user;

    //$id = fetchUserId($user);

    //echo $id;







    //$pref = new Preferences($id);

    //$test = get_preferences($id);

    

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

	

	

    $query = "UPDATE * FROM `preference VALUE ('$preferences[0]','$preferences[1]','$preferences[2]','$preferences[3]','$preferences[4]','$preferences[5]','$preferences[6]') `WHERE s_id = '$id'";

	$result = $mysqli->query($query);




        header("Location: student.php?id=".$id."");

       // $successes[] = lang("ACCOUNT_PERSONALITY_QUIZ",array($id));

        

    }


echo"

<title>About Me</title>

<link rel='stylesheet' type='text/css' href='resources/css/PersonalityQuiz.css'>

<!--<link rel='stylesheet' type='text/css' href='vendors/bootstrap-3.2.0/css/bootstrap.min.css'>-->

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

          

        <p>

        <label>Major:</label>

        <select name='major'>

            <option value=''>Please Select Your Major</option>

            <option value='1'>Accounting</option>

            <option value='2'>Agriculture</option>

            <option value='3'>Agriculture-Economics</option>

            <option value='4'>Animal Science</option>

            <option value='5'>Architecture</option>

            <option value='6'>Biology</option>

            <option value='7'>Chemical Engineering</option>

            <option value='8'>Chemistry</option>

            <option value='9'>Civil Engineering</option>

            <option value='10'>Clinical Adolescent Psychology</option>

            <option value='11'>Communications</option>        

            <option value='12>Community Development</option>

            <option value='13'>Computer Engineering</option>

            <option value='14'>Computer Engineering Technology</option>

            <option value='15'>Computer Information Systems</option>

            <option value='16'>Computer Science</option>

            <option value='17'>Construction Science</option>

            <option value='18'>Counseling</option>

            <option value='19'>Criminal Justice-Juvenile Justice</option>

            <option value='20'>Criminal Justice</option>

            <option value='21'>Curriculum and Instruction</option>

            <option value='22'>Curriculum and Instruction-Reading Education</option>

            <option value='23'>Drama</option>

            <option value='24'>Educational Administration</option>

            <option value='25'>Educational Leadership</option>

            <option value='26'>Electrical Engineering</option>

            <option value='27'>Electrical Engineering Technology</option>

            <option value='28'>Engineering</option>

            <option value='29'>English</option>

            <option value='30'>Family and Community Services</option>

            <option value='31'>Finance</option>

            <option value='32'>General Business Administration</option>

            <option value='33'>Health</option>

            <option value='34'>Health and Physical Education-Health</option>

            <option value='35'>Health and Physical Education-Physical Education</option>

            <option value='36'>History</option>

            <option value='37'>Human Nutrition and Food</option>

            <option value='38'>Human Performance</option>

            <option value='39'>Human Sciences</option>

            <option value='40'>Interdisciplinary Studies</option>

            <option value='41'>Juvenile Forensic Psychology</option>

            <option value='42'>Juvenile Justice</option>

            <option value='43'>Management</option>

            <option value='44'>Management Information Systems</option>

            <option value='45'>Marketing</option>

            <option value='46'>Mathematics</option>

            <option value='47'>Mechanical Engineering</option>

            <option value='48'>Music</option>

            <option value='49'>Nursing</option>

            <option value='50'>Nurse Administration</option>

            <option value='51'>Nurse Education</option>

            <option value='52'>Nurse Practitioner</option>

            <option value='53'>Physics</option>

            <option value='54'>Political Science</option>

            <option value='55'>Psychology</option>

            <option value='56'>Social Work</option>

            <option value='57'>Sociology</option>

            <option value='58'>Soil Science</option>

            <option value='59'>Spanish</option>

            <option value='60'>Special Education</option>

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