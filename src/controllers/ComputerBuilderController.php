<?php
namespace App\controllers;

use Psr\Http\Message\ResponseInterface;
use App\dao\PcCaseDAO;
use PDO;

class ComputerBuilderController extends AbstractWebController
{
    
    public function getDAO (string $daoName){
        $pdo = new PDO ("mysql:host=localhost;dbname=tp_pc;charset=utf8","root","",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $dao = "App\\dao\\".$daoName;
        $result = new $dao($pdo);
        return $result;

    }

     public function build(ResponseInterface $response,$name = null){

        return $this->showComponent($response,$name);     
    }
   
     


    public function showComponent(ResponseInterface $response, $componentName)
    {   
        $listCase = $this->getComponent($componentName);
        // $caseDAO = $this->getDAO("PcCaseDAO");
        // $listCase = $caseDAO->findAll()->getAllAsObject();
        var_dump($listCase);
        return $this->render($response, "computer/builder.html.twig",

            [
                "listCase" => $listCase,

            ]);

    }
   public function getComponent(string $componentName){

    $componentDAO = $this->getDAO($componentName."DAO");
    $listComponent = $componentDAO->findAll()->getAllAsObject();
    return $listComponent;

   }
}
