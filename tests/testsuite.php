<?php
use Whpac\PTest\TestSuite;
use Whpac\PTest\TestCase;

$suite = new TestSuite();
$suite->add(new TestCase());
if(count($suite->getTestCases()) != 1){
    echo('Test suite: failed!<br />');
    return;
}
echo('Test suite: passed!<br />');
?>