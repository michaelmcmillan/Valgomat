<?php
use \Valgomat\Survey;
use \Valgomat\ScoreCalculator;

class ScoreCalculatorTest extends PHPUnit_Framework_TestCase
{

    public function createASurveyMock() 
    {
        return $this->getMockBuilder('\Valgomat\Survey')->disableOriginalConstructor()->getMock();
    }

    public function testScoreCalculatorReturnsZeroForSurveyWithoutAnyAnswers() 
    {
        $survey = $this->createASurveyMock();
        $score = new ScoreCalculator($survey);
        $this->assertEquals(0, $score->getScore());
    }
}
