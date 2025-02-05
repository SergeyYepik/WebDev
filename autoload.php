<?php
    spl_autoload_register(function ($class){
        if ($class == 'EchoLogError' || 
            $class == 'ConsoleLogError' ||
            $class == 'EchoLogErrorAndAlert' ||
            $class == 'LogErrorAlert' ||
            $class == 'CommonLogError'){
            include './classes/' . 'logDbError' . '.php';
        } else {
            include './classes/' . $class . '.php';
        }
    });