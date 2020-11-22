<?php
namespace Whpac\PTest;

class TestResult {
    protected $isPassed;
    protected $thrownException;

    public function __construct(bool $is_passed, ?\Throwable $thrown_exception = null){
        $this->isPassed = $is_passed;
        $this->thrownException = $thrown_exception;
    }

    public function isPassed(): bool{
        return $this->isPassed;
    }

    public function getThrownException(): ?\Throwable{
        return $this->thrownException;
    }
}
?>