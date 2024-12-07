<?php

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Create a new user
     */
    public function create($name, $email, $password, $phoneNumber = null, $address = null, $role = 'customer')
    {
        $query = "INSERT INTO users (name, email, password, phone_number, address, role) 
                  VALUES (:name, :email, :password, :phone_number, :address, :role)";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':phone_number' => $phoneNumber,
            ':address' => $address,
            ':role' => $role
        ]);
    }

    /**
     * Retrieve all users
     */
    public function getAll()
    {
        $query = "SELECT id, name, email, phone_number, address, role, created_at FROM users";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Find a user by ID
     */
    public function findById($id)
    {
        $query = "SELECT id, name, email, phone_number, address, role, created_at 
                  FROM users 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update a user's information
     */
    public function update($id, $name, $email, $phoneNumber, $address, $role)
    {
        $query = "UPDATE users 
                  SET name = :name, email = :email, phone_number = :phone_number, address = :address, role = :role 
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':phone_number' => $phoneNumber,
            ':address' => $address,
            ':role' => $role
        ]);
    }

    /**
     * Delete a user by ID
     */
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Authenticate a user
     */
    public function authenticate($email, $password)
    {
        $query = "SELECT id, name, email, password, role 
                  FROM users 
                  WHERE email = :email";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data if authentication is successful
        }

        return null; // Authentication failed
    }
}
