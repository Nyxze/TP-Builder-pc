<?php
namespace App\dao;

use App\lib\AbstractDAO;
use App\model\Gpu;
use \PDO;

class GpuDAO extends AbstractDAO {

  

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "gpus", Gpu::class);
    }

}