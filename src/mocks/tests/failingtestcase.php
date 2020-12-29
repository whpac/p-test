<?php
namespace Whpac\PTest\Mocks\Tests;

use Whpac\PTest\TestCase;

/**
 * Class representing an always failing test case
 */
class FailingTestCase extends TestCase{

    public function getName(): string{
        return '[PTest mock test case: always fails]';
    }

    public function run(): void{
        $this->fail();
    }
}
?>