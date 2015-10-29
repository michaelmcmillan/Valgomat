<?php
namespace Valgomat\Geography;
require_once __DIR__ . '/../../vendor/autoload.php';

class Municipality implements \JsonSerializable
{
    public $name;

    public function jsonSerialize()
    {
        return [
            'municipality' => [
                'name' => $this->name
            ]
        ];
    }
}
