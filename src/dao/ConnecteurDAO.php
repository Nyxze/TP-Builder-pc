<?php
namespace app\dao;

use App\model\Connecteur;
use App\lib\AbstractDAO;
use \PDO;

class ConnecteurDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "hdd_connector", Connecteur::class);
    }

}