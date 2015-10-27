<?php
namespace Valgomat;

class Question
{
    protected $text;
    protected $answer;

    public function __construct($text)
    {
        $this->setText($text);
    }

    public function setText($text)
    {
        if ($this->isValid($text)) {
            $this->text = ucfirst($text);
        } else {
            throw new \InvalidArgumentException('Question can not be empty.');
        }
    }

    public function isValid($text)
    {
        return strlen($text) > 0;
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
