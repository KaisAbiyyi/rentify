<?php

class UserMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            phone_number VARCHAR(15) DEFAULT NULL,
            address VARCHAR(255) DEFAULT NULL,
            role ENUM('customer', 'admin') DEFAULT 'customer',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'users' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'users': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS users;";

        try {
            $this->pdo->exec($query);
            echo "Table 'users' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'users': " . $e->getMessage() . "\n";
        }
    }
}
