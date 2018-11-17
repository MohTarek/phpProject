<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author omar rasmy
 */
class Person {

        public $name;
        public $address;
        public $phoneNo;
        public $gender;
        public function __construct($gender,$phone,$name,$address) {
        
            $this->address=$address;
            $this->gender=$gender;
            $this->name=$name;
            $this->phoneNo=$phone;
            }
 
        
}
