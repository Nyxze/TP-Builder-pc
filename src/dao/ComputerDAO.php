<?php
namespace App\dao;

use App\lib\AbstractDAO;
use App\model\Computer;
use App\dao\CpuDAO;
use App\lib\EntityInterface;
use \PDO;

class ComputerDAO extends AbstractDAO {

    private ?CpuDAO $cpuDAO = null;
    private ?GpuDAO $gpuDAO = null;
    private ?HddDAO $hddDAO = null;
    private ?MotherboardDAO $motherboardDAO = null;
    private ?PcCaseDAO $caseDAO = null;
    private ?RamDAO $ramDAO = null;


    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "computers", Computer::class);
        $this->foreignKeys = ["cpu","gpu","hdd","motherboard","ram"];
    }

    public function hydrate(array $data)
    {

        // refactor plz
        $computer = parent::hydrate($data);
    
        $cpuDAO = $this->getCpuDAO();
        $caseDAO = $this->getCaseDAO();
        $gpuDAO = $this->getGpuDAO();
        $hddDAO = $this->getHddDAO();
        $motherboardDAO = $this->getMotherboardDAO();
        $ramDAO = $this->getRamDAO();
      
        $computer->setCpu($cpuDAO->findOneById($data["cpu_id"])->getOneAsObject()); 
        $computer->setCase($caseDAO->findOneById($data["case_id"])->getOneAsObject()); 
        $computer->setGpu($gpuDAO->findOneById($data["gpu_id"])->getOneAsObject());
        $computer->setHdd($hddDAO->findOneById($data["hdd_id"])->getOneAsObject());
        $computer->setMotherboard($motherboardDAO->findOneById($data["motherboard_id"])->getOneAsObject());
        $computer->setRam($ramDAO->findOneById($data["ram_id"])->getOneAsObject());
        return $computer;
    }

   
// save and update
// protected function manageAssociation(Post $post): void{
//     $author = $post->getAuthor();
//     if($author){
//         $authorDAO = $this->getAuthorDAO();
//         $authorDAO->save($author);
//     }
// }

// public function update(EntityInterface $entity): void{
//     $this->manageAssociation($entity);
//     parent::update($entity);
// }

// public function insert(EntityInterface $entity): void{
//     $this->manageAssociation($entity);
//     parent::insert($entity);
// }

//

   

    /**
     * Get the value of ramDAO
     *
     * @return ?RamDAO
     */
    public function getRamDAO(): RamDAO
    {
        if($this->ramDAO == null){
            $this->ramDAO = new RamDAO($this->pdo);
        }
        return $this->ramDAO;
    }

  

    /**
     * Get the value of caseDAO
     *
     * @return ?PcCaseDAO
     */
    public function getCaseDAO(): PcCaseDAO
    {

        if($this->caseDAO == null){
            $this->caseDAO = new PcCaseDAO($this->pdo);
        }
        return $this->caseDAO;
    }

    /**
     * Get the value of motherboardDAO
     *
     * @return ?MotherboardDAO
     */
    public function getMotherboardDAO(): MotherboardDAO
    {

        if($this->motherboardDAO == null){
            $this->motherboardDAO = new MotherboardDAO($this->pdo);
        }
        
        return $this->motherboardDAO;
    }

    /**
     * Get the value of hddDAO
     *
     * @return ?HddDAO
     */
    public function getHddDAO(): HddDAO
    {
        if($this->hddDAO == null){
        $this->hddDAO = new HddDAO($this->pdo);
    }
    
        return $this->hddDAO;
    }

    /**
     * Get the value of gpuDAO
     *
     * @return ?GpuDAO
     */
    public function getGpuDAO(): GpuDAO
    {
        if($this->gpuDAO == null){
            $this->gpuDAO = new GpuDAO($this->pdo);
        }

        return $this->gpuDAO;
    }

  
    public function getCpuDAO(): CpuDAO
    { 
        if($this->cpuDAO == null){
        $this->cpuDAO = new CpuDAO($this->pdo);
    }

        return $this->cpuDAO;
    }
}