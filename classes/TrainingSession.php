<?php

class TrainingSession
{
    public string $trainingType;
    public int $intensity;
    public int $levelBefore;
    public int $levelAfter;
    public int $hpBefore;
    public int $hpAfter;
    public string $time;
    public string $note;

    public function __construct(
        string $trainingType,
        int $intensity,
        int $levelBefore,
        int $levelAfter,
        int $hpBefore,
        int $hpAfter,
        string $note
    ) {
        $this->trainingType = $trainingType;
        $this->intensity = $intensity;
        $this->levelBefore = $levelBefore;
        $this->levelAfter = $levelAfter;
        $this->hpBefore = $hpBefore;
        $this->hpAfter = $hpAfter;
        $this->note = $note;
        $this->time = date('Y-m-d H:i:s');
    }
}
