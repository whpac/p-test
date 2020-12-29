<?php
namespace Whpac\PTest;

class TestResult {
    protected $isPassed;
    protected $testName;
    protected $thrownException;

    public function __construct(bool $is_passed, string $test_name, ?\Throwable $thrown_exception = null){
        $this->isPassed = $is_passed;
        $this->testName = $test_name;
        $this->thrownException = $thrown_exception;
    }

    /**
     * Returns whether the test has been passed.
     */
    public function isPassed(): bool{
        return $this->isPassed;
    }

    /**
     * Returns the exception that has been thrown during the test or null.
     */
    public function getThrownException(): ?\Throwable{
        return $this->thrownException;
    }

    /**
     * Returns the name of the run test.
     */
    public function getTestName(): string{
        return $this->testName;
    }
}
?>