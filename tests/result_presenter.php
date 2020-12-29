<?php
namespace Whpac\PTest_Tests;

function displayResults(TestResults $results){
?>
    <h1>p-test unit tests results</h1>
    <div class="result-big <?php echo(($results->countFailedResults() == 0) ? 'passed' : 'failed') ?>">
        <div class="outcome">
            <?php echo($results->countFailedResults()); ?> failed
            (<?php echo($results->getFailedPercentage()); ?>%)
        </div>
        <div class="total">
            Total: <?php echo($results->getResultsCount()) ?> tests
        </div>
    </div>

    <div class="results-columns">
        <div class="column failed">
            <h2>Failed</h2>
            <?php
            foreach($results->getFailedResults() as $test_result) {
                $text = $test_result->getTestName();
                $exception = $test_result->getThrownException();
                $description = '';
                if(!is_null($exception)){
                    $description = $exception->getMessage();
                }
                echo('<div class="test-failed">'.$text);
                if(!empty($description)) echo('<div class="test-description">'.$description.'</div>');
                echo('</div>');
            }
            ?>
        </div>
        <div class="column passed">
            <h2>Passed</h2>
            <?php
            foreach($results->getPassedResults() as $test_result) {
                $text = $test_result->getTestName();
                echo('<div class="test-passed">'.$text.'</div>');
            }
            ?>
        </div>
    </div>
<?php
}
?>