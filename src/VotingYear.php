<?php

class VotingYear {

    protected $voting_year;
    
    public function __construct($year = false) {
        if ($year)
            $this->setVotingYear($year);
        else
            $this->setVotingYearToCurrentYear();
    }

    public function getVotingYear() {
        return $this->voting_year;
    }
    
    private function isValid($voting_year) {
        return is_int($voting_year) && $voting_year > 0;
    }

    private function setVotingYear($year) {
        if ($this->isValid($year))
            $this->voting_year = $year;
        else
            throw new InvalidArgumentException('Year must be a positive integer.');
    }

    public function setVotingYearToCurrentYear() {
         $this->setVotingYear((int) date('Y'));
    }
}
