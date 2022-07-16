<?php

declare(strict_types=1);

/** @var PDO $pdo */
$pdo = require_once __DIR__ . '/src/Connection.php';

$stmts = file_get_contents( __DIR__ . '/src/migration/ddl.sql');
$pdo->exec($stmts);
echo "Tables created\n";

$stmts = file_get_contents( __DIR__ . '/src/migration/seeds.sql');
$pdo->exec($stmts);
echo "Tables populated\n";