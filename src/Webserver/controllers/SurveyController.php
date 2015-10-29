<?php
namespace Valgomat\Webserver\Controllers;
use Valgomat\Question;
use Valgomat\Election\PoliticalSurvey;
require_once __DIR__ . '/../../../vendor/autoload.php';

class SurveyController extends Controller
{
    public function create()
    {
        $survey = new PoliticalSurvey();
        $question = new Question('Norge trenger færre skatter.');
        $survey->addQuestion($question);
        $this->app->response->headers->set('Content-Type', 'application/json');
        $this->app->response->setBody(json_encode($survey));
    }
}
