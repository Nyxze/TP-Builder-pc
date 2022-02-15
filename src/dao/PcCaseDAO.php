<?php
namespace app\dao;

use App\lib\AbstractDAO;
use App\model\PcCase;
use \PDO;

class PcCaseDAO extends AbstractDAO {

  

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "cases", PcCase::class);
    }

}