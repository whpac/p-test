<?php
namespace Whpac\PTest;

class TestRegistry {
    protected $test_suites = [];
    protected static $singleton = null;

    public static function getGlobal(): TestRegistry{
        if(is_null(self::$singleton)) self::$singleton = new self();
        return self::$singleton;
    }

    /**
     * Registers the test to a suite with the given identifier
     * @param $suite_name Identifier of a test suite
     * @param $test_case The test case to register
     */
    public function register(string $suite_name, TestCase $test_case): void{
        $this->createSuiteIfNotExist($suite_name);
        $this->test_suites[$suite_name]->add($test_case);
    }

    /**
     * Returns a suite with the given identifier
     * @param $suite_name Identifier of a test suite
     */
    public function getSuite(string $suite_name): TestSuite{
        $this->createSuiteIfNotExist($suite_name);
        return $this->test_suites[$suite_name];
    }

    /**
     * Returns all test suites
     */
    public function getAllSuites(): array{
        return $this->test_suites;
    }

    /**
     * Removes all test suites
     */
    public function clear(): void{
        $this->test_suites = [];
    }

    /**
     * Creates a suite with the given identifier if it doesn't exist
     * @param $suite_name Identifier of the suite to be created
     */
    protected function createSuiteIfNotExist(string $suite_name): void{
        if(isset($this->test_suites[$suite_name])) return;
        
        $this->test_suites[$suite_name] = new TestSuite();
    }
}
?>