<?php
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestCase;
use Whpac\PTest\TestSuite;

$reg = new TestRegistry();
$reg->register('ptest', new TestCase());

$suite = $reg->getSuite('ptest');
if(!($suite instanceof TestSuite)){
    echo('Registry: failed!<br />');
    return;
}

if(count($suite->getTestCases()) != 1){
    echo('Registry: failed getTestCases()!<br />');
    return;
}

if(count($reg->getAllSuites()) != 1){
    echo('Registry: failed getAllSuites()!<br />');
    return;
}

$reg->clear();

if(count($reg->getAllSuites()) != 0){
    echo('Registry: failed clear!<br />');
    return;
}

echo('Registry: passed!<br />');
?>