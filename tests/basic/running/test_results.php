<?php
namespace Whpac\PTest_Tests\Basic\Running\TestResults;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestResult;
use Whpac\PTest\Assert;
use Whpac\PTest\Mocks\Tests\PassingTestCase;
use Whpac\PTest\RunManager;

class TestResultIsAsExpected extends TestCase {

    public function getName(): string{
        return 'Basic/Running/TestResults/Result as expected';
    }

    public function run(): void{
        $failed_test = new TestResult(false, '');
        Assert::isEqual(false, $failed_test->isPassed());

        $passed_test = new TestResult(true, '');
        Assert::isEqual(true, $passed_test->isPassed());
    }
}

class TestResultWithException extends TestCase {

    public function getName(): string{
        return 'Basic/Running/TestResults/Exception as a result';
    }

    public function run(): void{
        $test_with_exception = new TestResult(false, '', new \Exception());
        $is_found = strpos(get_class($test_with_exception->getThrownException()), 'Exception') !== false;
        Assert::isEqual(true, $is_found);

        $test_with_error = new TestResult(false, '', new \Error());
        $is_found = strpos(get_class($test_with_error->getThrownException()), 'Exception') !== false;
        Assert::isEqual(false, $is_found);
    }
}

class TestNameInResult extends TestCase {
    
    public function getName(): string{
        return 'Basic/Running/TestResults/Test name in a result';
    }

    public function run(): void{
        $result = new TestResult(true, 'Name');
        Assert::isEqual('Name', $result->getTestName());

        $test = new PassingTestCase();
        $rm = new RunManager();
        $result = $rm->runCase($test);
        Assert::isEqual($test->getName(), $result->getTestName());
    }
}

TestRegistry::getGlobal()->register('basic.running.test_results', new TestResultIsAsExpected());
TestRegistry::getGlobal()->register('basic.running.test_results', new TestResultWithException());
TestRegistry::getGlobal()->register('basic.running.test_results', new TestNameInResult());
?>