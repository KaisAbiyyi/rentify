<?php

class Car
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new car
     */
    public function create($brand, $model, $year, $color, $dailyRate, $licensePlate, $status = 'available')
    {
        $query = "INSERT INTO cars (brand, model, year, color, daily_rate, license_plate, status) 
                  VALUES (:brand, :model, :year, :color, :daily_rate, :license_plate, :status)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':brand' => $brand,
            ':model' => $model,
            ':year' => $year,
            ':color' => $color,
            ':daily_rate' => $dailyRate,
            ':license_plate' => $licensePlate,
            ':status' => $status
        ]);
    }

    /**
     * Retrieve all cars
     */
    public function getAll()
    {
        $query = "SELECT id, brand, model, year, color, daily_rate, license_plate, status, created_at 
                  FROM cars";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a car by ID
     */
    public function findById($id)
    {
        $query = "SELECT id, brand, model, year, color, daily_rate, license_plate, status, created_at 
                  FROM cars 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update car details
     */
    public function update($id, $brand, $model, $year, $color, $dailyRate, $licensePlate, $status)
    {
        $query = "UPDATE cars 
                  SET brand = :brand, model = :model, year = :year, color = :color, 
                      daily_rate = :daily_rate, license_plate = :license_plate, status = :status 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':brand' => $brand,
            ':model' => $model,
            ':year' => $year,
            ':color' => $color,
            ':daily_rate' => $dailyRate,
            ':license_plate' => $licensePlate,
            ':status' => $status
        ]);
    }

    /**
     * Delete a car by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM cars WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Retrieve cars by status
     */
    public function getByStatus($status)
    {
        $query = "SELECT id, brand, model, year, color, daily_rate, license_plate, status 
                  FROM cars 
                  WHERE status = :status";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':status' => $status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Update car status
     */
    public function updateStatus($id, $status)
    {
        $query = "UPDATE cars 
                  SET status = :status 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':status' => $status
        ]);
    }
}
