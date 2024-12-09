<?php

require_once 'core/Database.php';

// Buat koneksi database
$db = (new Database())->connect();

// Tambahkan migration secara manual dengan urutan yang benar
require_once 'config/migrations/UserMigration.php';
require_once 'config/migrations/CarCategoriesMigration.php';
require_once 'config/migrations/ManufacturerMigration.php';
require_once 'config/migrations/CarMigration.php';
require_once 'config/migrations/RentalMigration.php';
require_once 'config/migrations/RentalDetailMigration.php';
require_once 'config/migrations/PaymentMigration.php';
require_once 'config/migrations/ReviewMigration.php';
require_once 'config/migrations/CarMaintenanceMigration.php';

// Buat instance migration sesuai urutan
$migrations = [
    new UserMigration($db),
    new CarCategoriesMigration($db),
    new ManufacturerMigration($db),
    new CarMigration($db),
    new RentalMigration($db),
    new RentalDetailMigration($db),
    new PaymentMigration($db),
    new ReviewMigration($db),
    new CarMaintenanceMigration($db),
];

// Jalankan migrasi
if ($argc > 1) {
    $action = $argv[1];

    if ($action === 'up') {
        echo "Running all migrations (up)...\n";
        foreach ($migrations as $migration) {
            $migration->up();
        }
        echo "All migrations have been run successfully.\n";
    } elseif ($action === 'down') {
        echo "Rolling back all migrations (down)...\n";
        foreach (array_reverse($migrations) as $migration) {
            $migration->down();
        }
        echo "All migrations have been rolled back successfully.\n";
    } else {
        echo "Usage: php migrate.php [up|down]\n";
    }
} else {
    echo "Usage: php migrate.php [up|down]\n";
}
