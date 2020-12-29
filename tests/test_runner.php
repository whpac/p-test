<?php
namespace Whpac\PTest_Tests;

use Whpac\PTest\TestRegistry;
use Whpac\PTest\RunManager;

/**
 * Invokes all tests in the given directory
 * @param $dir Directory containing tests
 */
function runAllTests(string $dir): TestResults{
    includeTests($dir);
    $run_manager = new RunManager();
    $test_suites = TestRegistry::getGlobal()->getAllSuites();
    $test_results = new TestResults();

    foreach($test_suites as $suite_id => $suite){
        $suite_results = $run_manager->runSuite($suite);

        foreach($suite_results as $result) {
            $test_results->addResult($result);
        }
    }

    return $test_results;
}

/**
 * Includes all tests from the current directory
 */
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