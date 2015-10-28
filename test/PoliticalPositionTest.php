<?php
use \Valgomat\Election\PoliticalParty;
use \Valgomat\Election\PoliticalOpinion;
use \Valgomat\Election\PoliticalPosition;
use \Valgomat\Question;
use \Valgomat\Answer;

class PoliticalPositionTest extends PHPUnit_Framework_TestCase
{

    public function createQuestionWithAgreeFactor($agree_factor)
    {
        $question = new Question('Alle har rett til hjelp.');
        $answer = new Answer($agree_factor, 1);
        $question->answer($answer);
        return $question;
    }

    public function testPositionScoreIsOneForPartyWithOneSimilarOpinion()
    {
        $agreeing_party = new PoliticalParty('Sosialistisk Venstreparti');
        $question = $this->createQuestionWithAgreeFactor(5);
        $opinion = new PoliticalOpinion(
            $question, [
                5 => $agreeing_party
            ]
        );
        $position = new PoliticalPosition([$opinion], [$agreeing_party]);
        $this->assertSame($position->getScoreFor($agreeing_party), 1);
    }

    public function testPositionScoreIsZeroForPartyWithNoSimilarOpinion()
    {
        $disagreeing_party = new PoliticalParty('Fremskrittspartiet');
        $question = $this->createQuestionWithAgreeFactor(5);
        $opinion = new PoliticalOpinion(
            $question, [
                1 => $disagreeing_party
            ]
        );
        $position = new PoliticalPosition([$opinion], [$disagreeing_party]);
        $this->assertSame($position->getScoreFor($disagreeing_party), 0);
    }

    public function testPositionScoreIsZeroForPartyWithNoOpinion()
    {
        $disagreeing_party = new PoliticalParty('Fremskrittspartiet');
        $question = $this->createQuestionWithAgreeFactor(5);
        $opinion = new PoliticalOpinion(
            $question, [ ]
        );
        $position = new PoliticalPosition([$opinion], [$disagreeing_party]);
        $this->assertSame($position->getScoreFor($disagreeing_party), 0);
    }

    public function testPositionScoreIsThreeForPartyWithThreeSimilarOpinions()
    {
        $agreeing_party = new PoliticalParty('Fremskrittspartiet');
        $first_opinion = new PoliticalOpinion(
            $this->createQuestionWithAgreeFactor(3), [
                3 => $agreeing_party
            ]
        );
        $second_opinion = new PoliticalOpinion(
            $this->createQuestionWithAgreeFactor(1), [
                1 => $agreeing_party
            ]
        );
        $third_opinion = new PoliticalOpinion(
            $this->createQuestionWithAgreeFactor(2), [
                2 => $agreeing_party
            ]
        );

        $position = new PoliticalPosition(
            [$first_opinion, $second_opinion, $third_opinion],
            [$agreeing_party]
        );
        $this->assertSame($position->getScoreFor($agreeing_party), 3);
    }
    
}
