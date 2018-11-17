<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author Mohamed
 */
include_once '../../classes/Person.php';
class Customer extends Person {
    public $martial_status;
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
                break;
            case 4:
                self::__construct4( $argv[0], $argv[1], $argv[2] ,$argv[3]);
                break;
            case 5:
                self::__construct5( $argv[0], $argv[1], $argv[2] ,$argv[3],$argv[4]  );

         
         }
    }
    
    public function __construct0(){
        
    }

    public function __construct5($gender, $phone, $name, $address , $martial_status) {
        parent::__construct($gender, $phone, $name, $address);
        $this->martial_status = $martial_status;
    }
}
