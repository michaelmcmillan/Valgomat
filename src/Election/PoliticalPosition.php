<?php
namespace Valgomat\Election;
require_once __DIR__ . '/../../vendor/autoload.php';

class PoliticalPosition
{

    private $_opinions;
    private $_scores;

    public function __construct($opinions, $parties)
    {
        $this->_opinions = $opinions;
        $this->_setInitialScoreToZeroForAllParties($parties);
        $this->_calculateScores();
    }

    private function _setInitialScoreToZeroForAllParties($parties)
    {
        foreach ($parties as $party) {
            $this->_scores[spl_object_hash($party)] = 0;
        }
    }

    private function _increaseScoreFor($party)
    {
        $this->_scores[spl_object_hash($party)]++;
    }

    private function _calculateScores()
    {
        foreach ($this->_opinions as $opinion) {
            $agreeing_party = $opinion->leansTowards();
            if ($agreeing_party) {
                $this->_increaseScoreFor($agreeing_party);
            }
        }
    }

    public function getScoreFor($party)
    {
        return $this->_scores[spl_object_hash($party)];
    }
}
