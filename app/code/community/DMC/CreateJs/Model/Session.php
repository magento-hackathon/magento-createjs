<?php

class DMC_CreateJs_Model_Session extends Varien_Object{

    private static $isActive = false;

    public static function dispatchIsActive( $observer ){

        if( isset( $_GET['createjs'] ) && $_GET['createjs'] == true ){
            self::$isActive = true;
        } else {

        }

    }

    public static function getIsActive(){
        return self::$isActive;
    }


}
