 <html>
    <head>
      
    </head>
    <body>
<title>Registration, Pt. 2</title>
<!--<link rel='stylesheet' type='text/css' href='styles/PersonalityQuiz.css'>-->
<script type='text/javascript' src='styles/jquery-1.11.1/jquery.min.js'></script>
<script type='text/javascript' src='styles/js/sanwebe_char_counter.js'></script>
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
	<img src='styles/images/Preferences.png'>  
        
        
<?php

echo "
<form name='registration_pt2' action=' ".$_SERVER['PHP_SELF']."' method='post'>
    <fieldset id='about-me'><label>About Me:</label>
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
    </fieldset>
    <fieldset id='roommate-pref'><label>Roommate Preferences:</label>
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
                                <option value='F'>Friendly and Outgoing</option>
                                <option value='M'>Moderately Social</option>
                                <option value='Q'>Quiet and Reserved</option>
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
                                <option value='E'>Early Bird</option>
                                <option value='F'>Flexible</option>
                                <option value='N'>Night Owl</option>
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
                                <option value='Ch'>Chaotic</option>
                                <option value='C'>Casual</option>
                                <option value='N'>Neat</option>
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
    </fieldset>
    <fieldset id='property-pref'><label>Property Preferences:</label>
<p>
                <label>Type of Residence:<label>
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
    </fieldset>
    <input id='myBtn' name = 'submitform' type='submit' value='Submit' />
</form>"; 
if (isset($_POST['submitform']))
    {   
    ?>
<script type="text/javascript">
window.location = "personalityQuizPage.php";
</script>      
    <?php
    }


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
    
    $user = NULL;
    $display = NULL;
    $pass = NULL;
    $email = NULL;
    $gender = NULL;
    $classification = NULL;
    /*switch($p_rent[])
    {
	case "<$500":
	case "":
    }*/
    
    //count($errors) = 0;
    if(count($errors) == 0)
    {
        /*$row = fetchStudent($s_id);
        $student = Student($row[id],$row[user_name],$row[display_name],$row[password],$row[email],$row[gender],$row[classification]);*/
        $student = new Student($user,$display,$pass,$email,$gender,$classification,$s_id);
	$student->set_about_me($s_id,$s_major,$s_self_stmt,$s_social,$s_sleep,$s_cleaning);
	$student->set_preferences($s_id,$r_major,$r_major_imp,$r_social,$r_social_imp,$r_sleep,$r_sleep_imp,$r_cleaning,$r_cleaning_imp,$p_type,$p_type_imp,$p_rent,$p_rent_imp,$p_sharing,$p_sharing_imp,$p_smoking,$p_smoking_imp);
        
        $successes[] = lang("ACCOUNT_PERSONALITY_QUIZ",array($id));
    }
    
}

if (isset($_POST['submitform']))
    {   
    // connection to database goes here 
     $dbcon("localhost", "root", "");
       mysqli_select_db("testdb", $dbcon);
    
            $combined = array( 
                                $Pref_results = array (major => $s_major,
                                                       social => $s_social,
                                                       sleep => $s_sleep, 
                                                       cleaning => $s_cleaning),
                
                                $Pref_Import = array (major_imp => $s_major_imp,
                                                       social_imp => $s_social_imp,
                                                       sleep_imp => $s_sleep_imp, 
                                                       cleaning_imp => $s_cleaning_imp)
                
            );
            
         $compatibility = 0;     
         $count = 0;
         
         
        // database connection needs to be opened 
        // 
        // query is call to access the preference page where were are selecting from combined result 
           $query = "SELECT *  FROM Prefernce_results";
           $num_fields = mysqli_num_fields($dbcon, $query);
           //$num_rows = mysqli_num_fields($dbcon, $query);
           // inserts new table for count to the data base
           $squery = "SELECT pselect,pimport FROM Prefernce_results ";
           $sqldata = mysqli_query($dbcon, $squery) or die (' Issues Getting data ');
           while ( /*_while our connection is open a query need to loop through the tables*/$row = mysqli_fetch_array(sqldata, MYSQL_ASSOC))
            {
                  
                for ( $a = 0; $a<$num_fields; $a++)
                {
                    //for ($b = 0; $b<$num_rows; $b++)
                   // {
                        for ($i = 0; $x <= $Pref_results.length; $i ++)
                        {
                            for($j = 0; $j <= $Pref_Import.lenght;$j ++)
                            {
                                if($combined[$i][$j] == $row[$i][$j])
                                { $count+5; $compatibility+1.0; }

                                else if ( $combined[$j] && $row[$j] == 0 )
                                {$count+5; $compatibility+1.0;}

                                if ($combined[$i][$j] != $row[$i][$j]  
                                        && $combined[$j] && $row[$j] == 25 )
                                { $count+2; $compatibility+0.5;}
                            }
                     $mysql= "INSERT INTO Prefernce_results ('count') VALUES('$count')";       
                    }
                    
                       if( $count >= 11 )
                            { 
                                // results from the query search that matches the case must print here 
                                // store matches in $match
                                    
                                    $match = $row['username'];
                                    $mysql= "INSERT INTO Student_Profile ('matches') VALUES('$match')"; 
                                // && print compatibility 
                                echo " your compatibility score: $compatibility";
                            }
               
                            else if($count >= 7 && $count <= 10 )
                            {
                                // store possible in $possible 
                               // results from the query search that matches the case must print here 
                                 $possible = $row['username'];
                                 $mysql= "INSERT INTO Student_Profile ('Possiblematches') VALUES('$possible')"; 
                                 // && print compatibility 
                                echo " your compatibility score: $compatibility";
                            }
                            else if($count<= 6 )
                            { 
                                echo " no matches found for preferences";
                                echo " compatibitity score is to low";
                            }     
              }
              
            }
    }
    // comment moved from line 304               
    //short syntax array 
            //without major
            //$Pref_results2 = [$s_social, $s_sleep,$s_cleaning];
            //$Pref_Import2 = [$s_social_imp, $s_sleep_imp,$s_cleaning_imp];
            //$combined1 = array_combine($Pre_reults, $Pref_Import);
            
            
            
            //for major
            //$Pref_results= [$s_major, $s_social,$s_sleep, $s_cleaning];
            //$Pref_Import = [$s_major_imp, $s_social_imp, $s_sleep_imp,$s_cleaning_imp];
            
            // merging the arrays into one [0][0],[1][1],[2][2]
            //$combined = array_combine($Pref_results, $Pref_Import);



//include 'PersonalityQuizPage.php';
//echo $Quizresults;
/*$PrefernceScore = 0; 
if ($s_major  == $r_major ) {$PrefernceScore++;}
if ($s_social == $r_social) {$PrefernceScore++;}
if ($s_sleep == $r_sleep) {$PrefernceScore++;}
if ($s_cleaning == r_cleaning ) {$PrefernceScore++;}


if($preferencescore = 5 )
{
    echo "<div id='results'>Perfect Match </div>";    
}
else
{*/
 
  // session_start();
    //echo $_SESSION['QuizResults'];
    //$_SESSION['varname2'] =   $NewP_Results ;
 //echo' $NewResults = $Quizresults.$preferencevalue.';
?>
<a href="suggestedusers.php" title="">Go to suggested users</a>
</div>
</body>
</html>
