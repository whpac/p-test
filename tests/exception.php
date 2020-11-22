<?php
use Whpac\PTest\TestCase;

class ExceptionTestCase extends TestCase{

    public function run(): void{
        $this->expect(new OutOfRangeException());
        throw new OutOfRangeException();
    }
}

$test_case = new ExceptionTestCase();
try{
    $test_case->run();
    echo('Exception: failed!<br />');
}catch(\Exception $e){
    if(get_class($e) == $test_case->getExpectedException()){
        echo('Exception: passed!<br />');
    }else{
        echo('Exception: failed!<br />');
    }
}
?>