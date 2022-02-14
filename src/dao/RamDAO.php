<?php
namespace app\lib\dao;

use App\model\Motherboard;
use App\framework\AbstractDAO;
use \PDO;

class RamDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "rams", Ram::class);
    }

}