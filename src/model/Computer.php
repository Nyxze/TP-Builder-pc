<?php
namespace App\model;

use App\lib\EntityInterface;

class Computer implements EntityInterface {

    private ?int $id = null;
    private ?string $name = null;
    private PcCase $case;
    private Cpu $cpu;
    private Gpu $gpu;
    private Hdd $hdd;
    private Motherboard $motherboard;
    private Ram $ram;

    
   


    


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
     * Get the value of case
     *
     * @return PcCase
     */
    public function getCase(): PcCase
    {
        return $this->case;
    }

    /**
     * Set the value of case
     *
     * @param PcCase $case
     *
     * @return self
     */
    public function setCase(PcCase $case): self
    {
        $this->case = $case;

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
     * Get the value of gpu
     *
     * @return Gpu
     */
    public function getGpu(): Gpu
    {
        return $this->gpu;
    }

    /**
     * Set the value of gpu
     *
     * @param Gpu $gpu
     *
     * @return self
     */
    public function setGpu(Gpu $gpu): self
    {
        $this->gpu = $gpu;

        return $this;
    }

    /**
     * Get the value of hdd
     *
     * @return Hdd
     */
    public function getHdd(): Hdd
    {
        return $this->hdd;
    }

    /**
     * Set the value of hdd
     *
     * @param Hdd $hdd
     *
     * @return self
     */
    public function setHdd(Hdd $hdd): self
    {
        $this->hdd = $hdd;

        return $this;
    }

    /**
     * Get the value of motherboard
     *
     * @return Motherboard
     */
    public function getMotherboard(): Motherboard
    {
        return $this->motherboard;
    }

    /**
     * Set the value of motherboard
     *
     * @param Motherboard $motherboard
     *
     * @return self
     */
    public function setMotherboard(Motherboard $motherboard): self
    {
        $this->motherboard = $motherboard;

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
}