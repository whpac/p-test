<?php
namespace Whpac\PTest;

/**
 * Function responsible for loading the PTest classes.
 * It will load only classes in Whpac\PTest namespace.
 */
function PTestClassLoader($name){
    // Filenames are written with small letters
    $name = strtolower($name);
    // Convert namespace separator to directory separator
    $name = str_replace('\\', '/', $name);

    // The namespace to load (must end with slash)
    $namespace = 'whpac/ptest/';

    if(substr($name, 0, strlen($namespace)) != $namespace){
        return;
    }

    $name = substr($name, strlen($namespace));
    $path = __DIR__.'/'.$name.'.php';
    $path = str_replace('/', DIRECTORY_SEPARATOR, $path);


    if(file_exists($path)) require_once($path);
}

spl_autoload_register('Whpac\\PTest\\PTestClassLoader');
?>