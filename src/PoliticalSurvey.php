<?php
require_once 'Survey.php';
require_once 'VotingYear.php';

class PoliticalSurvey extends Survey {

    protected $voting_year;

    public function __construct() {
        $this->voting_year = new VotingYear();
        parent::__construct();
    }

    public function setVotingYear($voting_year) {
        $this->voting_year = new VotingYear($voting_year);
    }

    public function getVotingYear() {
        return $this->voting_year->getVotingYear();
    }
}
