<?php
namespace Valgomat\Election;
use \Valgomat\Survey as Survey;

require_once __DIR__ . '/../../vendor/autoload.php';

class PoliticalSurvey extends Survey
{

    protected $election_year;

    public function __construct() 
    {
        $this->election_year = new ElectionYear();
        parent::__construct();
    }

    public function setElectionYear($election_year) 
    {
        $this->election_year = new ElectionYear($election_year);
    }

    public function getElectionYear() 
    {
        return $this->election_year->getElectionYear();
    }
}
