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
        <h1>p-test unit tests</h1>
<?php
use Whpac\PTest\TestRegistry;
use Whpac\PTest\RunManager;

// Includes the PTest library
require('../src/ptest.php');

includeTests(__DIR__);
$run_manager = new RunManager();
$test_suites = TestRegistry::getGlobal()->getAllSuites();

$passed = [];
$failed = [];

foreach($test_suites as $suite_id => $suite){
    $test_cases = $suite->getTestCases();
    foreach($test_cases as $test_case) {
        $result = $run_manager->runCase($test_case);

        if($result->isPassed()){
            $passed[] = $test_case->getName();
        }else{
            $failed[] = $test_case->getName();
        }
    }
}
$number_passed = count($passed);
$number_failed = count($failed);
$total = $number_passed + $number_failed;

echo('Passed: '.$number_passed.' ('.round(100*$number_passed/$total).'%)<br />');
echo('Failed: '.$number_failed.' ('.round(100*$number_failed/$total).'%)<br /><br />');

foreach($failed as $test_name) {
    echo($test_name.': failed!<br />');
}

echo('<hr />');

foreach($passed as $test_name) {
    echo($test_name.': passed!<br />');
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
                include_once($full_path);
            }
        }
    }
}
?>
    </body>
</html>