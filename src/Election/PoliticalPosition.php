<?php
namespace Valgomat\Election;
require_once __DIR__ . '/../../vendor/autoload.php';

class PoliticalPosition
{

    private $_question;
    private $_parties;

    public function __construct($question, $parties)
    {
        $this->_question = $question;
        $this->_parties = $parties;
    }

    private function _getAgreeFactorFromQuestion()
    {
        return $this->_question->getAnswer()->getAgreeFactor();
    }

    private function _thereExistsPartyThatHasAgreeFactor($agree_factor)
    {
        return array_key_exists($agree_factor, $this->_parties); 
    }

    private function _getPartyThatAgreesWithAnswer()
    {
        $agree_factor = $this->_getAgreeFactorFromQuestion();
        if ($this->_thereExistsPartyThatHasAgreeFactor($agree_factor)) {
            return $this->_parties[$agree_factor];
        }    
    }

    public function leansTowards()
    {
        return $this->_getPartyThatAgreesWithAnswer();
    }
}
