<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account_Queries
 *
 * @author Mohamed
 */
include_once '../../Database/Database.php';
include_once '../../Query/Config.php';
class Account_Queries {
    private $DB;
    
    public function __construct() {
        $this->DB=new Database();
        
    }
    
    public function addNewAccount($initialBalance  , $acc_num){
        $data["ACC_NUM"] = $acc_num;
        $data["intial_balance"] = $initialBalance;
        $data["balance"] =$initialBalance;
        $table="account";
        return $result=$this->DB->insert($table, $data);
        
    }
    
    public function SearchAccount($acc_num){
        $query = "SELECT * FROM `account` WHERE ACC_NUM = $acc_num";
        $data=$this->DB->get_row($query);
        return $data;
    }
    
    public function SearchAccount2($acc_num){
        $query = "SELECT * FROM `account` , `customer` WHERE ACC_NUM = AC_NUM AND ACC_NUM =$acc_num";
        $data=$this->DB->get_row($query);
        return $data;
    }
    
    
    public function UpdateAccount($balance  , $acc_num){
        $data= $this->SearchAccount($acc_num);
        $data["ACC_NUM"] = $acc_num;
        $data["balance"] =$balance;
        
        $result=$this->DB->update("account", $data , "ACC_NUM ", $acc_num);
        if($result){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function ListAccounts(){
        $query="SELECT * FROM `account`";
        $result= mysqli_query($this->DB->link, $query);
        return $result;
    }
    
    public function DeleteAccount($acc_num){
        $query = "DELETE FROM `account` WHERE ACC_NUM = $acc_num";
        $data= mysqli_query($this->DB->link, $query);
        return $data;
    }
    
    public function ListAccounts2(){
        $query = "SELECT * FROM `account` , `customer` WHERE ACC_NUM = AC_NUM";
        $result = mysqli_query($this->DB->link, $query);
        return $result;
    }
}
