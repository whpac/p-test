<?php
namespace Whpac\PTest_Tests\Basic\TestCase\SuccessfulRun;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;

class SuccessfulRunNoFail extends TestCase {
    
    public function run(): void{
        // Just return without failing
    }
}

TestRegistry::getGlobal()->register('basic.test_case.successful', new SuccessfulRunNoFail());
?>