<?php
namespace Whpac\PTest_Tests\Basic\Running\RunManager;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\RunManager;
use Whpac\PTest\Assert;
use Whpac\PTest\Mocks\Tests\PassingTestCase;
use Whpac\PTest\Mocks\Tests\FailingTestCase;

class SuccessfulTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Successful test';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new PassingTestCase());
        Assert::isEqual(true, $result->isPassed());
    }
}

class FailedTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Failed test';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new FailingTestCase());
        Assert::isEqual(false, $result->isPassed());
    }
}

class ExceptionSuccessfulTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Successful test with exception';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMExceptionSucceedingCase());
        Assert::isEqual(true, $result->isPassed());
    }
}

class ExceptionFailedTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Failed test with exception';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMExceptionFailingCase());
        Assert::isEqual(false, $result->isPassed());
    }
}

class NoThrowFailedTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Failed test without expected exception';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMNoThrowFailingCase());
        Assert::isEqual(false, $result->isPassed());
    }
}

TestRegistry::getGlobal()->register('basic.running.run_manager', new SuccessfulTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new FailedTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new ExceptionSuccessfulTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new ExceptionFailedTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new NoThrowFailedTest());


class RMExceptionSucceedingCase extends TestCase{

    public function run(): void{
        $this->expect(new \OutOfRangeException());
        throw new \OutOfRangeException();
    }
}

class RMExceptionFailingCase extends TestCase{

    public function run(): void{
        $this->expect(new \OutOfRangeException());
        throw new \OutOfBoundsException();
    }
}

class RMNoThrowFailingCase extends TestCase{

    public function run(): void{
        $this->expect(new \OutOfRangeException());
    }
}
?>