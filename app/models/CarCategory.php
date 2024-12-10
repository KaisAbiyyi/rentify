<?php

class CarCategory
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new car category
     */
    public function create($name, $description = null)
    {
        $query = "INSERT INTO car_categories (name, description) 
                  VALUES (:name, :description)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':name' => $name,
            ':description' => $description
        ]);
    }

    /**
     * Retrieve all car categories
     */
    public function getAll()
    {
        $query = "SELECT id, name, description, created_at 
                  FROM car_categories";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a car category by ID
     */
    public function findById($id)
    {
        $query = "SELECT id, name, description, created_at 
                  FROM car_categories 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update car category details
     */
    public function update($id, $name, $description = null)
    {
        $query = "UPDATE car_categories 
                  SET name = :name, description = :description 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description
        ]);
    }

    /**
     * Delete a car category by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM car_categories WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
