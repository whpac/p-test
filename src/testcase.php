<?php
namespace Whpac\PTest;

/**
 * Base class for test cases.
 */
class TestCase {
    private $expected_throwable = null;

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
        $this->expected_throwable = $throwable;
    }

    /**
     * Returns name of class of the expected throwable.
     */
    public final function getExpectedException(): string{
        if(is_null($this->expected_throwable)) return '';
        return get_class($this->expected_throwable);
    }
}

/**
 * Fails the test.
 */
function fail(): void{
    throw new \Exception('Test failed');
}
?>