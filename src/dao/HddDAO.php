<?php
namespace app\lib\dao;

use App\model\Hdd;
use App\framework\AbstractDAO;
use \PDO;

class HddDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "hdds", Hdd::class);
    }

}