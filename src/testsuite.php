<?php
namespace Whpac\PTest;

class TestSuite{
    protected $testCases;

    public function __construct(){
        $this->testCases = [];
    }

    public function add(TestCase $test_case): void{
        $this->testCases[] = $test_case;
    }

    public function getTestCases(): array{
        return $this->testCases;
    }
}
?>