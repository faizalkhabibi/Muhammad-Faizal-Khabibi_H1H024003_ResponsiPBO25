<?php
require_once __DIR__ . '/Pokemon.php';

abstract class PoisonPokemon extends Pokemon
{
    protected float $poisonBonus;

    public function __construct(
        string $name,
        int $level,
        int $hp,
        string $specialMoveName,
        string $specialDescription
    ) {
        $this->poisonBonus = 1.2;
        parent::__construct($name, 'Poison', $level, $hp, $specialMoveName, $specialDescription);
    }

    public function getPoisonBonus(): float
    {
        return $this->poisonBonus;
    }
}
