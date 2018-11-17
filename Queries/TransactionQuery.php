<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransactionQuery
 * 
 * @author omar rasmy
 */
include_once '../../Database/Database.php';
class TransactionQuery {
    private $DB;
    private $Balance;
    private $table_account;
    private $table_transaction;
    public function __construct() {
                $this->DB=new Database();
                $this->table_account="account";
                $this->table_transaction="make_transaction";
    }
    public function search_customer($name){
        $query="SELECT `CUS_ID` FROM `customer` WHERE name=$name";
        return $this->DB->get_row($query);
    }
        public function search_customerID($id){
        $query="SELECT `AC_NUM` FROM `customer` WHERE CUS_ID=$id";
        return $this->DB->get_row($query);
    }
public function Get_Balance($Cust_NUM){
    // $AC_NUM=$this->search_customerID($Cust_NUM);   
    $query="SELECT `balance` FROM `account` WHERE ACC_NUM=$Cust_NUM";    
    return $this->DB->get_row($query);
 }
 public function Update_Account($balance,$Cust_NUM){
     $x="ACC_NUM";
     $AC_NUM=$this->search_customerID($Cust_NUM);   
     $data=array(
         "balance"=>$balance
     );
     if($this->DB->update($this->table_account,$data,$x=$AC_NUM['AC_NUM'])){
         return true;
     }
     else{
         return false;
     }
    
 }
 public function search_transaction($Trans_Name){
  $Trans_Name=$this->DB->clean($Trans_Name);
  $query="SELECT `TRANS_ID` FROM `transaction` WHERE trans_type LIKE '$Trans_Name'" ;
  return $this->DB->get_row($query);
 }

 public function Set_Transaction($Trans_Name,$Cust_NUM,$OldBalance,$NewBalance,$money){
     $AC_NUM=$this->search_customerID($Cust_NUM);
     $Trans_ID=$this->search_transaction($Trans_Name);
     $data=array(
            "TRANS_ID"=>$Trans_ID['TRANS_ID'],
            "AC_NUM"=>$AC_NUM['AC_NUM'],
            "old_balance"=>$OldBalance,
            "new_balance"=>$NewBalance,
            "money"=>$money
        );
        if($this->DB->insert($this->table_transaction, $data)){
            return true;
        }
        else{
            return false;
        }
        
    }

  public function Set_balance($balance,$AC_NUM){
     $x="ACC_NUM"; 
      $data=array(
          "balance"=>$balance
      );
      if($this->DB->update($this->table_account, $data, $x,$AC_NUM)){
          return true;
      }
      else{
          return false;
      }
  }
    public function ListTransaction(){
        $query= "SELECT * FROM `make_transaction`";
        return mysqli_fetch_all($this->DB->database_query($query));
    }
  public function ListDayTransaction($ID){
        $query= "SELECT * FROM `make_transaction` WHERE AC_NUM=$ID";
        return mysqli_fetch_all($this->DB->database_query($query));
    }    
        
    
        }
