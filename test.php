<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../classes/Account.php';
include_once '../classes/Customer.php';
include_once '../Query/Account_Queries.php';
/*if(isset($_POST['login'])){
    /*$name=$_POST["name"];
    $gender=$_POST["gender"];
    $martial_status=$_POST["mar_stat"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $acc_num=$_POST["acc_num"];
    $initial_balance=$_POST["initial_balance"];
    $account = new Account($_POST["search"]);
    //$result=$account->add_customer($gender, $phone, $name, $address, $martial_status);
    $account->search_customer();
    if($result){
        header("location: home.php");
    }
    else{
        echo 'falid to add';
    }
    
    
}*/
    $account = new Account(1000);
    $row=$account->search_customer();
    echo '<table border = 3px>'
    . '<tr> '
    . '<td>First Name</td>'
    . '<td>Last Name</td>'
    . '<td>UserTypeID</td>'
    . '<td>UserTypeID</td>'
    . '<td>UserTypeID</td>'
    . '<td>UserTypeID</td>'
    . '<td>UserTypeID</td>'
    . '</tr>';

   
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['gender'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td>' . $row['martial_status'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['ACC_NUM'] . '</td>';
    echo '<td>' . $row['balance'] . '</td>';
    
    echo '</tr>';

echo '</table>';

?>

<html>
    <head>
        
    </head>
    <body>
        <!--<form method="post">
            Name:           <input type="text" name="name" value="" required><br>
            Gender:         <input type="text" name="gender" value="" required><br>
            Martial Status: <input type="text" name="mar_stat" value="" required><br>
            phone:          <input type="text" name="phone" value="" required><br>
            Address:        <input type="text" name="address" value="" required><br>
            account Number: <input type="text" name="acc_num" value="" required><br>
            Initial balance:<input type="text" name="initial_balance" value="" required><br>
            
            <input type="submit" name="login" value="Submit" required><br>
        </form>
        
        <br><br><br>
        <form method="post">
            search:           <input type="text" name="search" value="" required><br>
            <input type="submit" name="login" value="Submit" required><br>
        </form>-->
    </body>
</html>