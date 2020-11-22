<?php
use Whpac\PTest\TestResult;

try{
    $test_result = new TestResult(false, new \Exception());
    if($test_result->isPassed()){
        echo('Test result: failed!<br />');
        throw new \Exception();
    }
    if(strpos(get_class($test_result->getThrownException()), 'Exception') === false){
        echo('Test result: failed!<br />');
        throw new \Exception();
    }
    echo('Test result: passed!<br />');
}catch(\Exception $e){

}

$test_result = new TestResult(false, new \Error());
if($test_result->isPassed()){
    echo('Test result2: failed!<br />');
    return;
}
if(strpos(get_class($test_result->getThrownException()), 'Exception') !== false){
    echo('Test result2: failed!<br />');
    return;
}
echo('Test result2: passed!<br />');
?>