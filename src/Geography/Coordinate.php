<?php
namespace Valgomat\Geography;
require __DIR__ . '/../../vendor/autoload.php';

class Coordinate implements \JsonSerializable
{
    public $latitude;
    public $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function jsonSerialize()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
