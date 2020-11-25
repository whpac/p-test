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

$test_case1 = new ExceptionTestCase();
$test_case2 = new TestCase();
try{
    $test_case1->run();
    $test_case2->run();
}catch(\Exception $e){
}
if($test_case1->isExceptionExpected() && !$test_case2->isExceptionExpected()){
    echo('Exception expected: passed!<br />');
}else{
    echo('Exception expected: failed!<br />');
}
?>