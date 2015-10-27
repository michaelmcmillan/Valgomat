<?php
namespace Valgomat;
require_once __DIR__ . '/../vendor/autoload.php';

class Survey
{

    protected $questions;

    public function __construct() 
    {
        $this->questions = array(); 
    }

    public function getQuestions() 
    {
        return $this->questions;
    }

    public function addQuestion(Question $question) 
    {
        $this->questions[] = $question;
    }

    public function addQuestions(Array $questions) 
    {
        array_walk($questions, array ($this, 'addQuestion'));
    }

    public function getQuestion($index)
    {
        if ($this->_isIndexWithinQuestionRange($index)) {
            return $this->questions[$index];
        } else {
            throw new \OutOfBoundsException('Question does not exist.');
        }
    }

    private function _isIndexWithinQuestionRange($question_index)
    {
        return is_int($question_index) &&
               count($this->getQuestions()) >= $question_index;
    }

}
