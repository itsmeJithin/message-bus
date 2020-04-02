<?php
/**
 * @author jithinvijayan
 * @Date 02/04/20
 */

use com\ovaq\core\Queue;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once "../vendor/autoload.php";
AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);
$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->post('/create', function (Request $request, Response $response) {
    $key = $_POST['key'];
    $data = array(
        "time" => time(),
        "key" => $key,
        'request' => 'start'
    );
    Queue::addMessage($key, $data);
    return $response;
});

$app->run();