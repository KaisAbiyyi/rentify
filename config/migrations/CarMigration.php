<?php

class CarMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS cars (
            id INT AUTO_INCREMENT PRIMARY KEY,
            brand VARCHAR(100) NOT NULL,
            model VARCHAR(100) NOT NULL,
            year INT NOT NULL,
            color VARCHAR(50),
            daily_rate DECIMAL(10, 2) NOT NULL,
            status ENUM('available', 'rented', 'maintenance') DEFAULT 'available',
            license_plate VARCHAR(50) UNIQUE NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'cars' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'cars': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS cars;";

        try {
            $this->pdo->exec($query);
            echo "Table 'cars' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'cars': " . $e->getMessage() . "\n";
        }
    }
}