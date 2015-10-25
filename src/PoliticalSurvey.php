<?php
require_once 'Survey.php';

class PoliticalSurvey extends Survey {

    protected $voting_year;

    public function __construct() {
        parent::__construct();
    }

    private function isValidVotingYear($voting_year) {
        return is_int($voting_year) && $voting_year > 0;
    }

    public function setVotingYear($voting_year) {
        if ($this->isValidVotingYear($voting_year))
            $this->voting_year = $voting_year;
        else
            throw new InvalidArgumentException('Voting year must be a positive integer.');
    }

    public function getVotingYear() {
        return isset($this->voting_year) ? $this->voting_year : date('Y');
    }
}
