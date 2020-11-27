<?php
namespace Whpac\PTest_Tests\TestGrouping\Suite;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestSuite;
use Whpac\PTest\Assert;

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
        $case = new MockTestCase();
        $suite->add($case);
        $tests = $suite->getTestCases();

        Assert::isEqual(true, is_array($tests));
        Assert::isEqual(1, count($tests));
        Assert::isEqual($case, $tests[0]);
    }
}

TestRegistry::getGlobal()->register('test_grouping.suite', new GetTestsInSuite());
TestRegistry::getGlobal()->register('test_grouping.suite', new AddTestToSuite());

class MockTestCase extends TestCase{

    public function run(): void{
        // Just pass
    }
}
?>