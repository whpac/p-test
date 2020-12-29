<?php
namespace Whpac\PTest\Mocks\Tests;

use Whpac\PTest\TestCase;

/**
 * Class representing an always passing test case
 */
class PassingTestCase extends TestCase{

    public function getName(): string{
        return '[PTest mock test case: always passes]';
    }

    public function run(): void{
        // Just pass
    }
}
?>