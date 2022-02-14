<?php
namespace app\dao;

use App\lib\AbstractDAO;
use App\model\Computer;
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
        $this->foreignKeys = ["case","motherboard","ram","gpu","cpu"];
    }

    public function hydrate(array $data)
    {
        $computer = parent::hydrate($data);

        // $cpuDAO = $this->getCpuDAO();
        var_dump($computer);
        return $computer;
    }




    /**
     * Get the value of ramDAO
     *
     * @return ?RamDAO
     */
    public function getRamDAO(): ?RamDAO
    {
        return $this->ramDAO;
    }

  

    /**
     * Get the value of caseDAO
     *
     * @return ?PcCaseDAO
     */
    public function getCaseDAO(): ?PcCaseDAO
    {
        return $this->caseDAO;
    }

    /**
     * Get the value of motherboardDAO
     *
     * @return ?MotherboardDAO
     */
    public function getMotherboardDAO(): ?MotherboardDAO
    {
        return $this->motherboardDAO;
    }

    /**
     * Get the value of hddDAO
     *
     * @return ?HddDAO
     */
    public function getHddDAO(): ?HddDAO
    {
        return $this->hddDAO;
    }

    /**
     * Get the value of gpuDAO
     *
     * @return ?GpuDAO
     */
    public function getGpuDAO(): ?GpuDAO
    {
        return $this->gpuDAO;
    }

    /**
     * Get the value of cpuDAO
     *
     * @return ?CpuDAO
     */
    public function getCpuDAO(): ?CpuDAO
    {
        return $this->cpuDAO;
    }
}