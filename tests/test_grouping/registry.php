<?php
namespace Whpac\PTest_Tests\TestGrouping\Registry;

use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestCase;
use Whpac\PTest\TestSuite;
use Whpac\PTest\Assert;
use Whpac\PTest\Mocks\Tests\PassingTestCase;

class GetTestSuite extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Registry/Get suite';
    }

    public function run(): void{
        $reg = new TestRegistry();
        $reg->register('ptest', new PassingTestCase());

        $suite = $reg->getSuite('ptest');
        Assert::isEqual(true, $suite instanceof TestSuite);
    }
}

class GetTestCases extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Registry/Get test cases';
    }

    public function run(): void{
        $reg = new TestRegistry();
        $reg->register('ptest', new PassingTestCase());

        $suite = $reg->getSuite('ptest');
        Assert::isEqual(1, count($suite->getTestCases()));
    }
}

class GetAllSuites extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Registry/Get all suites';
    }

    public function run(): void{
        $reg = new TestRegistry();

        $reg->register('ptest', new PassingTestCase());
        Assert::isEqual(1, count($reg->getAllSuites()));

        $reg->register('ptest2', new PassingTestCase());
        Assert::isEqual(2, count($reg->getAllSuites()));
    }
}

class Clear extends TestCase {

    public function getName(): string{
        return 'TestGrouping/Registry/Clear';
    }

    public function run(): void{
        $reg = new TestRegistry();
        $reg->register('ptest', new PassingTestCase());

        $reg->clear();
        Assert::isEqual(0, count($reg->getAllSuites()));
    }
}

TestRegistry::getGlobal()->register('test_grouping.registry', new GetTestSuite());
TestRegistry::getGlobal()->register('test_grouping.registry', new GetTestCases());
TestRegistry::getGlobal()->register('test_grouping.registry', new GetAllSuites());
TestRegistry::getGlobal()->register('test_grouping.registry', new Clear());
?>