<?php

class RentalMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS rentals (
            id INT AUTO_INCREMENT PRIMARY KEY,
            address VARCHAR(255) NOT NULL,
            city VARCHAR(100) NOT NULL,
            phone_number VARCHAR(15) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'rentals' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'rentals': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS rentals;";

        try {
            $this->pdo->exec($query);
            echo "Table 'rentals' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'rentals': " . $e->getMessage() . "\n";
        }
    }
}
