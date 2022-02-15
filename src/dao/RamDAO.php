<?php
namespace app\dao;

use App\lib\AbstractDAO;
use App\model\Ram;
use \PDO;

class RamDAO extends AbstractDAO {

  

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "rams", Ram::class);
    }

}