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
        foreach ($parties as $party) {
            $this->_scores[spl_object_hash($party)] = 0;
        }
    }

    public function getScoreFor($party)
    {
        foreach ($this->_opinions as $opinion) {
            $agreeing_party = $opinion->leansTowards();
            if ($agreeing_party) {
                $this->_scores[spl_object_hash($agreeing_party)]++;
            }
        }
        return $this->_scores[spl_object_hash($party)];
    }
}
