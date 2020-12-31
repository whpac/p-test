# p-test library
The p-test library is an unit test library for PHP. I've written it to teach myself the principles of Test Driven Development (TDD). In fact it's the first piece of software that I developed in an other way than relying on manual testing.

Currently, the library isn't powerful. Now it's only capable of running the test as it was written by a programmer (with no randomization or testing whole set of values). Still, I'm willing to implement those features but not at the moment.

## Usage
First of all, you need to include the main file `ptest.php`. It defines an autoincluder for all classes in the `Whpac\PTest\` namespace.

Each test case is created as a class extending the `Whpac\PTest\TestCase`. It must implement a `run()` method which is invoked when the test is run. Optionally, a test case can also overload the `getName()` function which returns name of the case (bu default - fully qualified class name).

Basically, the test is considered passed when the `run()` method ends without throwing any exception. Therefore, to fail a test it's sufficient to write `throw new \Exception()` but the `TestCase` class provides a method `fail()` which essentially does the same - a `TestFailedException` is thrown.

In some cases, the test may expect a specific exception to be thrown. To tell the execution environment that the test case must result in an exception to pass, one needs to call the `expect($exception)` method on the test case instance. Be aware that, by default, the thrown and expected exceptions have to be of exactly the same class in order to pass the test.

### Running tests
P-test provides one execution environment (class `RunManager`). Its `runCase($test_case)` method is used to invoke a test. The environment calls the case's `run()` method and catches any exception that may be thrown. The `runCase($test_case)` returns a `TestResult` object specifying whether the case was passed and optionally an exception that was thrown during the test execution. The `TestResult` contains also the test name.

### TestRegistry
The library includes a registry component that may be used to store tests before running them. It isn't essential to use the `TestRegistry`.

### Test suites
There is a `TestSuite` class. Suites don't have any special behavior yet - they are just collections of test cases.

## Code samples
Sample test code may be found in the `tests` directory where the p-test's unit tests are located. There are also some files responsible for the results page appearance.