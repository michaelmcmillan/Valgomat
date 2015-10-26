<?php
namespace Valgomat;

class Question
{
    protected $text;

    public function __construct($text)
    {
        $this->text = ucfirst($text);
    }

    public function getText()
    {
        return $this->text;
    }
}
