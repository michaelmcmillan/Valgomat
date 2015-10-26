<?php
require_once 'Survey.php';
require_once 'ElectionYear.php';

class PoliticalSurvey extends Survey {

    protected $election_year;

    public function __construct() {
        $this->election_year = new ElectionYear();
        parent::__construct();
    }

    public function setElectionYear($election_year) {
        $this->election_year = new ElectionYear($election_year);
    }

    public function getElectionYear() {
        return $this->election_year->getElectionYear();
    }
}
