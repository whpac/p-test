<?php
namespace Whpac\PTest;

/**
 * Base class for a test suite.
 */
class TestSuite{
    protected $testCases;

    public function __construct(){
        $this->testCases = [];
    }

    /**
     * Adds a test to the suite.
     * @param $test_case A test to add.
     */
    public function add(TestCase $test_case): void{
        $this->testCases[] = $test_case;
    }

    /**
     * Returns all test cases in the suite.
     */
    public function getTestCases(): array{
        return $this->testCases;
    }
}
?>