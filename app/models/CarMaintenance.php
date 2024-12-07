<?php

class CarMaintenance
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new maintenance log
     */
    public function create($carId, $maintenanceDate, $description, $cost)
    {
        $query = "INSERT INTO car_maintenance (car_id, maintenance_date, description, cost) 
                  VALUES (:car_id, :maintenance_date, :description, :cost)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':car_id' => $carId,
            ':maintenance_date' => $maintenanceDate,
            ':description' => $description,
            ':cost' => $cost
        ]);
    }

    /**
     * Retrieve all maintenance logs
     */
    public function getAll()
    {
        $query = "SELECT cm.id, cm.car_id, cm.maintenance_date, cm.description, cm.cost, cm.created_at, 
                         c.brand AS car_brand, c.model AS car_model 
                  FROM car_maintenance cm
                  INNER JOIN cars c ON cm.car_id = c.id";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a maintenance log by ID
     */
    public function findById($id)
    {
        $query = "SELECT cm.id, cm.car_id, cm.maintenance_date, cm.description, cm.cost, cm.created_at, 
                         c.brand AS car_brand, c.model AS car_model 
                  FROM car_maintenance cm
                  INNER JOIN cars c ON cm.car_id = c.id
                  WHERE cm.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update a maintenance log
     */
    public function update($id, $maintenanceDate, $description, $cost)
    {
        $query = "UPDATE car_maintenance 
                  SET maintenance_date = :maintenance_date, description = :description, cost = :cost 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':maintenance_date' => $maintenanceDate,
            ':description' => $description,
            ':cost' => $cost
        ]);
    }

    /**
     * Delete a maintenance log by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM car_maintenance WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Retrieve maintenance logs for a specific car
     */
    public function getByCarId($carId)
    {
        $query = "SELECT cm.id, cm.car_id, cm.maintenance_date, cm.description, cm.cost, cm.created_at 
                  FROM car_maintenance cm
                  WHERE cm.car_id = :car_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':car_id' => $carId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
