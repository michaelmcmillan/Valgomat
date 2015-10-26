<?php
use \Valgomat\Question;

class QuestionTest extends PHPUnit_Framework_TestCase {

    public function testQuestionCapitalizesFirstCharacterOfQuestionText() {
        $question = new Question('hvor mye bryr du deg om miljøet?');
        $this->assertEquals($question->getText()[0], 'H');
    }

    public function testQuestionDoesNotAlterFirstCharacterIfAlreadyCapitalized()
    {
        $text = 'Already first capitalized the first character.';
        $question = new Question($text);
        $this->assertEquals($question->getText(), $text);
    }

}
