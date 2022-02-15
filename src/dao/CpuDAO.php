<?php
namespace App\dao;

use App\lib\AbstractDAO;
use App\model\Cpu;
use \PDO;

class CpuDAO extends AbstractDAO {

  

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "cpus", Cpu::class);
    }

}