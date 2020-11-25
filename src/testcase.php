<?php
namespace Whpac\PTest;

/**
 * Base class for test cases.
 */
class TestCase {
    private $expectedThrowable = null;

    /**
     * Runs a test case.
     */
    public function run(): void{

    }

    /**
     * Tells the execution environment to expect an exception to pass the test.
     * @param $throwable Instance of throwable. If the test will end when a throwable
     * of the same type is thrown it will be considered as passed.
     */
    protected final function expect(?\Throwable $throwable): void{
        $this->expectedThrowable = $throwable;
    }

    /**
     * Returns name of class of the expected throwable.
     */
    public final function getExpectedException(): string{
        if(is_null($this->expectedThrowable)) return '';
        return get_class($this->expectedThrowable);
    }

    /**
     * Returns whether the test is supposed to throw an exception
     */
    public final function isExceptionExpected(): bool{
        return !is_null($this->expectedThrowable);
    }

    /**
     * Fails the test.
     */
    protected function fail(): void{
        throw new \Exception('Test failed');
    }
}
?>