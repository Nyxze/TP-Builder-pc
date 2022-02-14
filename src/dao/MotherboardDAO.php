<?php
namespace app\lib\dao;

use App\model\Motherboard;
use App\framework\AbstractDAO;
use \PDO;

class MotherboardDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "motherboards", Motherboard::class);
    }

}