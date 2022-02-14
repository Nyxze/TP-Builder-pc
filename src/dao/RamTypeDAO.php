<?php
namespace app\lib\dao;

use App\model\RamType;
use App\framework\AbstractDAO;
use \PDO;

class RamTypeDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "ram_type", RamType::class);
    }

}