<?php
use \Valgomat\Ballot;
use \Valgomat\Question;

class BallotTest extends PHPUnit_Framework_TestCase {

    public function testBallotThrowsExceptionIfMissingQuestionAndAnswer() {
        $this->setExpectedException('InvalidArgumentException');
        $ballot = new Ballot();
    }

    public function testBallotCanRetrieveQuestionAsClassProperty() {
        $question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $answer = $this->getMockBuilder('\Valgomat\Answer')->getMock(); 
        $ballot = new Ballot($question, $answer);
        $this->assertEquals($ballot->question, $question);
    }

    public function testBallotCanRetrieveAnswerAsClassProperty() {
        $question = $this->getMockBuilder('\Valgomat\Question')->disableOriginalConstructor()->getMock();
        $answer = $this->getMockBuilder('\Valgomat\Answer')->getMock(); 
        $ballot = new Ballot($question, $answer);
        $this->assertEquals($ballot->answer, $answer);
    }

}
