<?php
use \Valgomat\Answer;

class AnswerTest extends PHPUnit_Framework_TestCase
{

    public function testAnswerThrowsExceptionIfAgreementIsBelowOne() 
    {
        $this->setExpectedException('InvalidArgumentException', '1 to 5');
        $answer = new Answer(-1, 1);
    }

    public function testAnswerThrowsExceptionIfAgreementIsAboveFive() 
    {
        $this->setExpectedException('InvalidArgumentException', '1 to 5');
        $answer = new Answer(6, 1);
    }

    public function testAnswerThrowsExceptionIfAgreementIsAString() 
    {
        $this->setExpectedException('InvalidArgumentException', '1 to 5');
        $answer = new Answer('1', 1);
    }

    public function testAnswerDoesNotThrowExceptionIfAgreementIsBetweenOneAndFive() 
    {
        for ($agree = 1; $agree <= 5; ++$agree) {
            new Answer($agree, 1); 
        } 
    }

    public function testAnswerThrowsExceptionIfImportanceIsBelowOne() 
    {
        $this->setExpectedException('InvalidArgumentException', '1 to 3');
        $answer = new Answer(1, 0);          
    }

    public function testAnswerThrowsExceptionIfImportanceIsAboveThree() 
    {
        $this->setExpectedException('InvalidArgumentException', '1 to 3');
        $answer = new Answer(1, 4);          
    }

    public function testAnswerDoesNotThrowExceptionIfImportanceIsBetweenOneAndThree() 
    {
        new Answer(1, 1); 
        new Answer(1, 2); 
        new Answer(1, 3); 
    }
}
