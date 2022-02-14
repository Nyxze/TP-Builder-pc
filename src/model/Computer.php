<?php
namespace App\model;

use App\lib\EntityInterface;

class Computer implements EntityInterface {

    private ?int $id = null;

    private ?string $name = null;
    
    private ?float $price = null;

    private ?string $format = null;

    
   


    


    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
}