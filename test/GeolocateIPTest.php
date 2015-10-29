<?php
use \Valgomat\Geography\GeoIPSearch;

class GeoIPSearchTest extends PHPUnit_Framework_TestCase
{
    public function testThatGeoIPSearchRejectsInvalidIPAddress() 
    {
        $this->setExpectedException('InvalidArgumentException', 'IP');
        $geo = new GeoIPSearch('256.128.64.32');
    }

    public function testThatGeoIPSearchAcceptsValidIPAddress() 
    {
        $geo = new GeoIPSearch('8.8.8.8');
    }

    public function testThatGeoIPSearchAcceptsValidIPvSixAddress() 
    {
        $geo = new GeoIPSearch('2001:0db8:85a3:08d3:1319:8a2e:0370:7334');
    }

    public function testThatGeoIPSearchForwardsIPToMaxMindSearch()
    {
        $reader = $this->getMockBuilder('\GeoIp2\Database\Reader')
            ->disableOriginalConstructor()->getMock();
        $reader->expects($this->once())->method('city')
            ->with($this->equalTo('128.101.101.101'));
        $geo = new GeoIPSearch('128.101.101.101', $reader);
        $geo->lookup();     
    }
}
