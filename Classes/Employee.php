<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author win10
 */
include_once '../../Query/EmployeeQuery.php';
include_once '../../classes/Staff.php';
include_once '../../classes/Account.php';
class Employee extends Staff{
    
    public $pos_id; 
    public $b_id;
    public $doj;
    public $emp_id;       
    private $empl;
            
    public function __construct() {
       
        $this->empl = new EmployeeQuery();
        
    }
    public static function create($gender, $phone, $name, $address, $username, $password,$salary,$emp_id,$doj,$b_id,$pos_id){
      parent::__construct($gender, $phone, $name, $address, $username, $password);  
        $this->b_id = $b_id;
        $this->doj = $doj;
        $this->emp_id = $emp_id;
        $this->pos_id = $pos_id;
        $this->empl = new EmployeeQuery();
                
    }

        public function deleteEmp($ID){
            return $this->empl->deleteEmp($ID);
    }
    public function  searchEmpByID($ID){
        return $this->empl->searchEmpByID($ID);   
    }

    public function searchEmpByUsername($username){
        return $this->empl->searchEmpByUsername($username);
    }
    
    public function listEmployees(){
        return $this->empl->listEmployees();
    }
    
    public function updateEmp($username,$gender,$phone,$name,$password,$b_id,$pos_id,$adress,$salary,$emp_id){
        return $this->empl->updateEmp($username, $gender, $phone, $name, $password, $b_id, $pos_id, $adress, $salary,$emp_id);
    }
    
    public function setEmp($username,$gender,$phone,$name,$password,$b_id,$pos_id,$adress,$salary){
        return $this->empl->setEmp($username, $gender, $phone, $name, $password, $b_id, $pos_id, $adress, $salary);
    }
    
  public function add_customer($gender, $phone, $name, $address , $martial_status){
      $customer=new Account();
      return $customer->add_customer($gender, $phone, $name, $address, $martial_status);
  }
    public function delete_customer($Acc_Num){
        $customer=new Account();
        return $customer->delete_customer($Acc_Num);
    }
    
    public function SearchCustomerID($id){
        $customer=new Account();
        return $customer->search_customer($id);
    }
    
     public function ListCustomer(){
         return $this->empl->ListCustomer();
     }
    
    public function update_customer($gender, $phone, $name, $address , $martial_status , $acc_num , $balance){
       $customer=new Account();
       return $customer->update_customer($gender, $phone, $name, $address, $martial_status, $acc_num, $balance);
    }
     public function SearchCustomerName(){
         return  $this->empl->SearchCustomerName();
     }
    
    public function GetBalance($Cust_NUM){
        return $this->empl->GetBalance($Cust_NUM);
    }
    
    public function UpdateAccount($balance,$Cust_NUM){
        return $this->empl->UpdateAccount($balance, $Cust_NUM);
    }
    
    public function Search_Transaction($Trans_Name){
        return $this->empl->Search_Transaction($Trans_Name);
    }
    
    public function Set_Transaction($Trans_Name,$Cust_NUM,$OldBalance,$NewBalance,$money){
        $this->empl->Set_Transaction($Trans_Name, $Cust_NUM, $OldBalance, $NewBalance, $money);
    }
    
    public function Set_balance($balance,$AC_NUM){
        $this->empl->Set_balance($balance, $AC_NUM);
    }
    public function Customer_Transaction($Customer_ID, Transaction $x){
        $account=new Account();
    
        return $account->Transaction($Customer_ID, $x);
     
    }
    public function Customer_Transfer($Customer_TO_ID,$Customer_From_ID, Transaction $x,Transaction $y){
        $account=new Account();
        return $account->Transfer($Customer_TO_ID, $Customer_From_ID, $x, $y);
    }
}













