<?php
abstract class Pokemon
{
    protected string $name;
    protected string $type;
    protected int $level;
    protected int $hp;
    protected string $specialMoveName;
    protected string $specialDescription;

    public function __construct(
        string $name,
        string $type,
        int $level,
        int $hp,
        string $specialMoveName,
        string $specialDescription
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
        $this->specialMoveName = $specialMoveName;
        $this->specialDescription = $specialDescription;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getSpecialMoveName(): string
    {
        return $this->specialMoveName;
    }

    public function getSpecialDescription(): string
    {
        return $this->specialDescription;
    }

    abstract public function specialMove(): string;

    /**
     * Melatih pokemon.
     * return array:
     *  - levelGain
     *  - hpGain
     *  - note (deskripsi latihan)
     */
    abstract public function train(string $trainingType, int $intensity): array;
}
