<?php
namespace Valgomat;

class Question
{
    protected $text;
    protected $answer;

    public function __construct($text)
    {
        $this->text = ucfirst($text);
    }

    public function getText()
    {
        return $this->text;
    }

    public function isAnswered()
    {
        return isset($this->answer);
    }

    public function answer(Answer $answer)
    {
        $this->answer = $answer;
    }
}
