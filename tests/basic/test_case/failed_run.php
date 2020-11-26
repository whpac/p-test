<?php
namespace Whpac\PTest_Tests\Basic\TestCase\FailedRun;

use Whpac\PTest\TestRegistry;
use Whpac\PTest\TestCase;
use Whpac\PTest\TestFailedException;

class FailedRun extends TestCase {

    public function getName(): string{
        return 'Basic/TestCase/FailedRun/Failed';
    }

    public function run(): void{
        $this->expect(new TestFailedException());
        $this->fail();
    }
}

TestRegistry::getGlobal()->register('basic.test_case.failed', new FailedRun());
?>