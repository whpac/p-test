<?php
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestCase;
use Whpac\PTest\TestSuite;

TestRegistry::register('ptest', new TestCase());

$suite = TestRegistry::getSuite('ptest');
if(!($suite instanceof TestSuite)){
    echo('Registry: failed!<br />');
    return;
}

if(count($suite->getTestCases()) != 1){
    echo('Registry: failed!<br />');
    return;
}

if(count(TestRegistry::getAllSuites()) != 1){
    echo('Registry: failed!<br />');
    return;
}

echo('Registry: passed!<br />');
?>