<?php
namespace Whpac\PTest_Tests\Basic\TestCase\ExceptionExpected;

use Whpac\PTest\TestCase;
use Whpac\PTest\Assert;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestFailedException;

class ExceptionExpected extends TestCase {

    public function getName(): string{
        return 'Basic/TestCase/Exception expected';
    }

    public function run(): void{
        $this->expect(new TestFailedException());

        Assert::isEqual(true, $this->isExceptionExpected());

        // In order to satisfy the expectations
        $this->fail();
    }
}

class ExceptionUnexpected extends TestCase {

    public function getName(): string{
        return 'Basic/TestCase/Exception unexpected';
    }

    public function run(): void{
        Assert::isEqual(false, $this->isExceptionExpected());
    }
}

TestRegistry::getGlobal()->register('basic.test_case.exception', new ExceptionExpected());
TestRegistry::getGlobal()->register('basic.test_case.exception', new ExceptionUnexpected());
?>