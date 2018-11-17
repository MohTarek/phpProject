<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeQuery
 *
 * @author win10
 */
include_once '../../classes/Customer.php';
include_once '../../Query/TransactionQuery.php';
include_once '../../Database/Database.php';
class EmployeeQuery {
 private $DB;
 private $table_account;
 public $customer;
 public $trans;
 public function __construct() {
        $this->DB=new Database();
        $this->table_account = "employee";
        $this->customer=new Customer();
        $this->Trans = new TransactionQuery();
    }    

    public function deleteEmp($ID){
       // $x=$this->searchEmpByUsername($username);
        $query = "DELETE FROM `employee` WHERE EMP_ID=$ID ";
        return $this->DB->database_query($query);
    }
    
    public function searchEmpByID($ID){
        $query = "SELECT * FROM `employee` WHERE EMP_ID=$ID ";
        return $this->DB->get_row($query);
    }
        public function searchOneEmpByID($ID){
        $query = "SELECT `EMP_ID` FROM `employee` WHERE EMP_ID=$ID ";
        return $this->DB->get_row($query);
    }
        public function searchEmpByUsername($username){
        $query = "SELECT `EMP_ID` FROM `employee` WHERE username=$username";
        return $this->DB->get_row($query);
    }
    
    
    public function listEmployees(){
        $query = "SELECT * FROM `employee`";
        return mysqli_fetch_all($this->DB->database_query($query));
    }
    
    public function updateEmp($username,$gender,$phone,$name,$password,$b_id,$pos_id,$adress,$salary,$EMP_ID){
       
        $x="EMP_ID";
        if($epm = $this->searchOneEmpByID($EMP_ID)){    
            $data = array(
            "gender"=>$gender,
            "username"=>$username,
            "phone"=>$phone,
            "name"=>$name,
            "password"=>$password,
            "B_ID"=>$b_id,
            "POS_ID"=>$pos_id,
            "address"=>$adress,
            "salary"=>$salary
        );
         if($this->DB->update($this->table_account,$data,$x,$epm['EMP_ID'])){
         return true;
        }
        else{
            return false;
        }
         }
     else{
         return -1;
     }
    }
    
    
    public function setEmp($username,$gender,$phone,$name,$password,$b_id,$pos_id,$adress,$salary){
        $data = array(
            "gender"=>$gender,
            "username"=>$username,
            "phone"=>$phone,
            "name"=>$name,
            "password"=>$password,
            "B_ID"=>$b_id,
            "POS_ID"=>$pos_id,
            "address"=>$adress,
            "salary"=>$salary
        );
     if($this->DB->insert($this->table_account, $data)){
            return true;
        }
        else{
            return false;
        }    
    }
    
    
    /*
    public function AddCustomer(){
        
        $this->customer->addNewCustomer($gender, $phone, $martial_status, $name, $CUS_ID, $AC_NUM);
    }
    
    public function DeleteCustomer(){
        
        $this->customer->deleteCustomers($CUS_ID);
    } 
    
    public function SearchCustomerID(){
        
        $this->customer->searchCustomers($CUS_ID);
    }
    
    public function ListCustomer(){
        
        $this->customer->listAllCustomers();
    }
    
    public function UpdateCustomer(){
        
        $this->customer->UpdateCustomer($gender, $phone, $martial_status, $name, $CUS_ID, $AC_NUM);
    }
    
    public function SearchCustomerName(){
        
        $this->customer->searchCustomersname($name);
    }
    
    public function GetBalance($Cust_NUM) {
    
        $this->trans->Get_Balance($Cust_NUM);
    }
    
    public function UpdateAccount($balance,$Cust_NUM) {
        
        $this->trans-> Update_Account($balance,$Cust_NUM);
    }
    
    public function Search_Transaction($Trans_Name) {
        
        $this->trans-> Search_Transaction($Trans_Name);
    }
    
    public function Set_Transaction($Trans_Name,$Cust_NUM,$OldBalance,$NewBalance,$money){
        
         $this->trans-> Set_Transaction($Trans_Name,$Cust_NUM,$OldBalance,$NewBalance,$money);
    }
    
    public function Set_balance($balance,$AC_NUM){
        
         $this->trans-> Set_balance($balance,$AC_NUM);
    }
    
    
    
    */
    
    
    
    }
    
    
    
    
    
    
     






















