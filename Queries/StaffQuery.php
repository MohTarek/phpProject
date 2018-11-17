<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staff
 *
 * @author omar rasmy
 */
include_once '../../Database/Database.php';
class StaffQuery {
    private $DB;
    
    public function __construct() {
        $this->DB=new Database();
        
    }
    public function Login($username,$password){
        $username=$this->DB->clean($username);
        $password= $this->DB->clean($password);
        $query="SELECT * FROM `employee` "
                . "WHERE username="."'$username'"
                . " and password=$password";
            return $this->DB->get_row($query);
    }
}
