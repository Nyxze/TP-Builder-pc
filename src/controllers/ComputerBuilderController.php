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

     public function buildComputer(ResponseInterface $response){
         
        $listComponent = $this->getComponent(["PcCase","Ram","Cpu","Gpu","Hdd","Motherboard"]);
         return $this->render($response,"computer/builder.html.twig",
        [
            "listComponent"=>$listComponent
        

        ]  );
        
        

    }

    public function saveComputer(ResponseInterface $response, RequestInterface $request){
        $computer = $this->createDAO("Computer");
        $data = $request->getParsedBody();

        foreach($data["computer"] as $key=>$val){
            $methodName = "get".$key."DAO";
            $computer->$methodName();
            $daoList[$key] = $this->createDAO($key);

       } 

    
       var_dump($computer);

      

        

        // $computerDAO->save($computer);
        // var_dump($computerDAO);
       
        


        return $response;
    }

   
    public function showAllComputer(ResponseInterface $response){

        $list = $this->getComponent(["Computer"]);
        var_dump($list);
        return $this->render($response,"computer/list.html.twig",
        [

            "list"=>$list
        ]);
    }



    public function showComponent(ResponseInterface $response, $componentName=null)
    {  
        $listComponent = $this->getComponent($componentName);   
        return $this->render($response, "computer/builder.html.twig",

            [
                "listComponent" => $listComponent,

            ]);

    }
   public function getComponent(array $array = []){
    $listComponent = [];
    foreach($array as $key=>$val){
        $listComponent[$val] = $this->createDAO($val)->findAll()->getAllAsObject();
        
    }
    return $listComponent;

   }
}
