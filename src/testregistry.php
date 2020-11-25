<?php
namespace Whpac\PTest;

class TestRegistry {
    protected static $test_suites = [];

    /**
     * Registers the test to a suite with the given identifier
     * @param $suite_name Identifier of a test suite
     * @param $test_case The test case to register
     */
    public static function register(string $suite_name, TestCase $test_case): void{
        self::createSuiteIfNotExist($suite_name);
        self::$test_suites[$suite_name]->add($test_case);
    }

    /**
     * Returns a suite with the given identifier
     * @param $suite_name Identifier of a test suite
     */
    public static function getSuite(string $suite_name): TestSuite{
        self::createSuiteIfNotExist($suite_name);
        return self::$test_suites[$suite_name];
    }

    /**
     * Returns all test suites
     */
    public static function getAllSuites(): array{
        return self::$test_suites;
    }

    /**
     * Creates a suite with the given identifier if it doesn't exist
     * @param $suite_name Identifier of the suite to be created
     */
    protected static function createSuiteIfNotExist(string $suite_name): void{
        if(isset(self::$test_suites[$suite_name])) return;
        
        self::$test_suites[$suite_name] = new TestSuite();
    }
}
?>