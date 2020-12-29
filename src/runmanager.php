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
                return new TestResult(false, $test_case->getName());
            }else{
                return new TestResult(true, $test_case->getName());
            }
        }catch(\Throwable $e){
            if(get_class($e) == $test_case->getExpectedException()){
                return new TestResult(true, $test_case->getName(), $e);
            }else{
                return new TestResult(false, $test_case->getName(), $e);
            }
        }
    }

    /**
     * Runs the given test suite
     * @param $suite Test suite to run.
     */
    public function runSuite(TestSuite $suite): array{
        $results = [];

        foreach($suite->getTestCases() as $test_case){
            $results[] = $this->runCase($test_case);
        }

        return $results;
    }
}
?>