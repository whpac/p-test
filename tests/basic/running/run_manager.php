<?php
namespace Whpac\PTest_Tests\Basic\Running\RunManager;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\RunManager;
use Whpac\PTest\Assert;

class SuccessfulTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Successful test';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMSucceedingCase());
        Assert::isEqual($result->isPassed(), true);
    }
}

class FailedTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Failed test';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMFailingCase());
        Assert::isEqual($result->isPassed(), false);
    }
}

class ExceptionSuccessfulTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Successful test with exception';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMExceptionSucceedingCase());
        Assert::isEqual($result->isPassed(), true);
    }
}

class ExceptionFailedTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Failed test with exception';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMExceptionFailingCase());
        Assert::isEqual($result->isPassed(), false);
    }
}

class NoThrowFailedTest extends TestCase {

    public function getName(): string{
        return 'Basic/Running/RunManager/Failed test without expected exception';
    }

    public function run(): void{
        $rm = new RunManager();
        $result = $rm->runCase(new RMNoThrowFailingCase());
        Assert::isEqual($result->isPassed(), false);
    }
}

TestRegistry::getGlobal()->register('basic.running.run_manager', new SuccessfulTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new FailedTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new ExceptionSuccessfulTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new ExceptionFailedTest());
TestRegistry::getGlobal()->register('basic.running.run_manager', new NoThrowFailedTest());


class RMSucceedingCase extends TestCase{

    public function run(): void{
        // Just pass
    }
}

class RMFailingCase extends TestCase{

    public function run(): void{
        $this->fail();
    }
}

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