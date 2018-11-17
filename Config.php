<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define("host", "localhost");
define("DBname","bank");
define("username", "root");
define("Password", "");
$link=mysqli_connect(host, username, Password, DBname);

if($link){
    echo 'connected';
}
else{
    die("Connection Error");
}