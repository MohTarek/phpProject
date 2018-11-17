<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../classes/Transaction.php';
$trans=new Transaction();
$data=$trans->ListAllDayTransaction(6);
echo $data[0][4];
echo "<br>".$data['count'][0];
echo "<br>".$data['count'][1];
?>