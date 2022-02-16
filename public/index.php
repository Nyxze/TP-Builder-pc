<?php

use App\controllers\HomeController;
use App\controllers\ComputerBuilderController;
use DI\Bridge\Slim\Bridge;
use Slim\Views\Twig;
use Slim\Interfaces\RouteCollectorProxyInterface;


require_once "../vendor/autoload.php";

$builder = new \DI\ContainerBuilder();
$container = $builder->build();
$container->set("Twig",function (){

    return Twig::create("../views");
});

$app = Bridge::create($container);


$app->group("/api", function(RouteCollectorProxyInterface $group){
    
    $group->get("/component", [ComputerBuilderController::class,"shoWComponent"]); 
    $group->get("/{component}/all", [ComputerBuilderController::class,"showByComponent"]); 
    $group->get("/{component}/{id}", [ComputerBuilderController::class,"showOneComponent"]);
});
$app->group("/computer", function(RouteCollectorProxyInterface $group){
    
    $group->get("/build", [ComputerBuilderController::class,"buildComputer"]);
    $group->get("/list", [ComputerBuilderController::class,"showAllComputer"]);
    $group->post("/build", [ComputerBuilderController::class,"saveComputer"]);
    $group->get("/test", [ComputerBuilderController::class,"getCompatibleMotherboard"]);
});
$app->run();


