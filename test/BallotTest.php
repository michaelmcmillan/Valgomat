<?php
use \Valgomat\Ballot;

class BallotTest extends PHPUnit_Framework_TestCase {

    public function createAQuestionMock() {
        return $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
    }

    public function createAnAnswerMock() {
        return $this->getMockBuilder('\Valgomat\Answer')->getMock(); 
    }

    public function testBallotThrowsExceptionIfMissingQuestionAndAnswer() {
        $this->setExpectedException('InvalidArgumentException');
        $ballot = new Ballot();
    }

    public function testBallotCanRetrieveQuestionAsClassProperty() {
        $question = $this->createAQuestionMock();
        $answer = $this->createAnAnswerMock(); 
        $ballot = new Ballot($question, $answer);
        $this->assertEquals($ballot->question, $question);
    }

    public function testBallotCanRetrieveAnswerAsClassProperty() {
        $question = $this->createAQuestionMock();
        $answer = $this->createAnAnswerMock(); 
        $ballot = new Ballot($question, $answer);
        $this->assertEquals($ballot->answer, $answer);
    }

}
