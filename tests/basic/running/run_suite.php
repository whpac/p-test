<?php
namespace Whpac\PTest_Tests\Basic\Running\RunSuite;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestSuite;
use Whpac\PTest\RunManager;
use Whpac\PTest\Mocks\Tests\PassingTestCase;
use Whpac\PTest\Mocks\Tests\FailingTestCase;
use Whpac\PTest\Assert;

class RunTestSuite extends TestCase {

    public function getName(): string{
        return 'Basic/Running/Run test suite';
    }

    public function run(): void{
        $rm = new RunManager();
        $suite = new TestSuite();
        $suite->add(new PassingTestCase());
        $suite->add(new FailingTestCase());

        $results = $rm->runSuite($suite);

        Assert::isEqual(count($results), $suite->countTestCases());

        $cases = $suite->getTestCases();
        for($i = 0; $i < $suite->countTestCases(); $i++){
            $result = $rm->runCase($cases[$i]);
            Assert::isEqual($result->isPassed(), $results[$i]->isPassed());
        }
    }
}

TestRegistry::getGlobal()->register('basic.running.run_suite', new RunTestSuite());
?>