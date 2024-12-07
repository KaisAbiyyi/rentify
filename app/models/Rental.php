<?php

class Rental
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new rental location
     */
    public function create($address, $city, $phoneNumber)
    {
        $query = "INSERT INTO rentals (address, city, phone_number) 
                  VALUES (:address, :city, :phone_number)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':address' => $address,
            ':city' => $city,
            ':phone_number' => $phoneNumber
        ]);
    }

    /**
     * Retrieve all rental locations
     */
    public function getAll()
    {
        $query = "SELECT id, address, city, phone_number, created_at 
                  FROM rentals";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a rental location by ID
     */
    public function findById($id)
    {
        $query = "SELECT id, address, city, phone_number, created_at 
                  FROM rentals 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update a rental location's information
     */
    public function update($id, $address, $city, $phoneNumber)
    {
        $query = "UPDATE rentals 
                  SET address = :address, city = :city, phone_number = :phone_number 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':address' => $address,
            ':city' => $city,
            ':phone_number' => $phoneNumber
        ]);
    }

    /**
     * Delete a rental location by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM rentals WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Search rentals by city
     */
    public function searchByCity($city)
    {
        $query = "SELECT id, address, city, phone_number, created_at 
                  FROM rentals 
                  WHERE city LIKE :city";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':city' => '%' . $city . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
