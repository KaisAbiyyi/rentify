<?php

class Review
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new review
     */
    public function create($userId, $carId, $rating, $comment, $reviewDate)
    {
        $query = "INSERT INTO reviews (user_id, car_id, rating, comment, review_date) 
                  VALUES (:user_id, :car_id, :rating, :comment, :review_date)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':user_id' => $userId,
            ':car_id' => $carId,
            ':rating' => $rating,
            ':comment' => $comment,
            ':review_date' => $reviewDate
        ]);
    }

    /**
     * Retrieve all reviews
     */
    public function getAll()
    {
        $query = "SELECT r.id, r.user_id, r.car_id, r.rating, r.comment, r.review_date, 
                         u.name AS user_name, c.brand AS car_brand, c.model AS car_model
                  FROM reviews r
                  INNER JOIN users u ON r.user_id = u.id
                  INNER JOIN cars c ON r.car_id = c.id";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a review by ID
     */
    public function findById($id)
    {
        $query = "SELECT r.id, r.user_id, r.car_id, r.rating, r.comment, r.review_date, 
                         u.name AS user_name, c.brand AS car_brand, c.model AS car_model
                  FROM reviews r
                  INNER JOIN users u ON r.user_id = u.id
                  INNER JOIN cars c ON r.car_id = c.id
                  WHERE r.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update review
     */
    public function update($id, $rating, $comment)
    {
        $query = "UPDATE reviews 
                  SET rating = :rating, comment = :comment 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':rating' => $rating,
            ':comment' => $comment
        ]);
    }

    /**
     * Delete a review by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM reviews WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Get reviews for a specific car
     */
    public function getByCarId($carId)
    {
        $query = "SELECT r.id, r.user_id, r.car_id, r.rating, r.comment, r.review_date, 
                         u.name AS user_name 
                  FROM reviews r
                  INNER JOIN users u ON r.user_id = u.id
                  WHERE r.car_id = :car_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':car_id' => $carId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get reviews by a specific user
     */
    public function getByUserId($userId)
    {
        $query = "SELECT r.id, r.user_id, r.car_id, r.rating, r.comment, r.review_date, 
                         c.brand AS car_brand, c.model AS car_model 
                  FROM reviews r
                  INNER JOIN cars c ON r.car_id = c.id
                  WHERE r.user_id = :user_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
