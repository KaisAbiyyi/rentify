<?php

class PaymentMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS payments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            rental_id INT NOT NULL,
            amount DECIMAL(10, 2) NOT NULL,
            payment_method VARCHAR(50) NOT NULL,
            payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (rental_id) REFERENCES rental_details(id)
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'payments' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'payments': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS payments;";

        try {
            $this->pdo->exec($query);
            echo "Table 'payments' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'payments': " . $e->getMessage() . "\n";
        }
    }
}
