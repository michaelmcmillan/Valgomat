<?php
use \Valgomat\Ballot;
use \Valgomat\Question;
use \Valgomat\Answer;

class BallotTest extends PHPUnit_Framework_TestCase {

    public function testBallotThrowsExceptionIfMissingQuestionAndAnswer() {
        $this->setExpectedException('InvalidArgumentException');
        $ballot = new Ballot();
    }

    public function testBallotCanRetrieveQuestionAsClassProperty() {
        $question = new QuestionMock();
        $answer = new AnswerMock();
        $ballot = new Ballot($question, $answer);
        $this->assertEquals($ballot->question, $question);
    }

    public function testBallotCanRetrieveAnswerAsClassProperty() {
        $question = new QuestionMock();
        $answer = new AnswerMock();
        $ballot = new Ballot($question, $answer);
        $this->assertEquals($ballot->answer, $answer);
    }

}
