<?php
namespace Whpac\PTest_Tests;

use Whpac\PTest\TestResult;

class TestResults {
    protected $passedResults = [];
    protected $failedResults = [];
    protected $passedCount = 0;
    protected $failedCount = 0;

    /**
     * Adds a test result to the storage
     * @param $result A result to add
     */
    public function addResult(TestResult $result): void{
        if($result->isPassed()){
            $this->passedResults[] = $result;
            $this->passedCount++;
        }else{
            $this->failedResults[] = $result;
            $this->failedCount++;
        }
    }

    /**
     * Returns results of the passed test cases
     */
    public function getPassedResults(): array{
        return $this->passedResults;
    }

    /**
     * Returns count of the passed test cases
     */
    public function countPassedResults(): int{
        return $this->passedCount;
    }

    /**
     * Returns results of the failed test cases
     */
    public function getFailedResults(): array{
        return $this->failedResults;
    }

    /**
     * Returns count of the failed test cases
     */
    public function countFailedResults(): int{
        return $this->failedCount;
    }

    /**
     * Returns count of all results
     */
    public function getResultsCount(): int{
        return $this->passedCount + $this->failedCount;
    }

    /**
     * Returns a percentage of passed tests (rounded down)
     */
    public function getPassedPercentage(): int{
        if($this->getResultsCount() == 0) return 0;
        return floor(100 * $this->countPassedResults() / $this->getResultsCount());
    }

    /**
     * Returns a percentage of failed tests (rounded up)
     */
    public function getFailedPercentage(): int{
        if($this->getResultsCount() == 0) return 100;
        return ceil(100 * $this->countFailedResults() / $this->getResultsCount());
    }
}
?>