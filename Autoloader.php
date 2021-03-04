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

    $lastDirectories = substr(getcwd(), strlen(__DIR__));

    $numberOfLastDirectories = substr_count($lastDirectories, '\\');

    $directories = ['businessService', 'businessService/models', 'database', 'presentation', 'presentation/handlers', 'presentation/views'];

    foreach ($directories as $dir) {
        $currentDirectory = $dir;
        for ($x = 0; $x < $numberOfLastDirectories; $x++)
        {
            $currentDirectory = "../" . $currentDirectory;
        }
        $classFile = $currentDirectory . '/' . $class . '.php';

        if (is_readable($classFile))
        {
            if (require $dir . '/' . $class . '.php')
            {
                break;
            }
        }
    }
});
