<?php
use \Valgomat\Survey;
use \Valgomat\Question;

class SurveyTest extends PHPUnit_Framework_TestCase {

    public function testSurveyHasNoQuestionsByDefault() {
        $survey = new Survey();
        $this->assertCount(0, $survey->getQuestions());
    }

    public function testSurveyCanHaveQuestionsAdded() {
        $survey = new Survey();
        $question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $survey->addQuestion($question);
        $this->assertCount(1, $survey->getQuestions());
    }

    public function testSurveyCanHaveMultipleQuestionsAdded() {
        $survey = new Survey();
        $first_question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $second_question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $survey->addQuestions(array($first_question, $second_question));
        $this->assertCount(2, $survey->getQuestions());
    }

    public function testSurveyDoesNotRaiseExceptionWhenAddingZeroQuestions() {
        $survey = new Survey();
        $survey->addQuestions(array());
        $this->assertCount(0, $survey->getQuestions());
    }

    public function testSurveyThrowsExceptionWhenGettingQuestionOutsideOfRange() {
        $this->setExpectedException('OutOfBoundsException');
        $survey = new Survey();
        $first_question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $second_question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $survey->addQuestions(array($first_question, $second_question));
        $survey->getQuestion(5);        
    }

    public function testSurveyDoesNotThrowExceptionWhenGettingQuestionWithinRange() {
        $survey = new Survey();
        $question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $survey->addQuestion($question);
        $this->assertEquals($question, $survey->getQuestion(0));        
    }

    public function testSurveyDoesNotAllowStringsForQuestionIndexes() {
        $this->setExpectedException('OutOfBoundsException');
        $survey = new Survey();
        $survey->getQuestion('0');        
    }

}
