<?php

require_once __DIR__ . '/classes/Pokemon.php';
require_once __DIR__ . '/classes/PoisonPokemon.php';
require_once __DIR__ . '/classes/Arbok.php';
require_once __DIR__ . '/classes/TrainingSession.php';

session_start();

if (!isset($_SESSION['pokemon'])) {
    $_SESSION['pokemon'] = new Arbok();
}

if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

/** @var Pokemon $pokemon */
$pokemon = $_SESSION['pokemon'];
$history = &$_SESSION['history'];
