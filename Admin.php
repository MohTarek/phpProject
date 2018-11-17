<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author omar rasmy
 */
include_once '../../classes/Employee.php';
class Admin extends Staff {
    public function __construct() {
    }
    
    public function setEmployee($username,$gender,$phone,$name,$password,$b_id,$pos_id,$adress,$salary){
        $employee = new Employee();
        if($employee->setEmp($username, $gender, $phone, $name, $password, $b_id, $pos_id, $adress, $salary))
        {
            return true;
        }
        else
        {
            return false;
        }
  
}
    public function updateEmployee($username,$gender,$phone,$name,$password,$b_id,$pos_id,$adress,$salary,$emp_id)
    {
        $employee = new Employee();
        if($employee->updateEmp($username, $gender, $phone, $name, $password, $b_id, $pos_id, $adress, $salary,$emp_id))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function listEmployees()
    {
        $employee = new Employee();
        return $employee->listEmployees();
    }
    public function searchEmpByID($ID){
        $employee = new Employee();
        return $employee->searchEmpByID($ID);
        }

    public function searchEmployee($username){ 
        $employee = new Employee();
        return $employee->searchEmpByUsername($username);
    }
    
    public function deleteEmployee($ID)
    {
        $employee = new Employee();
        return $employee->deleteEmp($ID);
        
    }
               
}
