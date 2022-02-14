<?php
namespace App\controllers;

use Psr\Http\Message\ResponseInterface;

class HomeController extends AbstractWebController {
  
public function hello(ResponseInterface $response, $name = null ){
    
    return $this->render($response, "home.twig",
    
    [
        "name"=>$name,

]);

}

}