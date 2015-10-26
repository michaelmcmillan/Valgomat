<?php
use \Valgomat\Survey;
use \Valgomat\Question;

class QuestionMock extends Question {
    public function __construct() { }
}

class SurveyTest extends PHPUnit_Framework_TestCase {

    public function testSurveyHasNoQuestionsByDefault() {
        $survey = new Survey();
        $this->assertCount(0, $survey->getQuestions());
    }

    public function testSurveyCanHaveQuestionsAdded() {
        $survey = new Survey();
        $survey->addQuestion(new QuestionMock());
        $this->assertCount(1, $survey->getQuestions());
    }

    public function testSurveyCanHaveMultipleQuestionsAdded() {
        $survey = new Survey();
        $survey->addQuestions(array(new QuestionMock(), new QuestionMock()));
        $this->assertCount(2, $survey->getQuestions());
    }

}
