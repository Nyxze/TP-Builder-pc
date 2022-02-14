<?php
namespace app\dao;

use App\model\Constructor;
use App\lib\AbstractDAO;
use \PDO;

class ConstructorDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "constructors", Constructor::class);
    }

}