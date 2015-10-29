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
        $questions = [
            new Question('Norge trenger færre skatter.'),
            new Question('Vi trenger mer satsing på nyskapning.'),
            new Question('Det er for få barnehageplasser.'),
            new Question('EL-biler bør ha færre avgifter.')
        ];
        $survey->addQuestions($questions);
        $this->app->response->headers->set('Content-Type', 'application/json');
        $this->app->response->setBody(json_encode($survey));
    }

    public function answer($token)
    {
        echo $token;
    }
}
