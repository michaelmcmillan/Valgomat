<?php
use \Valgomat\Election\PoliticalSurvey as PoliticalSurvey;
use \Valgomat\Election\Electionyear as ElectionYear;

class PoliticalSurveyTest extends PHPUnit_Framework_TestCase
{

    public function testPoliticalSurveyHasCurrentYearAsDefaultElectionYear() 
    {
        $political_survey = new PoliticalSurvey();
        $this->assertEquals(date('Y'), $political_survey->getElectionYear());
    }

    public function testPoliticalSurveyCanOverrideDefaultElectionYear() 
    {
        $political_survey = new PoliticalSurvey();
        $political_survey->setElectionYear(1993);
        $this->assertEquals(1993, $political_survey->getElectionYear());
    }

    public function testPoliticalSurveyRaisesExceptionIfElectionYearIsNotAnInteger() 
    {
        $this->setExpectedException('InvalidArgumentException');
        $political_survey = new PoliticalSurvey();
        $political_survey->setElectionYear('2015');
    }

    public function testPoliticalSurveyRaisesExceptionIfElectionYearIsNegative() 
    {
        $this->setExpectedException('InvalidArgumentException');
        $political_survey = new PoliticalSurvey();
        $political_survey->setElectionYear(-2015);
    }

}
