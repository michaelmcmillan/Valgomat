<?php
require_once 'src/PoliticalSurvey.php';

class PoliticalSurveyTest extends PHPUnit_Framework_TestCase {

    public function testPoliticalSurveyHasCurrentYearAsDefaultVotingYear() {
        $political_survey = new PoliticalSurvey();
        $this->assertEquals(date('Y'), $political_survey->getVotingYear());
    }

    public function testPoliticalSurveyCanOverrideDefaultVotingYear() {
        $political_survey = new PoliticalSurvey();
        $political_survey->setVotingYear(1993);
        $this->assertEquals(1993, $political_survey->getVotingYear());
    }

    public function testPoliticalSurveyRaisesExceptionIfVotingYearIsNotAnInteger() {
        $this->setExpectedException('InvalidArgumentException');
        $political_survey = new PoliticalSurvey();
        $political_survey->setVotingYear('2015');
    }

    public function testPoliticalSurveyRaisesExceptionIfVotingYearIsNegative() {
        $this->setExpectedException('InvalidArgumentException');
        $political_survey = new PoliticalSurvey();
        $political_survey->setVotingYear(-2015);
    }

}
