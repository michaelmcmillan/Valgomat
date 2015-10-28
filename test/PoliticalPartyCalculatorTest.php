<?php
use \Valgomat\Election\PoliticalParty;
use \Valgomat\Election\PoliticalOpinion;
use \Valgomat\Election\PoliticalPartyCalculator;
use \Valgomat\Question;
use \Valgomat\Answer;

class PoliticalPartyCalculatorTest extends PHPUnit_Framework_TestCase
{

    public function createQuestionWithFiveAsAgreementFactor()
    {
        $question = new Question('Alle har rett til hjelp.');
        $answer = new Answer(5, 1);
        $question->answer($answer);
        return $question;
    }

    public function testCalculatorReturnsOnePartyIfOneOpinionGiven()
    {
        $parties = [new PoliticalParty('Sosialistisk Venstreparti')];
        $question = $this->createQuestionWithFiveAsAgreementFactor();
        $opinion = new PoliticalOpinion(
            $question, [
                5 => $parties[0]
            ]
        );
        $calculator = new PoliticalPartyCalculator([$opinion], $parties);
        $this->assertCount(1, $calculator->getRanks());
    }
}
