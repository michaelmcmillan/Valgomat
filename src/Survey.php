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

}
