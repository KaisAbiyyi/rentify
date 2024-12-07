<?php

class CarMaintenanceMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS car_maintenance (
            id INT AUTO_INCREMENT PRIMARY KEY,
            car_id INT NOT NULL,
            maintenance_date DATE NOT NULL,
            description TEXT NOT NULL,
            cost DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (car_id) REFERENCES cars(id)
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'car_maintenance' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'car_maintenance': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS car_maintenance;";

        try {
            $this->pdo->exec($query);
            echo "Table 'car_maintenance' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'car_maintenance': " . $e->getMessage() . "\n";
        }
    }
}
