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
include_once '../../Query/StaffQuery.php';
include_once '../../classes/Person.php';
class Staff extends Person {
    protected $username;
    private $staffQuery;
    protected $password;
    public function __construct($gender, $phone, $name, $address,$username,$password) {
        parent::__construct($gender, $phone, $name, $address);
        $this->username=$username;
        $this->password=$password;
        $this->staffQuery=new StaffQuery();
    }
    public function login($username,$password){
        $data=$this->staffQuery->Login($username,$password);
       if(count($data)>0){
        if($data['POS_ID']==1){
            $_SESSION['POS_ID']=1;
          $_SESSION['name']=$data['name'];
          $_SESSION['gender']=$data['gender'];
          $_SESSION['address']=$data['address'];
          $_SESSION['salary']=$data['salary'];
          $_SESSION['phone']=$data['phone'];
          $_SESSION['B_ID']=$data['B_ID'];
          $_SESSION['DOJ']=$data['DOJ'];
          return 1;
        }
        else if($data['POS_ID']==2){
          $_SESSION['POS_ID']=2;
          $_SESSION['name']=$data['name'];
          $_SESSION['gender']=$data['gender'];
          $_SESSION['address']=$data['address'];
          $_SESSION['salary']=$data['salary'];
          $_SESSION['phone']=$data['phone'];
          $_SESSION['B_ID']=$data['B_ID'];
          $_SESSION['DOJ']=$data['DOJ'];
          return 2;   
        }
 else {
            return false;
 }
    }
    
        }
}
