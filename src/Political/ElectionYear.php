<?php
namespace Valgomat\Political;

class ElectionYear
{

    protected $election_year;
    
    public function __construct($year = false) 
    {
        $this->_setElectionYear($year); 
    }

    public function getElectionYear() 
    {
        return $this->election_year;
    }

    public function getCurrentYear() 
    {
         return (int) date('Y');
    }
    
    private function _isValid($election_year) 
    {
        return is_int($election_year) && $election_year > 0;
    }

    private function _setElectionYear($year) 
    {
        if ($this->_isValid($year)) {
            $this->election_year = $year; 
        } else if ($year === false) {
            $this->election_year = $this->getCurrentYear();
        } else {
            throw new \InvalidArgumentException('Year must be a positive integer.'); 
        }
    }
}
