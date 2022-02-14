<?php
namespace app\dao;

use App\lib\AbstractDAO;
use App\model\Hdd;
use \PDO;

class HddDAO extends AbstractDAO {

  

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "hdds", Hdd::class);
    }

}