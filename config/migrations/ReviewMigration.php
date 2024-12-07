<?php

class ReviewMigration
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS reviews (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            car_id INT NOT NULL,
            rating TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
            comment TEXT DEFAULT NULL,
            review_date DATE NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (car_id) REFERENCES cars(id)
        );
        ";

        try {
            $this->pdo->exec($query);
            echo "Table 'reviews' created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating table 'reviews': " . $e->getMessage() . "\n";
        }
    }

    public function down()
    {
        $query = "DROP TABLE IF EXISTS reviews;";

        try {
            $this->pdo->exec($query);
            echo "Table 'reviews' dropped successfully.\n";
        } catch (PDOException $e) {
            echo "Error dropping table 'reviews': " . $e->getMessage() . "\n";
        }
    }
}
