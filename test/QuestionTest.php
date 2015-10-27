<?php
use \Valgomat\Question;

class QuestionTest extends PHPUnit_Framework_TestCase {

    public function createAnAnswerMock() {
        return $this->getMockBuilder('\Valgomat\Answer')->getMock(); 
    }

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
        $question = new Question('Hvor fornøyd er du med Høyre?');
        $answer = $this->createAnAnswerMock(); 
        $question->answer($answer);
        $this->assertTrue($question->isAnswered());
    }

    public function testQuestionCanNotBeEmpty()
    {
        $this->setExpectedException('InvalidArgumentException');
        $question = new Question('');
    }

}
