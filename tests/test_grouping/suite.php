<?php
namespace Whpac\PTest_Tests\TestGrouping\Suite;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestSuite;
use Whpac\PTest\Assert;
use Whpac\PTest\Mocks\Tests\PassingTestCase;

class GetTestsInSuite extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Suite/Get tests in suite';
    }

    public function run(): void{
        $suite = new TestSuite();
        $tests = $suite->getTestCases();

        Assert::isEqual(true, is_array($tests));
        Assert::isEqual(0, count($tests));
    }
}

class AddTestToSuite extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Suite/Add test to suite';
    }

    public function run(): void{
        $suite = new TestSuite();
        $case = new PassingTestCase();
        $suite->add($case);
        $tests = $suite->getTestCases();

        Assert::isEqual(true, is_array($tests));
        Assert::isEqual(1, count($tests));
        Assert::isEqual($case, $tests[0]);
    }
}

class CountTestsInSuite extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Suite/Count tests in a suite';
    }

    public function run(): void{
        $suite = new TestSuite();
        $case = new PassingTestCase();
        $suite->add($case);
        $tests = $suite->getTestCases();

        Assert::isEqual($suite->countTestCases(), count($tests));
    }
}

TestRegistry::getGlobal()->register('test_grouping.suite', new GetTestsInSuite());
TestRegistry::getGlobal()->register('test_grouping.suite', new AddTestToSuite());
TestRegistry::getGlobal()->register('test_grouping.suite', new CountTestsInSuite());
?>