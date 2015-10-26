<?php
use \Valgomat\Question;
use \Valgomat\Answer;

class AnswerMock extends Answer {

}

class QuestionTest extends PHPUnit_Framework_TestCase {

    public function testQuestionCapitalizesFirstCharacterOfQuestionText() {
        $question = new Question('hvor mye bryr du deg om miljøet?');
        $this->assertEquals($question->getText()[0], 'H');
    }

    public function testQuestionDoesNotAlterFirstCharacterIfAlreadyCapitalized()
    {
        $text = 'Et spørsmål hvor den første bokstaven allerede er stor.';
        $question = new Question($text);
        $this->assertEquals($question->getText(), $text);
    }

    public function testQuestionDoesNotHaveAnAnswerByDefault()
    {
        $question = new Question('Hvor fornøyd er du med Venstre?');
        $this->assertFalse($question->isAnswered());
    }

    public function testQuestionCanBeAnswered()
    {
        $question = new Question('Hvor fornøyd er du med Venstre?');
        $question->answer(new AnswerMock());
        $this->assertTrue($question->isAnswered());
    }

}
