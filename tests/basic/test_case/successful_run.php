<?php
namespace Whpac\PTest_Tests\Basic\TestCase\SuccessfulRun;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;

class SuccessfulRunNoFail extends TestCase {

    public function getName(): string{
        return 'Basic/TestCase/Successful/No fail';
    }
    
    public function run(): void{
        // Just return without failing
    }
}

class SuccessfulRunException extends TestCase {

    public function getName(): string{
        return 'Basic/TestCase/Successful/Exception';
    }

    public function run(): void{
        $this->expect(new \OutOfBoundsException());
        throw new \OutOfBoundsException();
    }
}

TestRegistry::getGlobal()->register('basic.test_case.successful', new SuccessfulRunNoFail());
TestRegistry::getGlobal()->register('basic.test_case.successful', new SuccessfulRunException());
?>