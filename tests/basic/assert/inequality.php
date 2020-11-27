<?php
namespace Whpac\PTest_Tests\Basic\Assert\Inequality;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\Assert;
use Whpac\PTest\AssertionFailedException;

class IsInequal extends TestCase {

    public function getName(): string{
        return 'Basic/Assert/Inequality/Is inequal';
    }

    public function run(): void{
        Assert::isNotEqual(1, 2);
        Assert::isNotEqual('1', '2');
        Assert::isNotEqual('1', 1);

        Assert::isNotEqual(0, false);
        Assert::isNotEqual(0, '');
        Assert::isNotEqual(0, null);
        Assert::isNotEqual(false, null);
    }
}

class IsNotInequal extends TestCase {

    public function getName(): string{
        return 'Basic/Assert/Inequality/Is not inequal';
    }

    public function run(): void{
        $this->expect(new AssertionFailedException());

        Assert::isNotEqual(1, 1);

        $this->fail();
    }
}

TestRegistry::getGlobal()->register('basic.assert.inequality', new IsInequal());
TestRegistry::getGlobal()->register('basic.assert.inequality', new IsNotInequal());
?>