<?php
namespace Whpac\PTest_Tests\Mocks\MockCase;

use Whpac\PTest\TestCase;
use Whpac\PTest\RunManager;
use Whpac\PTest\Mocks\Tests\PassingTestCase;
use Whpac\PTest\Mocks\Tests\FailingTestCase;
use Whpac\PTest\Assert;
use Whpac\PTest\TestRegistry;

class TestMockPassingCase extends TestCase{

    public function getName(): string{
        return 'Mocks/MockCase/Test mock passing case';
    }

    public function run(): void{
        $rm = new RunManager();
        $res = $rm->runCase(new PassingTestCase());

        Assert::isEqual(true, $res->isPassed());
    }
}

class TestMockFailingCase extends TestCase{

    public function getName(): string{
        return 'Mocks/MockCase/Test mock failing case';
    }

    public function run(): void{
        $rm = new RunManager();
        $res = $rm->runCase(new FailingTestCase());

        Assert::isEqual(false, $res->isPassed());
    }
}

TestRegistry::getGlobal()->register('mocks.mock_case', new TestMockPassingCase());
TestRegistry::getGlobal()->register('mocks.mock_case', new TestMockFailingCase());
?>