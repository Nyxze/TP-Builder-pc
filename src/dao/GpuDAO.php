<?php
namespace app\lib\dao;

use App\model\Gpu;
use App\framework\AbstractDAO;
use \PDO;

class GpuDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "gpus", Gpu::class);
    }

}