<?php

class Manufacturer
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new manufacturer
     */
    public function create($name, $logo = null)
    {
        $query = "INSERT INTO manufacturers (name, logo) 
                  VALUES (:name, :logo)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':name' => $name,
            ':logo' => $logo
        ]);
    }

    /**
     * Retrieve all manufacturers
     */
    public function getAll()
    {
        $query = "SELECT id, name, logo, created_at 
                  FROM manufacturers";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a manufacturer by ID
     */
    public function findById($id)
    {
        $query = "SELECT id, name, logo, created_at 
                  FROM manufacturers 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update manufacturer details
     */
    public function update($id, $name, $logo = null)
    {
        $query = "UPDATE manufacturers 
                  SET name = :name, logo = :logo 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':logo' => $logo
        ]);
    }

    /**
     * Delete a manufacturer by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM manufacturers WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
