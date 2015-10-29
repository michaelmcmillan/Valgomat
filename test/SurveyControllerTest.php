<?php
use \Valgomat\Webserver\Controllers\SurveyController;

class SurveyControllerTest extends PHPUnit_Framework_TestCase
{

    public function testSurveyControllerCreatesAJSONRepresentationUponCreate() 
    {
        $survey_controller = new SurveyController();
        $response = $this->getMockBuilder('\Slim\Http\Response')->getMock();
        $survey_controller->response = $response;
        $response->expects($this->once())
            ->method('setBody')->with($this->equalTo('hello'));
        $survey_controller->create();
    }

}
