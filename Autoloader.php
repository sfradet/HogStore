<?php
/*
 * Hog Store Website Version 1
 * Autoloader.php Version 1
 * Shawn Fradet
 * CST-236
 * 2/28/2021
 * This class is used for automatically loading class dependencies.
 */

spl_autoload_register(function($class){
    require_once $class . ".php";
});
