<?php
namespace App\controllers;

use Psr\Http\Message\ResponseInterface;
use App\dao\BoitierDAO;
use App\dao\TypeDAO;
use PDO;

class ComputerBuilderController extends AbstractWebController
{
    
    
     public function showAll(ResponseInterface $response, $name = null)
    {   
        $pdo = new PDO ("mysql:host=localhost;dbname=tp_pc;charset=utf8","root","",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $boitierDAO = new BoitierDAO($pdo);
        
        $listBoitier = $boitierDAO->findAll()->getAllAsObject();
        var_dump($listBoitier);
        return $this->render($response, "computer/builder.html.twig",

            [
                "list" => $listBoitier,

            ]);

    }

}
