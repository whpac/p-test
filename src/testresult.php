<?php
namespace Whpac\PTest;

class TestResult {
    protected $isPassed;
    protected $thrownException;

    public function __construct(bool $is_passed, ?\Throwable $thrown_exception = null){
        $this->isPassed = $is_passed;
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
}
?>