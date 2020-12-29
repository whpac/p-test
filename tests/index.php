<?php
namespace Whpac\PTest_Tests;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>P-Test tests</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php
        // Includes the PTest library
        require_once('../src/ptest.php');
        require_once('test_results.class.php');
        require_once('test_runner.php');
        require_once('result_presenter.php');

        $results = runAllTests(__DIR__);
        displayResults($results);
        ?>
    </body>
</html>