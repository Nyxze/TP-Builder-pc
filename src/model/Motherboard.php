<?php
namespace App\model;

use App\framework\EntityInterface;

class Motherboard implements EntityInterface {

    private ?int $id = null;

    private ?string $name = null;
    
    private Ram $ram;

    private Cpu $cpu;
    
    private Type $type;

    private Constructor $constructor;


    
   



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
     * Get the value of ram
     *
     * @return Ram
     */
    public function getRam(): Ram
    {
        return $this->ram;
    }

    /**
     * Set the value of ram
     *
     * @param Ram $ram
     *
     * @return self
     */
    public function setRam(Ram $ram): self
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get the value of cpu
     *
     * @return Cpu
     */
    public function getCpu(): Cpu
    {
        return $this->cpu;
    }

    /**
     * Set the value of cpu
     *
     * @param Cpu $cpu
     *
     * @return self
     */
    public function setCpu(Cpu $cpu): self
    {
        $this->cpu = $cpu;

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
}