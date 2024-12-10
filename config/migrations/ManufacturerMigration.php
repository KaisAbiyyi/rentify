<?php

class ManufacturerMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS manufacturers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            country VARCHAR(100) DEFAULT NULL,
            established_year INT DEFAULT NULL,
            logo VARCHAR(255) DEFAULT NULL, -- Kolom untuk menyimpan URL atau path logo
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($this->pdo->query($sql)) {
            echo "Table 'manufacturers' created successfully.\n";
        } else {
            echo "Error creating table 'manufacturers': " . $this->pdo->error . "\n";
        }
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS manufacturers";

        if ($this->pdo->query($sql)) {
            echo "Table 'manufacturers' dropped successfully.\n";
        } else {
            echo "Error dropping table 'manufacturers': " . $this->pdo->error . "\n";
        }
    }
}
