<?php
namespace App\controllers;

use App\model\Computer;
use App\model\Motherboard;
use App\model\PcCase;
use App\model\Ram;
use App\model\Cpu;
use App\model\Gpu;
use App\model\Hdd;
use Psr\Http\Message\ResponseInterface;
use PDO;
use Psr\Http\Message\RequestInterface;

use function DI\create;

class ComputerBuilderController extends AbstractWebController
{
    

    public function createDAO (string $daoName){
        $pdo = new PDO ("mysql:host=localhost;dbname=tp_pc;charset=utf8","root","",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $dao = "App\\dao\\".$daoName."DAO";
        $result = new $dao($pdo);
        return $result;

    }

    public function showByComponent(ResponseInterface $response,$component){
        $listComponent = $this->getComponent($component);
        $data = json_encode($listComponent);
        $response->getBody()->write($data);
       return $response->withHeader('Content-type','application/json');
    }

    public function showOneComponent(ResponseInterface $response, $component, $id){
        $componentInfo = $this->getComponentById($component,$id);
         $data = json_encode($componentInfo);
         $response->getBody()->write($data);
        return $response->withHeader('Content-type','application/json');
    }

    public function showComponent(ResponseInterface $response){
        $listComponent = $this->getComponent("Computer");
        $data = json_encode($listComponent);
        $response->getBody()->write($data);
        return $response->withHeader('Content-type','application/json');
    }

     public function buildComputer(ResponseInterface $response){
         
        $listComponent = ["PcCase","motherboard","cpu","gpu","hdd"];
        var_dump($listComponent);
         return $this->render($response,"computer/builder.html.twig",
        [
            "listComponent"=>$listComponent
        

        ]  );
        
        }     

    public function saveComputer(ResponseInterface $response, RequestInterface $request){
        $data = $request->getParsedBody();
        $methodName = "set";
        $computer = $this->createDAO("Computer");
        foreach($data["computer"] as $test=>$val){
            $methodName = "set".$test."DAO";
            $computer->$methodName();
            var_dump($test);
            var_dump($val);
        }
        return $response;
    }

   
    public function showAllComputer(ResponseInterface $response){

        $list = $this->createDAO("Computer")->findAll()->getAllAsObject();
        return $this->render($response,"computer/list.html.twig",
        [

            "list"=>$list
        ]);
    }

    
   public function getComponent(string $component){
    $data[$component] = $this->createDAO($component)->findAll()->getAllAsArray();
    return $data;

   }

   public function getComponentById($component,$id){
    $data[$component] = $this->createDAO($component)->findOneById($id)->getOneAsArray();
    return $data;
 
   }
}
