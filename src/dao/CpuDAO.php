<?php
namespace app\lib\dao;

use App\model\Cpu;
use App\lib\AbstractDAO;
use \PDO;

class CpuDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "cpus", Cpu::class);
    }

}