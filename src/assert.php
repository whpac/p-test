<?php
namespace Whpac\PTest;

class Assert {

    /**
     * Fails the test if $a !== $b
     * @param $a One value to compare
     * @param $b Second value to compare
     */
    public static function isEqual($a, $b): void{
        if($a === $b) return;

        throw new AssertionFailedException('Assert::isEqual() failed');
    }

    /**
     * Fails the test if $a === $b
     * @param $a One value to compare
     * @param $b Second value to compare
     */
    public static function isNotEqual($a, $b): void{
        if($a !== $b) return;

        throw new AssertionFailedException('Assert::isNotEqual() failed');
    }
}
?>