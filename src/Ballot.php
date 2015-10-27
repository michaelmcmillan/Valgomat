<?php
namespace Valgomat;

class Ballot
{
    private $_question;
    private $_answer;

    public function __construct(Question $question = null, Answer $answer = null)
    {
        if (!$question or !$answer) {
            throw new \InvalidArgumentException('Missing question or answer.');
        } else {
            $this->_question = $question;            
            $this->_answer = $answer;            
        }
    }

    public function __get($key)
    {
        if ($key === 'question') {
            return $this->_question;
        } else if ($key === 'answer') {
            return $this->_answer; 
        }
    }
} 
