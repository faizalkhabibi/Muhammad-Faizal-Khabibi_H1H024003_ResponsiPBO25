<?php
require_once __DIR__ . '/init.php';

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainingType = $_POST['training_type'] ?? 'Attack';
    $intensity = isset($_POST['intensity']) ? (int) $_POST['intensity'] : 10;

    if ($intensity <= 0) {
        $intensity = 10;
    }

    $levelBefore = $pokemon->getLevel();
    $hpBefore = $pokemon->getHp();

    $trainResult = $pokemon->train($trainingType, $intensity);

    $levelAfter = $pokemon->getLevel();
    $hpAfter = $pokemon->getHp();

    $_SESSION['pokemon'] = $pokemon;

    $session = new TrainingSession(
        $trainingType,
        $intensity,
        $levelBefore,
        $levelAfter,
        $hpBefore,
        $hpAfter,
        $trainResult['note']
    );
    $history[] = $session;

    $result = [
        'trainingType' => $trainingType,
        'intensity'    => $intensity,
        'levelBefore'  => $levelBefore,
        'levelAfter'   => $levelAfter,
        'hpBefore'     => $hpBefore,
        'hpAfter'      => $hpAfter,
        'note'         => $trainResult['note'],
        'specialMove'  => $pokemon->specialMove()
    ];
}

$maxHp = 200;
$maxLevel = 100;
$hpPercent = min(100, (int) round($pokemon->getHp() / $maxHp * 100));
$levelPercent = min(100, (int) round($pokemon->getLevel() / $maxLevel * 100));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Pokémon - Arbok</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="app-wrapper">
    <h1>Latihan Pokémon</h1>
    <h2>Session Training - Arbok</h2>

    <div class="card">
        <div class="status-bar">
            <span class="status-chip">Mode: Training</span>
            <span class="status-chip">Tipe: Poison</span>
        </div>

        <div class="sprite-wrapper">
            <div class="sprite-box">
                <img src="assets/arbok.png" alt="Arbok" class="sprite-img">
            </div>
            <div class="pokemon-info">
                <h3><?= htmlspecialchars($pokemon->getName()); ?></h3>

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

        <hr>

        <form method="post">
            <label for="training_type">Jenis Latihan</label>
            <select name="training_type" id="training_type">
                <option value="Attack">Attack</option>
                <option value="Defense">Defense</option>
                <option value="Speed">Speed</option>
            </select>

            <label for="intensity">Intensitas Latihan (angka, contoh: 10, 20, 30)</label>
            <input type="number" name="intensity" id="intensity" value="10" min="1">

            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Latih Sekarang</button>
        </form>

        <?php if ($result): ?>
            <div class="result">
                <h3>Hasil Latihan</h3>
                <p><strong>Jenis Latihan:</strong> <?= htmlspecialchars($result['trainingType']); ?></p>
                <p><strong>Intensitas:</strong> <?= $result['intensity']; ?></p>
                <p><strong>Level:</strong> <?= $result['levelBefore']; ?> → <?= $result['levelAfter']; ?></p>
                <p><strong>HP:</strong> <?= $result['hpBefore']; ?> → <?= $result['hpAfter']; ?></p>
                <p><strong>Catatan Latihan:</strong> <?= htmlspecialchars($result['note']); ?></p>
                <p><strong>Deskripsi Jurus Spesial:</strong> <?= htmlspecialchars($result['specialMove']); ?></p>
            </div>
        <?php endif; ?>

        <hr>
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
        <a href="history.php" class="btn">Riwayat Latihan</a>
    </div>
</div>
</body>
</html>
