<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer_queries
 *
 * @author Mohamed
 */
include_once '../../Database/Database.php';
class Customer_queries {
    private $DB;
    
    public function __construct() {
        $this->DB=new Database();
        
    }
    
    public function add_new_customer($customer ,$ACC_NUM ){
        $data["name"]=$customer->name;
        $data["gender"]=$customer->gender;
        $data["martial_status"] = $customer->martial_status;
        $data["AC_NUM"] = $ACC_NUM;
        $data["phone"]=$customer->phoneNo;
        $data["address"]=$customer->address;
        if($this->DB->insert("customer", $data)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function SearchCustomer($acc_num){
        $query = "SELECT * FROM `customer` WHERE AC_NUM = $acc_num";
        $data=$this->DB->get_row($query);
        return $data;
    }
    
    public function UpdateCustomer($customer , $account){
        $data["name"]=$customer->name;
        $data["gender"]=$customer->gender;
        $data["martial_status"] = $customer->martial_status;
        $data["AC_NUM"] = $account;
        $data["phone"]=$customer->phoneNo;
        $data["address"]=$customer->address;
        if($this->DB->update("customer", $data , "AC_NUM",$account)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    
    public function ListCustomers(){
        $query="SELECT * FROM `customer`";
        $result= mysqli_query($this->DB->link, $query);
        return $result;
    }
    
    public function DeleteCustomer($acc_num){
        $query = "DELETE FROM `customer` WHERE AC_NUM = $acc_num";
        $data= mysqli_query($this->DB->link, $query);
        return $data;
    }
}
