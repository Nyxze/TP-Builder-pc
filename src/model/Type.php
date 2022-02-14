<?php
namespace App\model;

use App\lib\EntityInterface;

class Type implements EntityInterface {

    private ?int $id = null;

    private ?string $name = null;

    


    /**
     * Get the value of name
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param ?string $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

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
     * Get the value of constructor
     *
     * @return Constructor
     */
    public function getConstructor(): Constructor
    {
        return $this->constructor;
    }

    /**
     * Set the value of constructor
     *
     * @param Constructor $constructor
     *
     * @return self
     */
    public function setConstructor(Constructor $constructor): self
    {
        $this->constructor = $constructor;

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
}