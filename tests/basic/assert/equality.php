<?php
namespace Whpac\PTest_Tests\Basic\Assert\Equality;

use Whpac\PTest\TestCase;
use Whpac\PTest\TestRegistry;
use Whpac\PTest\Assert;
use Whpac\PTest\AssertionFailedException;

class IsEqual extends TestCase {

    public function getName(): string{
        return 'Basic/Assert/Equality/Is equal';
    }

    public function run(): void{
        Assert::isEqual(1, 1);
    }
}

class IsNotEqual extends TestCase {

    public function getName(): string{
        return 'Basic/Assert/Equality/Is not equal';
    }

    public function run(): void{
        $this->expect(new AssertionFailedException());

        Assert::isEqual(1, 2);
        $this->fail();
    }
}

TestRegistry::getGlobal()->register('basic.assert.equality', new IsEqual());
TestRegistry::getGlobal()->register('basic.assert.equality', new IsNotEqual());
?>