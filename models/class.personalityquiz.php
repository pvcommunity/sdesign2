<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author Ashley
 */
//require_once 'class.newuser.php';


class Preferences extends Student{
    public $major;
    public $major_imp;
    public $social;
    public $social_imp;
    public $sleep;
    public $sleep_imp;
    public $clean;
    public $clean_imp;
    public $p_type;
    public $p_rent;
    public $p_sharing;
    public $p_smoking;
    protected $s_id;
    public $self_stmt;

    function __construct($id) 
    {
            $this->s_id = $id;
    }
    
    function set_preferences($s_id,$self_stmt,$major,$major_imp,$social,$social_imp,$sleep,$sleep_imp,$clean,$clean_imp,$p_type,$p_rent,$p_sharing,$p_smoking)
    {
        global $mysqli,$db_table_prefix;
        
        $this->self_stmt = $self_stmt;
        $this->major = $major;
        $this->major_imp = $major_imp;
        $this->social = $social;
        $this->social_imp = $social_imp;
        $this->sleep = $sleep;
        $this->sleep_imp = $sleep_imp;
        $this->clean = $clean;
        $this->clean_imp = $clean_imp;
        $this->p_type = $p_type;
        $this->p_rent = $p_rent;
        $this->p_sharing = $p_sharing;
        $this->p_smoking = $p_smoking;
     
        $stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."preferences (
            s_id,
            self_stmt,
            major,
            major_imp,
            social,
            social_imp,
            sleep,
            sleep_imp,
            cleaning,
            cleaning_imp,
            p_type,
            p_rent,
            p_sharing,
            p_smoking
            )
            VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )");
        $stmt->bind_param("issisisisissss", $this->s_id, $this->self_stmt, $this->major, $this->major_imp, $this->social, $this->social_imp, $this->sleep, $this->sleep_imp, $this->clean, $this->clean_imp, $this->p_type, $this->p_rent, $this->p_sharing, $this->p_smoking);
        $stmt->execute();
        $inserted_id = $mysqli->insert_id;
        $stmt->close();
    }
    
    /*function get_preferences($id)
    {
        global $mysqli,$db_table_prefix;
        
        $stmt = $mysqli->prepare("SELECT 
                s_id,
                major,
                major_imp,
                social,
                social_imp,
                sleep,
                sleep_imp,
                cleaning,
                cleaning_imp
                FROM ".$db_table_prefix."
                WHERE 
                s_id = ?
                LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $major, $major_imp, $social, $social_imp, $sleep, $sleep_imp, $clean, $clean_imp);
        while ($stmt->fetch()){
            $row = array('id'=>$id, 'major'=>$major, 'major_imp'=>$major_imp, 'social'=>$social, 'social_imp'=>$social_imp,
                'sleep'=>$sleep, 'sleep_imp'=>$sleep_imp, 'clean'=>$clean, 'clean_imp'=>$clean_imp);
        }
        $stmt->close();
        return ($row);
    }*/
}

class PersonalityQuiz extends Preferences
{
    protected $s_id;
    protected $question1;
    protected $question2;
    protected $question3;
    protected $question4;
    protected $result;

    function __construct($id)
    {
        $this->s_id = $id; 
    }
    
    function takeQuiz($result)
    {
        /*$this->question1 = $q1;
        $this->question2 = $q2;
        $this->question3 = $q3;
        $this->question4 = $q4;*/
        
        $this->result = $result;//$this->question1.$this->question2.$this->question3.$this->question4;
        
        global $mysqli,$db_table_prefix;
            
            $stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."personality_quiz (
                s_id,
                date_completed,
                personality_result
                )
                VALUES(
                ?,
                ".time().",
                ?
                )");
            $stmt->bind_param("is",$this->s_id,$this->result);
            $stmt->execute();
            $inserted_id = $mysqli->insert_id;
            $stmt->close();    
    }
    
    function gather_user_scores()
    {
        
    }
}