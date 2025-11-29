<?php
require_once __DIR__ . '/init.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Latihan - Arbok</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="app-wrapper">
    <h1>Riwayat Latihan</h1>
    <h2>Training Log - Arbok</h2>

    <div class="card">
        <div class="status-bar">
            <span class="status-chip">Total Sesi: <?= count($history); ?></span>
            <span class="status-chip">Poison Research Log</span>
        </div>

        <?php if (empty($history)): ?>
            <p>Belum ada sesi latihan yang tercatat.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Jenis Latihan</th>
                        <th>Intensitas</th>
                        <th>Level Sebelum</th>
                        <th>Level Sesudah</th>
                        <th>HP Sebelum</th>
                        <th>HP Sesudah</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($history as $session): ?>
                    <tr>
                        <td><?= htmlspecialchars($session->time); ?></td>
                        <td><?= htmlspecialchars($session->trainingType); ?></td>
                        <td><?= $session->intensity; ?></td>
                        <td><?= $session->levelBefore; ?></td>
                        <td><?= $session->levelAfter; ?></td>
                        <td><?= $session->hpBefore; ?></td>
                        <td><?= $session->hpAfter; ?></td>
                        <td><?= htmlspecialchars($session->note); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <hr>
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
        <a href="train.php" class="btn">Mulai Latihan Lagi</a>
    </div>
</div>
</body>
</html>
