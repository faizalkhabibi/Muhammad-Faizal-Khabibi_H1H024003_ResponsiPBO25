<?php
require_once __DIR__ . '/PoisonPokemon.php';

class Arbok extends PoisonPokemon
{
    public function __construct()
    {
        parent::__construct(
            'Arbok',
            5,
            120,
            'Poison Fang',
            'Arbok menggigit lawan dengan taring beracun yang dapat mengurangi HP lawan secara bertahap.'
        );
    }

    public function specialMove(): string
    {
        return "Jurus spesial: {$this->specialMoveName} - {$this->specialDescription}";
    }

    public function train(string $trainingType, int $intensity): array
    {
        $baseLevelGain = 0;
        $baseHpGain = 0;
        $note = '';

        switch ($trainingType) {
            case 'Attack':
                $baseLevelGain = 1;
                $baseHpGain = 3;
                $note = 'Latihan fokus serangan dan gigitan beracun.';
                break;
            case 'Defense':
                $baseLevelGain = 1;
                $baseHpGain = 5;
                $note = 'Latihan ketahanan tubuh dan pola menghindar.';
                break;
            case 'Speed':
                $baseLevelGain = 1;
                $baseHpGain = 2;
                $note = 'Latihan kecepatan melilit dan reaksi.';
                break;
            default:
                $baseLevelGain = 0;
                $baseHpGain = 0;
                $note = 'Latihan umum.';
                break;
        }

        $multiplier = max(1, $intensity / 10);

        $levelGain = (int) round($baseLevelGain * $multiplier * $this->poisonBonus);
        $hpGain = (int) round($baseHpGain * $multiplier);

        $this->level += $levelGain;
        $this->hp += $hpGain;

        return [
            'levelGain' => $levelGain,
            'hpGain'    => $hpGain,
            'note'      => $note
        ];
    }
}
