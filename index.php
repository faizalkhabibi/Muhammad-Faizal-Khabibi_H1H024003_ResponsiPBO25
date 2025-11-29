<?php
require_once __DIR__ . '/init.php';

$maxHp = 200;
$maxLevel = 100;

$hpPercent = min(100, (int) round($pokemon->getHp() / $maxHp * 100));
$levelPercent = min(100, (int) round($pokemon->getLevel() / $maxLevel * 100));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRTC - Beranda Arbok</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="app-wrapper">
    <h1>Pokémon Research & Training Center (PRTC)</h1>
    <h2>Trainer Dashboard - Arbok</h2>

    <div class="card">
        <div class="status-bar">
            <span class="status-chip">Trainer: Kamu</span>
            <span class="status-chip">Mode: Space Pixel</span>
        </div>

        <div class="sprite-wrapper">
            <div class="sprite-box">
                <img src="assets/arbok.png" alt="Arbok" class="sprite-img">
            </div>
            <div class="pokemon-info">
                <h3><?= htmlspecialchars($pokemon->getName()); ?></h3>
                <p><strong>Tipe:</strong> <?= htmlspecialchars($pokemon->getType()); ?></p>

                <div class="stat-group">
                    <div class="stat-label">
                        <span>Level</span>
                        <span><?= $pokemon->getLevel(); ?>/<?= $maxLevel; ?></span>
                    </div>
                    <div class="stat-bar">
                        <div class="stat-bar-fill level" style="width: <?= $levelPercent; ?>%;"></div>
                    </div>
                </div>

                <div class="stat-group">
                    <div class="stat-label">
                        <span>HP</span>
                        <span><?= $pokemon->getHp(); ?>/<?= $maxHp; ?></span>
                    </div>
                    <div class="stat-bar">
                        <div class="stat-bar-fill hp" style="width: <?= $hpPercent; ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <p><strong>Jurus Spesial:</strong> <?= htmlspecialchars($pokemon->getSpecialMoveName()); ?></p>
        <p><?= htmlspecialchars($pokemon->getSpecialDescription()); ?></p>

        <hr>
        <p><strong>Catatan Tipe Poison:</strong> Pokémon Poison seperti Arbok cenderung dilatih dengan fokus pada serangan beracun dan ketahanan, sehingga mendapatkan bonus saat latihan Attack/Defense.</p>

        <a href="train.php" class="btn btn-primary">Mulai Latihan</a>
        <a href="history.php" class="btn btn-secondary">Riwayat Latihan</a>
    </div>
</div>
</body>
</html>
