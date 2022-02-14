<?php
namespace app\dao;

use App\model\Type;
use App\lib\AbstractDAO;
use \PDO;

class TypeDAO extends AbstractDAO {

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo, "types", Type::class);
    }

    public function hydrate(array $data)
    {
        $post = parent::hydrate($data);

        $typeDAO = $this->getTypeDAO();
        $post->setType($typeDAO
            ->findOneById($data["type_id"])
            ->getOneAsObject()
        );

}
}