<?php
use Whpac\PTest\RunManager;
use Whpac\PTest\TestCase;

$rm = new RunManager();
$result = $rm->runCase(new TestCase());
if(!$result->isPassed()){
    echo('Run manager (1): failed!<br />');
    return;
}

$result = $rm->runCase(new RMFailingCase());
if($result->isPassed()){
    echo('Run manager (2): failed!<br />');
    return;
}

$result = $rm->runCase(new RMExceptionSucceedingCase());
if(!$result->isPassed()){
    echo('Run manager (3): failed!<br />');
    return;
}

$result = $rm->runCase(new RMExceptionFailingCase());
if($result->isPassed()){
    echo('Run manager (4): failed!<br />');
    return;
}

$result = $rm->runCase(new RMNoThrowFailingCase());
if($result->isPassed()){
    echo('Run manager (5): failed!<br />');
    return;
}
echo('Run manager: passed!<br />');

class RMFailingCase extends TestCase{

    public function run(): void{
        $this->fail();
    }
}

class RMExceptionSucceedingCase extends TestCase{

    public function run(): void{
        $this->expect(new OutOfRangeException());
        throw new OutOfRangeException();
    }
}

class RMExceptionFailingCase extends TestCase{

    public function run(): void{
        $this->expect(new OutOfRangeException());
        throw new OutOfBoundsException();
    }
}

class RMNoThrowFailingCase extends TestCase{

    public function run(): void{
        $this->expect(new OutOfRangeException());
    }
}
?>