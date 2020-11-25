<?php
use Whpac\PTest\TestCase;

class FailingTestCase extends TestCase {

    public function run(): void{
        $this->fail();
    }
}

$test_case = new FailingTestCase();
try{
    $test_case->run();
    echo('Failing: failed!<br />');
}catch(Exception $e){
    echo('Failing: passed!<br />');
}
?>