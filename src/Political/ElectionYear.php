<?php
namespace Valgomat\Political;

class ElectionYear
{

    protected $election_year;
    
    public function __construct($year = false) 
    {
        if ($year) {
            $this->setElectionYear($year); 
        }
        else {
            $this->setElectionYearToCurrentYear(); 
        }
    }

    public function getElectionYear() 
    {
        return $this->election_year;
    }
    
    private function isValid($election_year) 
    {
        return is_int($election_year) && $election_year > 0;
    }

    private function setElectionYear($year) 
    {
        if ($this->isValid($year)) {
            $this->election_year = $year; 
        }
        else {
            throw new \InvalidArgumentException('Year must be a positive integer.'); 
        }
    }

    public function setElectionYearToCurrentYear() 
    {
         $this->setElectionYear((int) date('Y'));
    }
}
