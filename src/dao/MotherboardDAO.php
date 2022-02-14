<?php
namespace app\dao;

use App\lib\AbstractDAO;
use App\model\Motherboard;
use \PDO;

class MotherboardDAO extends AbstractDAO {

  

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "motherboards", Motherboard::class);
    }

}