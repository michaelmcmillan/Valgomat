<?php
namespace Valgomat;

class Answer
{
    private $_agree;
    private $_importance;

    public function __construct($agree, $importance)
    {
        if ($this->_isValidAgreeFactor($agree)) {
            throw new \InvalidArgumentException(
                'Agree factor must be from 1 to 5.'
            );
        }

        if ($this->_isValidImportanceFactor($importance)) {
            throw new \InvalidArgumentException(
                'Importance factor must be from 1 to 3.'
            );
        }
    }

    public function getAgreeFactor()
    {
        return $this->_agree;
    }

    public function getImportanceFactor()
    {
        return $this->_importance;
    }

    private function _isValidImportanceFactor($importance_factor)
    {
        return !is_int($importance_factor)
            || $importance_factor < 1
            || $importance_factor > 3;
    }

    private function _isValidAgreeFactor($agree_factor)
    {
        return !is_int($agree_factor)
            || $agree_factor < 1 
            || $agree_factor > 5;
    }
} 
