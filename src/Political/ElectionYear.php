<?php
namespace Valgomat\Political;

class ElectionYear
{

    protected $election_year;
    
    public function __construct($year = false) 
    {
        if ($year) {
            $this->_setElectionYear($year); 
        } else {
            $this->_setElectionYearToCurrentYear(); 
        }
    }

    public function getElectionYear() 
    {
        return $this->election_year;
    }
    
    private function _isValid($election_year) 
    {
        return is_int($election_year) && $election_year > 0;
    }

    private function _setElectionYear($year) 
    {
        if ($this->_isValid($year)) {
            $this->election_year = $year; 
        } else {
            throw new \InvalidArgumentException('Year must be a positive integer.'); 
        }
    }

    private function _setElectionYearToCurrentYear() 
    {
         $this->_setElectionYear((int) date('Y'));
    }
}