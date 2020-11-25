<?php
namespace Whpac\PTest;

/**
 * Class providing a test execution environment.
 * It discerns the passed and failed tests.
 */
class RunManager {

    /**
     * Runs the given test case
     * @param $test_case Test to run.
     */
    public function runCase(TestCase $test_case): TestResult{
        try{
            $test_case->run();
            if($test_case->isExceptionExpected()){
                return new TestResult(false);
            }else{
                return new TestResult(true);
            }
        }catch(\Throwable $e){
            if(get_class($e) == $test_case->getExpectedException()){
                return new TestResult(true, $e);
            }else{
                return new TestResult(false, $e);
            }
        }
    }
}
?>