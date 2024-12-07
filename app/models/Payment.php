<?php

class Payment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new payment
     */
    public function create($rentalId, $amount, $paymentMethod, $status = 'pending')
    {
        $query = "INSERT INTO payments (rental_id, amount, payment_method, status) 
                  VALUES (:rental_id, :amount, :payment_method, :status)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':rental_id' => $rentalId,
            ':amount' => $amount,
            ':payment_method' => $paymentMethod,
            ':status' => $status
        ]);
    }

    /**
     * Retrieve all payments
     */
    public function getAll()
    {
        $query = "SELECT p.id, p.rental_id, p.amount, p.payment_method, p.status, p.payment_date, 
                         r.user_id, r.car_id 
                  FROM payments p
                  INNER JOIN rental_details r ON p.rental_id = r.id";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a payment by ID
     */
    public function findById($id)
    {
        $query = "SELECT p.id, p.rental_id, p.amount, p.payment_method, p.status, p.payment_date, 
                         r.user_id, r.car_id 
                  FROM payments p
                  INNER JOIN rental_details r ON p.rental_id = r.id
                  WHERE p.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update payment details
     */
    public function update($id, $amount, $paymentMethod, $status)
    {
        $query = "UPDATE payments 
                  SET amount = :amount, payment_method = :payment_method, status = :status 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':amount' => $amount,
            ':payment_method' => $paymentMethod,
            ':status' => $status
        ]);
    }

    /**
     * Delete a payment by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM payments WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Get payments by status
     */
    public function getByStatus($status)
    {
        $query = "SELECT p.id, p.rental_id, p.amount, p.payment_method, p.status, p.payment_date, 
                         r.user_id, r.car_id 
                  FROM payments p
                  INNER JOIN rental_details r ON p.rental_id = r.id
                  WHERE p.status = :status";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':status' => $status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Update payment status
     */
    public function updateStatus($id, $status)
    {
        $query = "UPDATE payments 
                  SET status = :status 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':status' => $status
        ]);
    }
}
