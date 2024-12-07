<?php

class RentalDetailMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS rental_details (
            id INT AUTO_INCREMENT PRIMARY KEY,
            rental_id INT NOT NULL,
            user_id INT NOT NULL,
            car_id INT NOT NULL,
            rental_date DATE NOT NULL,
            return_date DATE NOT NULL,
            status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
            total_cost DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (rental_id) REFERENCES rentals(id),
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (car_id) REFERENCES cars(id)
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'rental_details' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'rental_details': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS rental_details;";

        try {
            $this->pdo->exec($query);
            echo "Table 'rental_details' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'rental_details': " . $e->getMessage() . "\n";
        }
    }
}
