<?php
use \Valgomat\Survey;
use \Valgomat\Question;
require __DIR__ . '/../vendor/autoload.php';

class SurveyTest extends PHPUnit_Framework_TestCase {

    public function testSurveyHasNoQuestionsByDefault() {
        $survey = new Survey();
        $this->assertCount(0, $survey->getQuestions());
    }

    public function testSurveyCanHaveQuestionsAdded() {
        $survey = new Survey();
        $survey->addQuestion(new Question());
        $this->assertCount(1, $survey->getQuestions());
    }

    public function testSurveyCanHaveMultipleQuestionsAdded() {
        $survey = new Survey();
        $survey->addQuestions(array(new Question(), new Question()));
        $this->assertCount(2, $survey->getQuestions());
    }

}
