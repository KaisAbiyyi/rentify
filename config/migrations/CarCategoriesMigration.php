<?php

class CarCategoriesMigration {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function up() {
        $sql = "CREATE TABLE IF NOT EXISTS car_categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            description TEXT DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($this->pdo->query($sql)) {
            echo "Table 'car_categories' created successfully.\n";
        } else {
            echo "Error creating table 'car_categories': " . $this->pdo->error . "\n";
        }
    }

    public function down() {
        $sql = "DROP TABLE IF EXISTS car_categories";

        if ($this->pdo->query($sql)) {
            echo "Table 'car_categories' dropped successfully.\n";
        } else {
            echo "Error dropping table 'car_categories': " . $this->pdo->error . "\n";
        }
    }
}
