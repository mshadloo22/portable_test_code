<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helper;
use App\config\constants;

/**
 * Description of Debug_helper
 *
 * @author admin
 */
class Debug_helper {
    //put your code here
    private static $logFile;
    private static $logFile2;
    private static $errFile;
    //private static $config;
    
    
    
    
    
    
    // Initialise helper object
    public function __construct() 
    {
        // initialisation logic here 
        self::$logFile = base_path() . '/web/log/log.txt';
        self::$logFile2 = base_path() . '/web/log/log2.txt';
        self::$errFile = base_path() . '/web/log/error.txt';
        
    }
    
    private static function init() 
    {
        
        if (!isset(self::$logFile)) {
            self::$logFile = base_path() . '/web/log/log.txt';
        }
        if (!isset(self::$errFile)) {
            self::$errFile = base_path() . '/web/log/error.txt';
        }        
        
        if (!isset(self::$logFile2)) {
            self::$logFile2 = base_path() . '/web/log/log2.txt';
        }
        
//        if(!isset(self::$config)){
//            $CI =& get_instance();
//            $CI->load->helper('configini');
//            self::$config = new ConfigIni();
//        }
    }

    /**
     *  debugMsg
     *  --------
     *  Logs message to debug log and optionally (2nd param) prepends date/time.
     *
     *  returns nothing
     */
    public static function debugMsg() 
    {

        // Initialise filename if not already set
        self::init();
        $args = func_get_args();
        $num_args = func_num_args();
        switch ($num_args) {
            case 1:
                self::debug_msg($args[0], false);
                break;
            case 2:
                self::debug_msg($args[0], $args[1]);
                break;
            default:
                self::debug_msg("Logging Error! Illegal number of debugMsg arguments of '$num_args'\n", true);
        }
    }

    private static function debug_msg(
        $msg, 
        $prepend_date=true) 
    {
        //$relative_to_root = true;
        //date_default_timezone_set('Australia/Melbourne'); 
          date_default_timezone_set(timeformat);
        if ($prepend_date) {
            file_put_contents(self::$logFile, date("Y-m-d H:i:s "), FILE_APPEND);
        }

        file_put_contents(self::$logFile, $msg, FILE_APPEND);
    }
    
    /**this function write to portal2.log if config.ini parameter debug_user=current user or debug_user=All(if you set your debug_user in config.ini to all it shows all people debug message)
     * 
     * @param type $msg
     * @param type $prepend_date
     */
    public static function debug_msg2(
        $msg,
        $prepend_date=true,
        $debug_user=0) 
    {
        //$relative_to_root = true;
        date_default_timezone_set(timeformat); 
        self::init();
        if (debug_user == $debug_user || 
            strtolower(debug_user) == "all") {
            
            file_put_contents(self::$logFile2, PHP_EOL .$msg.($prepend_date?'  <<###'.date("H:i:s d/m/Y").' ###>>':"<<##End##>>"), FILE_APPEND);
        }
    }
    
    /**this function write to portal2.log if config.ini parameter debug_user=current user or debug_user=All(if you set your debug_user in config.ini to all it shows all people debug message)
     * 
     * @param type $msg
     * @param type $prepend_date
     */
    public static function debug_msg2_withDebugnumber(
        $msg,
        $debug_user='all') 
    {
        //$relative_to_root = true;
        date_default_timezone_set(timeformat); 
        self::init();
        if (debug_user == $debug_user || 
            strtolower(debug_user == "all")) {
            
            file_put_contents(self::$logFile2, PHP_EOL .$msg.('  <<###'.date("H:i:s d/m/Y").' ###>>'), FILE_APPEND);
        }
    }

    /**
     *  debugMsg
     *  --------
     *  Logs message to debug log and optionally (2nd param) prepends date/time.
     *
     *  returns nothing
     */
    public static function errorMsg() 
    {

        // Initialise filename if not already set
        self::init();
        $args = func_get_args();
        $num_args = func_num_args();
        switch ($num_args) {
            case 1:
                self::error_msg($args[0], false);
                break;
            case 2:
                self::error_msg($args[0], $args[1]);
                break;
            default:
                self::error_msg("Logging Error! Illegal number of errorMsg arguments of '$num_args'\n", true);
        }
    }

    private static function error_msg(
        $msg, 
        $prepend_date) 
    {

        date_default_timezone_set(timeFormat);
        if ($prepend_date) {
            file_put_contents(self::$errFile, date("Y-m-d H:i:s "), FILE_APPEND);
        }

        file_put_contents(self::$errFile, $msg, FILE_APPEND);
    }

}
