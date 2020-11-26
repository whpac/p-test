<?php
namespace Whpac\PTest_Tests;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>P-Test tests</title>
        <style>
            body {background:#222; color:#f0f0f0;}
        </style>
    </head>
    <body>
<?php
use Whpac\PTest\TestRegistry;
use Whpac\PTest\RunManager;

// Includes the PTest library
require('../src/ptest.php');

echo('Running tests...<br />');
includeTests(__DIR__);
$run_manager = new RunManager();
$test_suites = TestRegistry::getGlobal()->getAllSuites();
foreach($test_suites as $suite){
    $test_cases = $suite->getTestCases();
    foreach ($test_cases as $test_case) {
        echo($test_case->getName().': ');
        $result = $run_manager->runCase($test_case);
        if($result->isPassed()){
            echo('passed!<br />');
        }else{
            echo('failed!<br />');
        }
    }
}

function includeTests(string $directory): void{
    $files = scandir($directory, SCANDIR_SORT_NONE);
    if($files === false) return;

    foreach ($files as $file) {
        if($file == '.' || $file == '..') continue;

        $full_path = $directory.DIRECTORY_SEPARATOR.$file;
        if(is_dir($full_path)){
            includeTests($full_path);
        }else{
            if(substr($full_path, -4) == '.php'){
                // echo('Included '.$full_path.'<br />');
                include_once($full_path);
            }
        }
    }
}
?>
    </body>
</html>