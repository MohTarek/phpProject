<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author Mohamed
 */
include_once '../../Query/Account_Queries.php';
include_once '../../Query/Customer_queries.php';
include_once '../../classes/Customer.php';
include_once '../../classes/Transaction.php';
class Account {
    public  $intialBalance;    
    public  $Balance=0;
    public $acc_num;
    public $Acc_queries;
    public $Cus_queries;
    public $transaction;
    

    function __construct() {
        $argv = func_get_args();
        switch( func_num_args() ) {
            case 0;
                self::__construct0();
                break;
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2( $argv[0], $argv[1] );
                break;
            case 3:
                self::__construct3( $argv[0], $argv[1], $argv[2] );
                
         }
    }
    
    public function __construct0(){
        $this->transaction=new Transaction();
        $this->Acc_queries = new Account_Queries();
        $this->Cus_queries = new Customer_queries();
    }
    
    public function __construct1($acc_num){
        $this->transaction=new Transaction();
        $this->acc_num = $acc_num;
        $this->Acc_queries = new Account_Queries();
        $this->Cus_queries = new Customer_queries();
    }

    public function __construct2($initialBalance  , $acc_num){
        $this->transaction=new Transaction();
        $this->intialBalance = $initialBalance;
        $this->Balance = $initialBalance;
        $this->acc_num = $acc_num;
        $this->Acc_queries = new Account_Queries();
        $this->Cus_queries = new Customer_queries();
    }
    

    public function search_customer($id){
        return $this->Acc_queries->SearchAccount2($id);
        /*$result2= $this->Cus_queries->SearchCustomer($this->acc_num);
        
        $result["CUS_ID"] = $result2["CUS_ID"];
        $result["name"] = $result2["name"];
        $result["gender"] = $result2["gender"];
        $result["martial_status"] = $result2["martial_status"];
        $result["phone"] = $result2["phone"];
        $result["address"] = $result2["address"];
        $result["ACC_NUM"] = $result1["ACC_NUM"];
        $result["initial_balance"] = $result1["initial_balance"];
        $result["balance"] = $result1["balance"];
        var_dump($result);*/
    }

        public function add_customer($gender, $phone, $name, $address , $martial_status,$InitialBalance,$ACC_NUM){
        $customer = new Customer($gender, $phone, $name, $address , $martial_status);
       
        if($this->Acc_queries->addNewAccount($InitialBalance,$ACC_NUM)==1){
        return $this->Cus_queries->add_new_customer($customer , $ACC_NUM);
        }
 else {
            return false;
 }
        }
    public function List_customers(){
        $result=$this->Acc_queries->ListAccounts2();
        
        /*echo '<br>';
        print_r($result1);
        echo '<br>';
        $row = mysqli_fetch_assoc($result1);
        echo '<br>';
        print_r($row);
        echo '<br>';
        print_r($result2);
        echo mysqli_num_rows($result2);
        for ($i=0 ; $row1= mysqli_fetch_assoc($result1) and $row2= mysqli_fetch_assoc($result2) ; $i++){
            echo '<br>';
            print_r($row1);
            echo '<br>';
            print_r($row2);
            
            
            $result[$i] = array_merge($row1 , $row2);   
        }*/
        
        return $result;
    }
    
    
    public function delete_customer($Acc_Num){
        $addACC=$this->Acc_queries->DeleteAccount($Acc_Num);
        if($addACC){
            return $this->Cus_queries->DeleteCustomer($Acc_Num);
        }
        else {
            return FALSE;
        }
    }
    
    public function update_customer($gender, $phone, $name, $address , $martial_status , $acc_num , $balance){
        $customer = new Customer($gender, $phone, $name, $address , $martial_status);
        $addACC=$this->Acc_queries->UpdateAccount($balance  , $acc_num);
        if($addACC){
            return $this->Cus_queries->UpdateCustomer($customer , $acc_num);
        }
        else {
            
            return FALSE;
        }
    }
    
    public function  Transaction($Customer_ID, Transaction $x){
        if($x->typeOfTransaction=="deposit"){
            return $this->transaction->deposit($Customer_ID,$x);
         }  
        elseif ($x->typeOfTransaction=="withdrow") {
             return $this->transaction->withdrow($Customer_ID,$x);
        }
    
    else{
        return 0;
    }
    }
    
    public function Transfer($Customer_TO_ID,$Customer_From_ID, Transaction $x,Transaction $y){
        if($x->typeOfTransaction=="TransferFrom" && $y->typeOfTransaction=="TransferTo"){
                return $this->transaction->Transfer($Customer_TO_ID, $Customer_From_ID, $y, $x);   
           
        }
        else if($x->typeOfTransaction=="TransferTo" && $y->typeOfTransaction=="TransferFrom"){
            return $this->transaction->Transfer($Customer_TO_ID, $Customer_From_ID, $x, $y);
        
            
        }
        else{
            return 0;
        }
        
    }
    
        }
