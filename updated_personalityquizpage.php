<?php

require_once("models/config.php");
if(!securePage($_SERVER['PHP_SELF'])){die();}

    $id = $_REQUEST["id"];
    echo $id;
?>

<!DOCTYPE html>
<html lang='en'>

    <head>
        <SCRIPT LANGUAGE="JavaScript">
<!-- This script generated free online at -->
<!-- Wilsoninfo http://www.wilsoninfo.com -->

            < !--Begin
            function popUp(URL) {
                day = new Date();
                id = day.getTime();
                eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=700,height=750,left = 450,top = 75');");
            }
            // End -->
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="vendors/bootstrap-3.2.0/css/bootstrap.min.css">
        <script src="vendors/jquery-1.11.1/jquery.min.js"></script>
        <script src="vendors/bootstrap-3.2.0/js/bootstrap.min.js"></script>

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
                        <img src='resources/images/PersonalityQuiz.png'>


                        <!--Questions Progression-->

                        <tr>
                        <br>
                        <br>
                        <!--
                        echo"
                        PHP STARTS HERE -->
                        <tr>


                        <form action="personalityresult.php"  method="post">
                            <input type ="hidden" name ="submit" value =" true"/>
                            <!-- Insert whatever radio button questions you want here. -->
                            <br>
                            <br>

                            <legend> Question One </legend>
                            <label>Select the option that best describes you?</label> <br>
                            <input type="radio" name="question1" id ="question1" value="E" >Extrovert
                            <input type="radio" name="question1" id ="question1" value="I" >Introvert

                            <input type=button value="Help" href="#Question1"onClick="javascript:popUp('personalityhelp.php')"/>

                            <br>
                            <br>

                            <legend> Question Two </legend>
                            <label>What kind of information do you naturally notice and remember?</label> <br>
                            <input type="radio" name="question2" id ="question2" value="S" >Sensor
                            <input type="radio" name="question2" id ="question2" value="N" >Intuitive

                            <input type=button value="Help" href="#Question2"onClick="javascript:popUp('personalityhelp.php')"/>
                            <br>
                            <br>

                            <legend> Question Three </legend>
                            <label> How do you decide or come to conclusions?</label> <br>
                            <input type="radio" name="question3" id ="question3" value="T" >Thinker
                            <input type="radio" name="question3" id ="question3" value="F" >Feeler
                            <input type=button value="Help" href="#Question3"onClick="javascript:popUp('personalityhelp.php')"/>

                            <br>
                            <br>
                            <legend> Question Four: </legend>
                            <label>What kind of environment makes you the most comfortable?</label> <br>
                            <input type="radio" name="question4" id ="question4" value="J" >Judger
                            <input type="radio" name="question4" id ="question4" value="P" >Perceiver
                            <input type=button value="Help" href="#Question4"onClick="javascript:popUp('personalityhelp.php')"/>
                            <br>
                            <button class="next">next</button>
                            <br>
                            <input type="submit" name="submit" value="Get Results" />


                        </form>           


<?php
    if(!empty($_POST))
    {
        $errors = array();
        
        $question1 = $_POST['question1'];
        $question2 = $_POST['question2'];
        $question3 = $_POST['question3'];
        $question4 = $_POST['question4'];
        
        $result = $question1.$question2.$question3.$question4;
        
        
        if(count($errors) == 0)
    {
        $pers_quiz = new PersonalityQuiz($id);
	$pers_quiz->takeQuiz($result);
        
        $successes[] = lang("ACCOUNT_PERSONALITY_QUIZ",array($id));
        
    }
        
}
?>
<?php
if (isset($_POST ['submit'])) 
    {
 // INSERT STANDARD USERCAKE CONNECTION ** UNCOMMMENT 
 //require_once("models/config.php"); 

// global $mysqli, $db_table_prefix;
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question4 = $_POST['question4']; 
//$mysql_query = "INSERT INTO personalityresults(question1,question2,question3,question4) VALUES ('$question1','$quizresults','$question3','$question4')";
// ^^^^^^^^^^ inserts questions into database^^ move to different page ^^^^^^^
// 
//$questions = array('question1','question2','question3','question4');
echo"<center>";
echo " <div>";
session_start();
$Quizresults = $question1 . $question2 . $question3 . $question4;
$mysql= "INSERT INTO PersonalityQuiz ('quizresults') VALUES('$Quizresults')"; 
//$mysqli_query = "INSERT INTO ".$db_table_prefix." personality_results(s_id, date_completed, personality_result') VALUES (?, '".time()."',$Quizresults')";
//$stmt -> bind_param("is", $s_id,$Quizresults);
// ^^^^^^^^^^ QuizResults into into database^^^^^^^^^

$_SESSION['QuizResults'] = $Quizresults;
echo "<div id='results'> Your result is </div>";
echo "<div id='results'>$Quizresults </div>";
echo $_SESSION['score'];
;
echo "<br>";
if ($question1 == 'I' && $question2 == 'S' && $question3 == 'T' && $question4 == 'J') {
    echo "Best matches =  ESTJ, ISTJ, INTJ, ISTP, ESTP  ";
}
if ($question1 == 'I' && $question2 == 'S' && $question3 == 'T' && $question4 == 'P') {
    echo "Best matches = ESTJ, ISTJ, ENTJ, ESTP ";
}
if ($question1 == 'E' && $question2 == 'S' && $question3 == 'T' && $question4 == 'P') {
    echo "Best matches =ISTJ, ESTP, ISTP, ESFP ";
}
if ($question1 == 'E' && $question2 == 'S' && $question3 == 'T' && $question4 == 'J') {
    echo "Best matches =ISTJ, ESFJ, ISFJ, ENTJ, INTJ, ISTP";
}
if ($question1 == 'I' && $question2 == 'S' && $question3 == 'F' && $question4 == 'J') {
    echo "Best matches =ISFJ, ENFJ, ESTJ";
    echo "<br>";
    echo " Possible matches :ESFJ, ESTP, ISFP, INFJ, INFP, ESFP, ISTJ, ISFP ";
}
if ($question1 == 'I' && $question2 == 'S' && $question3 == 'F' && $question4 == 'P') {
    echo "Best matches =ESFP, ISFP";
    echo "<br>";
    echo " Possible matches : ESTP, ESTJ, ESFJ, ISTP, ENFJ, INFJ, INFP, ISFJ, ISTJ, ENFP";
}
if ($question1 == 'E' && $question2 == 'S' && $question3 == 'F' && $question4 == 'P') {
    echo "Best matches =ESTP, ISFP";
    echo "<br>";
    echo " Possible matches : ESTJ, ESFJ, ISFJ, ESFP, ENTP, ENFJ, INFJ, ENFP, INFP";
}
if ($question1 == 'E' && $question2 == 'S' && $question3 == 'F' && $question4 == 'J') {
    echo "Best matches =ESTJ, ENFP";
    echo "<br>";
    echo " Possible matches : ISFJ, ESFJ, ENFJ, INFP, ISFP, ISTP, ESFP";
}
if ($question1 == 'I' && $question2 == 'N' && $question3 == 'F' && $question4 == 'J') {
    echo "Best matches =ENTP, ENFP, INFJ, INFP, ENFJ";
}
if ($question1 == 'I' && $question2 == 'N' && $question3 == 'F' && $question4 == 'P') {
    echo "Best matches =ENFP, INFP, ENFJ, INFJ";
}
if ($question1 == 'E' && $question2 == 'N' && $question3 == 'F' && $question4 == 'P') {
    echo "Best matches =INFJ, INFP, ENFJ, ENFP, ESFJ";
}
if ($question1 == 'E' && $question2 == 'N' && $question3 == 'F' && $question4 == 'J') {
    echo "Best matches =ISFJ, ENFJ, ENTJ, INFJ, ENFP, INFP";
}
if ($question1 == 'I' && $question2 == 'N' && $question3 == 'T' && $question4 == 'J') {
    echo "Best matches =ESTJ, INTJ, ISTP, ENTJ";
}
if ($question1 == 'I' && $question2 == 'N' && $question3 == 'T' && $question4 == 'P') {
    echo "Best matches = ENTP, INTP, INTJ";
    echo "<br>";
    echo " Possible matches :ESTJ, ISTJ, ESTP, ENTJ, ENFJ, INFJ, ENFP, INFP ";
}
if ($question1 == 'E' && $question2 == 'N' && $question3 == 'T' && $question4 == 'P') {
    echo "Best matches = ENTP, INTP, INFJ";
    echo "<br>";
    echo " Possible matches :ESTJ, ISTJ, ESTP, ESFP, ENTJ, ENFP, INFP, ENFJ ";
}
if ($question1 == 'E' && $question2 == 'N' && $question3 == 'T' && $question4 == 'J') {
    echo "Best matches =  ESTJ, ISTP, ENTJ, ENFJ, INTJ";
}
    }
echo"</center>";
echo "</div>";
?> 


<footer>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-lg-12 text-center'>
                                        <p>Copyright &copy; PV Student Community 2014</p>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <br>
                        <br>  
                    </center>
                </div>  
            </div>  
          

    </center>
</body>
</html>


?>   


         





