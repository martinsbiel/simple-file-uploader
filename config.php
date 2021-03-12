<?php
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'zip', 'rar', 'pdf', 'ico', 'mp3', 'mp4');
    $allowedSize = 104857600; // 100mb
    $folder = '../u/';

    // autoloader setup
    function autoLoader($class){
        $path = 'classes/' . $class;
        if(file_exists($path . '.php'))
            require_once $path . '.php';
    }

    spl_autoload_register('autoLoader');