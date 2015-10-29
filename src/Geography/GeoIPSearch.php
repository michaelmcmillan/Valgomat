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

class GeoIPSearch
{
    private $_ip;
    private $_reader;
    private $_record;

    public function __construct($ip, $reader = false)
    {
        if (!$this->_isValidIP($ip)) {
            throw new \InvalidArgumentException('Invalid IP address.');
        }

        $this->_ip = $ip;
        $this->_reader = $reader ? $reader : null;
    }

    private function _isValidIP($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP);
    }

    public function lookup()
    {
        $this->_record = $this->_reader->city($this->_ip);
    }

    public function getCoordinates()
    {
        return new Coordinate(
            $this->_record->location->latitude,
            $this->_record->location->longitude
        );
    }
} 
