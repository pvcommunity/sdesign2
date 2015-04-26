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

class Preferences{
    function __construct($id=NULL,$user=NULL) {
        if($id = NULL){
            $this->$user = $user;
            $this->id = fetchUserId($this->user);
        } else {
            $this->id = $id;
        }
    }
    
    function set_about_me($s_major,$s_self_stmt,$s_social,$s_sleeping,$s_cleaning)
    {
        //$this->id = $s_id;
        $this->major = $s_major;
        $this->self_stmt = $s_self_stmt;
        $this->social_habit = $s_social;
        $this->sleep_habit = $s_sleep;
        $this->cleaning_habit = $s_cleaning;

        $stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."about_me (
            s_id,
            s_major,
            s_self_stmt,
            s_social,
            s_sleep,
            s_cleaning
            )
            VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )");
        $stmt->bind_param("isssss", $this->id, $this->major, $this->self_stmt, $this->social_habit, $this->sleep_habit, $this->cleaning_habit);
        $stmt->execute();
        $inserted_id = $mysqli->insert_id;
        $stmt->close();
    }
    
    /* work on this one */
    function get_about_me($major,$self_stmt,$social,$sleep,$cleaning)
    {
        $this->major = $s_major;
        $this->self_stmt = $s_self_stmt;
        $this->social_habit = $s_social;
        $this->sleep_habit = $s_sleep;
        $this->cleaning_habit = $s_cleaning;

        $stmt = $mysqli->prepare("SELECT ".$db_table_prefix."about_me (
            s_id,
            s_major,
            s_self_stmt,
            s_social,
            s_sleep,
            s_cleaning
            )
            VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            )");
        $stmt->bind_param("isssss", $this->id, $this->major, $this->self_stmt, $this->social_habit, $this->sleep_habit, $this->cleaning_habit);
        $stmt->execute();
        $inserted_id = $mysqli->insert_id;
        $stmt->close();
    }
    
    function set_preferences($r_major,$r_major_imp,$r_social,$r_social_imp,$r_sleep,$r_sleep_imp,$r_cleaning,$r_cleaning_imp,$p_type,$p_type_imp,$p_rent,$p_rent_imp,$p_sharing,$p_sharing_imp,$p_smoking,$p_smoking_imp)
    {
        $this->r_major = array('ans'=>$r_major,'imp'=>$r_major_imp);
            $this->r_social = array('ans'=>$r_social,'imp'=>$r_social_imp);
            $this->r_sleep = array('ans'=>$r_sleep,'imp'=>$r_sleep_imp);
            $this->r_cleaning = array('ans'=>$r_cleaning,'imp'=>$r_cleaning_imp);
            $this->p_type = array('ans'=>$p_type,'imp'=>$p_type_imp);
            $this->p_rent = array('ans'=>$p_rent,'imp'=>$p_rent_imp);
            $this->p_sharing = array('ans'=>$p_sharing,'imp'=>$p_sharing_imp);
            $this->p_smoking = array('ans'=>$p_smoking,'imp'=>$p_smoking_imp);
            
            $stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."preferences (
                s_id,
                r_major,
		r_major_imp,
                r_social,
		r_social_imp,
                r_sleep,
		r_sleep_imp,
                r_cleaning,
		r_cleaning_imp,
                p_type,
		p_type_imp,
                p_rent,
		p_rent_imp,
                p_sharing,
		p_sharing_imp,
                p_smoking,
		p_smoking_imp
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
		?,
		?,
		?,
		?
                )");
            $stmt->bind_param('isisisisisisisisi', $this->id, $this->r_major['ans'], $this->r_major['imp'], $this->r_social['ans'], $this->r_social['imp'], $this->r_sleep['ans'], $this->r_sleep['imp'], $this->r_cleaning['ans'], $this->r_cleaning['imp'], $this->p_type['ans'], $this->p_type['imp'], $this->p_rent['ans'], $this->p_rent['imp'], $this->p_sharing['ans'], $this->p_sharing['imp'], $this->p_smoking['ans'], $this->p_smoking['imp']);
            $stmt->execute();
            $inserted_id = $mysqli->insert_id;
            $stmt->close();
    }
     
    /* work on this one also */
    function get_preferences($id)
    {
        $this->r_major = array('ans'=>$r_major,'imp'=>$r_major_imp);
            $this->r_social = array('ans'=>$r_social,'imp'=>$r_social_imp);
            $this->r_sleep = array('ans'=>$r_sleep,'imp'=>$r_sleep_imp);
            $this->r_cleaning = array('ans'=>$r_cleaning,'imp'=>$r_cleaning_imp);
            $this->p_type = array('ans'=>$p_type,'imp'=>$p_type_imp);
            $this->p_rent = array('ans'=>$p_rent,'imp'=>$p_rent_imp);
            $this->p_sharing = array('ans'=>$p_sharing,'imp'=>$p_sharing_imp);
            $this->p_smoking = array('ans'=>$p_smoking,'imp'=>$p_smoking_imp);
            
            $stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."preferences (
                s_id,
                r_major,
		r_major_imp,
                r_social,
		r_social_imp,
                r_sleep,
		r_sleep_imp,
                r_cleaning,
		r_cleaning_imp,
                p_type,
		p_type_imp,
                p_rent,
		p_rent_imp,
                p_sharing,
		p_sharing_imp,
                p_smoking,
		p_smoking_imp
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
		?,
		?,
		?,
		?
                )");
            $stmt->bind_param('isisisisisisisisi', $this->id, $this->r_major['ans'], $this->r_major['imp'], $this->r_social['ans'], $this->r_social['imp'], $this->r_sleep['ans'], $this->r_sleep['imp'], $this->r_cleaning['ans'], $this->r_cleaning['imp'], $this->p_type['ans'], $this->p_type['imp'], $this->p_rent['ans'], $this->p_rent['imp'], $this->p_sharing['ans'], $this->p_sharing['imp'], $this->p_smoking['ans'], $this->p_smoking['imp']);
            $stmt->execute();
            $inserted_id = $mysqli->insert_id;
            $stmt->close();
    }
    
}

class PersonalityQuiz{
    private $s_id;

    function __construct($id) {
        $s_id = $id;
    }
    
    function take_quiz($s_id,$question1,$question2,$question3,$question4,$result)
    {
        
    }
    
    function get_scores($id)
    {
        
    }
    
    function display_sugg_users($id)
    {
        
    }
}
