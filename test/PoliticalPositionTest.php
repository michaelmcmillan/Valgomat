<?php
use \Valgomat\Election\PoliticalParty;
use \Valgomat\Election\PoliticalPosition;
use \Valgomat\Question;
use \Valgomat\Answer;

class PoliticalPositionTest extends PHPUnit_Framework_TestCase
{

    public function testPoliticalPositionLeansTowardsPartyThatAgrees()
    {
        $question = new Question('Drilling i Vesterålen er ikke bra.');
        $party = new PoliticalParty('Venstre');
        $answer = new Answer(5, 1);
        $question->answer($answer);
        $position = new PoliticalPosition($question, [5 => $venstre]);
        $this->assertEquals($position->leansMostlyTowards(), $venstre);
    }
}
