

<?php

class RentalDetail
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new rental detail
     */
    public function create($rentalId, $userId, $carId, $rentalDate, $returnDate, $totalCost, $status = 'pending')
    {
        $query = "INSERT INTO rental_details (rental_id, user_id, car_id, rental_date, return_date, total_cost, status) 
                  VALUES (:rental_id, :user_id, :car_id, :rental_date, :return_date, :total_cost, :status)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':rental_id' => $rentalId,
            ':user_id' => $userId,
            ':car_id' => $carId,
            ':rental_date' => $rentalDate,
            ':return_date' => $returnDate,
            ':total_cost' => $totalCost,
            ':status' => $status
        ]);
    }

    /**
     * Retrieve all rental details
     */
    public function getAll()
    {
        $query = "SELECT rd.id, rd.rental_id, rd.user_id, rd.car_id, rd.rental_date, rd.return_date, 
                         rd.total_cost, rd.status, rd.created_at, 
                         u.name AS user_name, c.brand AS car_brand, c.model AS car_model
                  FROM rental_details rd
                  INNER JOIN users u ON rd.user_id = u.id
                  INNER JOIN cars c ON rd.car_id = c.id";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a rental detail by ID
     */
    public function findById($id)
    {
        $query = "SELECT rd.id, rd.rental_id, rd.user_id, rd.car_id, rd.rental_date, rd.return_date, 
                         rd.total_cost, rd.status, rd.created_at, 
                         u.name AS user_name, c.brand AS car_brand, c.model AS car_model
                  FROM rental_details rd
                  INNER JOIN users u ON rd.user_id = u.id
                  INNER JOIN cars c ON rd.car_id = c.id
                  WHERE rd.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update rental detail
     */
    public function update($id, $rentalId, $userId, $carId, $rentalDate, $returnDate, $totalCost, $status)
    {
        $query = "UPDATE rental_details 
                  SET rental_id = :rental_id, user_id = :user_id, car_id = :car_id, 
                      rental_date = :rental_date, return_date = :return_date, 
                      total_cost = :total_cost, status = :status 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':rental_id' => $rentalId,
            ':user_id' => $userId,
            ':car_id' => $carId,
            ':rental_date' => $rentalDate,
            ':return_date' => $returnDate,
            ':total_cost' => $totalCost,
            ':status' => $status
        ]);
    }

    /**
     * Delete rental detail
     */
    public function delete($id)
    {
        $query = "DELETE FROM rental_details WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Get rentals by status
     */
    public function getByStatus($status)
    {
        $query = "SELECT rd.id, rd.rental_id, rd.user_id, rd.car_id, rd.rental_date, rd.return_date, 
                         rd.total_cost, rd.status, rd.created_at, 
                         u.name AS user_name, c.brand AS car_brand, c.model AS car_model
                  FROM rental_details rd
                  INNER JOIN users u ON rd.user_id = u.id
                  INNER JOIN cars c ON rd.car_id = c.id
                  WHERE rd.status = :status";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':status' => $status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Update rental status
     */
    public function updateStatus($id, $status)
    {
        $query = "UPDATE rental_details 
                  SET status = :status 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':status' => $status
        ]);
    }
}
