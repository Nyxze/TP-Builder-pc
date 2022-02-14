<?php
namespace App\model;

use App\lib\EntityInterface;

class Boitier implements EntityInterface {

    private ?int $id = null;

    private ?string $name = null;
    
    private ?float $price = null;

    private Type $type;

    
   


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

    /**
     * Get the value of caseName
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of caseName
     *
     * @param ?string $caseName
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return ?int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param ?int $price
     *
     * @return self
     */
    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

   

    /**
     * Get the value of type
     *
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param Type $type
     *
     * @return self
     */
    public function setType(Type $type): self
    {
        $this->type = $type;

        return $this;
    }
}