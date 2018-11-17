<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transaction
 *
 * @author omar rasmy
 */
include_once '../../Query/TransactionQuery.php';
class Transaction {

    private $money;
    public $typeOfTransaction;
    private $oldBalance;
    private $newBalance;
    private $query;



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
                self::__construct2( $argv[0], $argv[1], $argv[2] );
         }
    }
    
    public function __construct0(){
        $this->query=new TransactionQuery();
    }
    
  
    public function __construct2($money,$typeOfTransaction) {
        $this->query=new TransactionQuery();
        $this->money = $money;
        $this->typeOfTransaction=$typeOfTransaction;
        
    }

    public static function create(){
        $this->query=new TransactionQuery();
    } 
public function deposit($Customer_ID, Transaction $x){
    $Account_ID=$this->query->search_customerID($Customer_ID);
    if(count($Account_ID)>0){
     $balance=$this->query->Get_Balance($Account_ID['AC_NUM']);
     if(count($balance)>0){
         $x->oldBalance=$balance['balance'];
         $x->newBalance=$x->money+$balance['balance'];
         if($this->query->Set_balance($x->newBalance, $Account_ID['AC_NUM'])){
         if($this->query->Set_Transaction($x->typeOfTransaction, $Customer_ID, $x->oldBalance, $x->newBalance, $x->money)){
             return true;
         }
         else {
             return false;
         }
     }
     else{
         return -2;
     }
        
    }
}

 else {
    return -3;    
}

         }
public function withdrow($Customer_ID, Transaction $x){
    $Account_ID=$this->query->search_customerID($Customer_ID);
    if(count($Account_ID)>0){
     $balance=$this->query->Get_Balance($Account_ID['AC_NUM']);
     if(count($balance)>0){
         $x->oldBalance=$balance['balance'];
         if($balance['balance']<$x->money){
             return -1;
         }
 else {
         $x->newBalance=$balance['balance']-$x->money;
         if($this->query->Set_balance($x->newBalance, $Account_ID['AC_NUM'])){
             
         if($this->query->Set_Transaction($x->typeOfTransaction, $Customer_ID, $x->oldBalance, $x->newBalance, $x->money)){
             return true;
         }
         else {
             return false;
         }
     }
 else {
         return -2;    
     }
        
    }
    
         }
}
 else {
    return -3;    
}

         }
public function Transfer($Customer_TO_ID,$Customer_From_ID, Transaction $x,Transaction $y){
    $Account_ID=$this->query->search_customerID($Customer_TO_ID);
    $Account_ID2=$this->query->search_customerID($Customer_From_ID);
    if(count($Account_ID)>0 && count($Account_ID2)>0){
     $balance=$this->query->Get_Balance($Account_ID['AC_NUM']);
     $balance2=$this->query->Get_Balance($Account_ID2['AC_NUM']);
     if(count($balance)>0 && count($balance2)>0){
         $x->oldBalance=$balance['balance'];
         $y->oldBalance=$balance2['balance'];
         if($balance2['balance']<$y->money){
             return -1;
         }
 else {
         $x->newBalance=$y->money+$balance['balance'];
         $y->newBalance=$balance2['balance']-$y->money;
         if($this->query->Set_balance($y->newBalance, $Account_ID2['AC_NUM']) && $this->query->Set_balance($x->newBalance, $Account_ID['AC_NUM'])){
             
         
         if($this->query->Set_Transaction($x->typeOfTransaction, $Customer_TO_ID, $x->oldBalance, $x->newBalance, $x->money) &&$this->query->Set_Transaction($y->typeOfTransaction, $Customer_From_ID, $y->oldBalance, $y->newBalance, $y->money)){
             return true;
         }
         else {
             return false;
         }
     }
     else {
         return -2;
     }
        
     }
    
         }
}

 else {
    return -3;    
}
}

public function withdrow_name($Customer_Name, Transaction $x){
$Customer_ID=$this->query->search_customer($Customer_Name);
    if(count($Customer_ID)>0){
    $Account_ID=$this->query->search_customerID($Customer_ID['CUS_ID']);
        if(count($Account_ID)>0){
     $balance=$this->query->Get_Balance($Account_ID['AC_NUM']);
     if(count($balance)>0){
         $x->oldBalance=$balance['balance'];
         if($balance['balance']<$x->money){
             return -1;
         }
 else {
         $x->newBalance=$balance['balance']-$x->money;
         if($this->query->Set_balance($x->newBalance, $Account_ID['AC_NUM'])){
         if($this->query->Set_Transaction($x->typeOfTransaction, $Customer_ID, $x->oldBalance, $x->newBalance, $x->money)){
             return true;
         }
         else {
             return false;
         }
     }
 else {
         return -2;    
     }
        
    }
    
         }
}
    }
    
 else {
    return -3;    
}
         }
public function deposit_name($Customer_Name, Transaction $x){
    $Customer_ID=$this->query->search_customer($Customer_Name);
    if(count($Customer_ID)>0){
    $Account_ID=$this->query->search_customerID($Customer_ID['CUS_ID']);
        if(count($Account_ID)>0) {
     $balance=$this->query->Get_Balance($Account_ID['AC_NUM']);
     if(count($balance)>0){
         $x->oldBalance=$balance['balance'];
         $x->newBalance=$x->money+$balance['balance'];
         if($this->query->Set_balance($x->newBalance, $Account_ID['AC_NUM'])){
         if($this->query->Set_Transaction($x->typeOfTransaction, $Customer_ID['CUS_ID'], $x->oldBalance, $x->newBalance, $x->money)){
             return true;
         }
         else {
             return false;
         }
     }
 else {
         return -2;    
     }
     
         }
        
    }
}

 else {
    return -3;    
}
}
public function ListAllTransactio(){
    return $this->query->ListTransaction();
    
}
public function ListAllDayTransaction($Cust_ID){
    $Account_ID=$this->query->search_customerID($Cust_ID);
    if(count($Account_ID)>0){
        $date= date("Y-m-d");
        $data=$this->query->ListDayTransaction($Account_ID['AC_NUM']);
        $date2;
$x=array();
        $m=0;   
        $count=0;
    for($i=0;$i<count($data);$i++){
        list($date2)=split(" ",$data[$i][3]);
        if($date==$date2){
            $x[$m]=$i;
            $m++;
            }
 else {
            unset($data[$i]);
 }
 $count++;
    }
    $data['count']=$x;
    return $data;
    
    }
}


         }

