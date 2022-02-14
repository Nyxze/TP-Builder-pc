<?php
namespace app\dao;

use App\model\Boitier;
use App\lib\AbstractDAO;
use \PDO;

class BoitierDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "boitiers", Boitier::class);
        $this->foreignKeys = ["type"];  
    }

}