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
        $query = "
        CREATE TABLE IF NOT EXISTS manufacturers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            country VARCHAR(100) DEFAULT NULL,
            established_year INT DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        ";
        try {
            $this->pdo->exec($query);
            echo "Table 'manufacturers' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'manufacturers': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS manufacturers;";
        try {
            $this->pdo->exec($query);
            echo "Table 'manufacturers' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'manufacturers': " . $e->getMessage() . "\n";
        }
    }
}
