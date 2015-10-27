<?php
use \Valgomat\Survey;

class SurveyTest extends PHPUnit_Framework_TestCase {

    public function createAQuestionMock() {
        return $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
    }

    public function createAnAnswerMock() {
        return $this->getMockBuilder('\Valgomat\Answer')->getMock(); 
    }

    public function testSurveyHasNoQuestionsByDefault() {
        $survey = new Survey();
        $this->assertCount(0, $survey->getQuestions());
    }

    public function testSurveyCanHaveQuestionsAdded() {
        $survey = new Survey();
        $question = $this->createAQuestionMock();
        $survey->addQuestion($question);
        $this->assertCount(1, $survey->getQuestions());
    }

    public function testSurveyCanHaveMultipleQuestionsAdded() {
        $survey = new Survey();
        $questions = [$this->createAQuestionMock(), $this->createAQuestionMock()];
        $survey->addQuestions($questions);
        $this->assertCount(2, $survey->getQuestions());
    }

    public function testSurveyDoesNotRaiseExceptionWhenAddingZeroQuestions() {
        $survey = new Survey();
        $survey->addQuestions([]);
        $this->assertCount(0, $survey->getQuestions());
    }

    public function testSurveyThrowsExceptionWhenGettingQuestionOutsideOfRange() {
        $this->setExpectedException('OutOfBoundsException');
        $survey = new Survey();
        $questions = [$this->createAQuestionMock(), $this->createAQuestionMock()];
        $survey->addQuestions($questions);
        $survey->getQuestion(3);        
    }

    public function testSurveyDoesNotThrowExceptionWhenGettingQuestionWithinRange() {
        $survey = new Survey();
        $question = $this->createAQuestionMock();
        $survey->addQuestion($question);
        $this->assertEquals($question, $survey->getQuestion(0));        
    }

    public function testSurveyDoesNotAllowStringsForQuestionIndexes() {
        $this->setExpectedException('OutOfBoundsException');
        $survey = new Survey();
        $survey->getQuestion('0');        
    }

}
