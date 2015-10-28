<?php
use \Valgomat\Election\PoliticalParty;
use \Valgomat\Election\PoliticalOpinion;
use \Valgomat\Question;
use \Valgomat\Answer;

class PoliticalOpinionTest extends PHPUnit_Framework_TestCase
{

    public function createQuestionWithFiveAsAgreementFactor()
    {
        $question = new Question('Drilling i Vesterålen er ikke bra.');
        $answer = new Answer(5, 1);
        $question->answer($answer);
        return $question;
    }

    public function createQuestionWithFourAsAgreementFactor()
    {
        $question = new Question('Det bør være mindre offentlig styring.');
        $answer = new Answer(4, 1);
        $question->answer($answer);
        return $question;
    }

    public function createQuestionWithOneAsAgreementFactor()
    {
        $question = new Question('Drilling i Vesterålen er ikke bra.');
        $answer = new Answer(1, 1);
        $question->answer($answer);
        return $question;
    }

    public function testPoliticalOpinionLeansTowardsPartyThatAgreesAsMuch()
    {
        $question = $this->createQuestionWithFiveAsAgreementFactor();
        $agreeing_party = new PoliticalParty('Venstre');
        $opinion = new PoliticalOpinion($question, [5 => $agreeing_party]);
        $this->assertSame($opinion->leansTowards(), $agreeing_party);
    }

    public function testPoliticalOpinionLeansTowardsPartyThatDisagreesAsMuch()
    {
        $question = $this->createQuestionWithOneAsAgreementFactor();
        $disagreeing_party = new PoliticalParty('Fremskrittspartiet');
        $opinion = new PoliticalOpinion($question, [1 => $disagreeing_party]);
        $this->assertSame($opinion->leansTowards(), $disagreeing_party);
    }

    public function testPoliticalOpinionLeansTowardsNoPartyIfNoPartyAgreesAsMuch()
    {
        $question = $this->createQuestionWithOneAsAgreementFactor();
        $opinion = new PoliticalOpinion(
            $question, [
                5 => new PoliticalParty('Sosialistisk Venstreparti'),
                4 => new PoliticalParty('Høyre'),
                3 => new PoliticalParty('Rødt') 
            ]
        );
        $this->assertSame($opinion->leansTowards(), null);
    }
}
