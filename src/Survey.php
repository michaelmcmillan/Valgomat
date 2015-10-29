<?php
namespace Valgomat;
require_once __DIR__ . '/../vendor/autoload.php';

class Survey implements \JsonSerializable
{

    private $_questions;

    public function __construct() 
    {
        $this->_questions = array(); 
    }

    public function getQuestions() 
    {
        return $this->_questions;
    }

    public function addQuestion(Question $question) 
    {
        array_push($this->_questions, $question);
    }

    public function addQuestions(Array $questions) 
    {
        array_walk($questions, array ($this, 'addQuestion'));
    }

    public function getQuestion($index)
    {
        if ($this->_isIndexWithinQuestionRange($index)) {
            return $this->_questions[$index];
        } else {
            throw new \OutOfBoundsException('Question does not exist.');
        }
    }

    private function _isIndexWithinQuestionRange($question_index)
    {
        return is_int($question_index) &&
               count($this->getQuestions()) >= $question_index;
    }

    public function jsonSerialize()
    {
        return [
            'survey' => [
                'questions' => $this->getQuestions()
            ]
        ];
    }
}
