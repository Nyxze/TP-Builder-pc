<?php

use App\controllers\HomeController;
use App\controllers\ComputerBuilderController;
use app\framework\dao\BoitierDAO;
use DI\Bridge\Slim\Bridge;
use Slim\Views\Twig;
use Slim\Interfaces\RouteCollectorProxyInterface;


require_once "../vendor/autoload.php";

$pdo = new PDO ("mysql:host=localhost;dbname=tp_pc;charset=utf8","root","",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);


$builder = new \DI\ContainerBuilder();
$container = $builder->build();
$container->set("Twig",function (){

    return Twig::create("../views");
});

$app = Bridge::create($container);

$app->get("/", [HomeController::class, "hello"]);
$app->group("/computer", function(RouteCollectorProxyInterface $group){
    $group->get("/build", [ComputerBuilderController::class,"build"]);
});
$app->run();


