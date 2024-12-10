<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Manufacturer.php';
require_once __DIR__ . '/../models/CarCategory.php';
require_once __DIR__ . '/../models/Car.php';

class DatabaseSeeder
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function seedUsers()
    {
        $userModel = new User($this->db);

        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => 'password123', 'phone_number' => '1234567890', 'address' => '123 Street, City', 'role' => 'customer'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => 'password123', 'phone_number' => '0987654321', 'address' => '456 Avenue, City', 'role' => 'admin'],
        ];

        foreach ($users as $user) {
            if ($userModel->create($user['name'], $user['email'], $user['password'], $user['phone_number'], $user['address'], $user['role'])) {
                echo "User {$user['name']} seeded successfully.\n";
            } else {
                echo "Error seeding user: {$user['name']}.\n";
            }
        }
    }

    public function seedManufacturers()
    {
        $manufacturerModel = new Manufacturer($this->db);

        $manufacturers = [
            ['name' => 'Toyota', 'logo' => 'images/logos/toyota.png'],
            ['name' => 'Ford', 'logo' => 'images/logos/ford.png'],
            ['name' => 'BMW', 'logo' => 'images/logos/bmw.png'],
        ];

        foreach ($manufacturers as $manufacturer) {
            if ($manufacturerModel->create($manufacturer['name'], $manufacturer['logo'])) {
                echo "Manufacturer {$manufacturer['name']} seeded successfully.\n";
            } else {
                echo "Error seeding manufacturer: {$manufacturer['name']}.\n";
            }
        }
    }

    public function seedCarCategories()
    {
        $carCategoryModel = new CarCategory($this->db);

        $categories = [
            ['name' => 'SUV', 'description' => 'Sport Utility Vehicle, perfect for all terrains'],
            ['name' => 'Sedan', 'description' => 'Comfortable cars for city and highway driving'],
            ['name' => 'Truck', 'description' => 'Heavy-duty vehicles for transporting goods'],
        ];

        foreach ($categories as $category) {
            if ($carCategoryModel->create($category['name'], $category['description'])) {
                echo "Car category {$category['name']} seeded successfully.\n";
            } else {
                echo "Error seeding car category: {$category['name']}.\n";
            }
        }
    }

    public function seedCars()
    {
        $carModel = new Car($this->db);

        $cars = [
            ['manufacturer_id' => 1, 'category_id' => 1, 'brand' => 'Toyota', 'model' => 'RAV4', 'year' => 2020, 'color' => 'White', 'daily_rate' => 70.00, 'status' => 'available', 'license_plate' => 'AB123CD'],
            ['manufacturer_id' => 2, 'category_id' => 2, 'brand' => 'Ford', 'model' => 'Focus', 'year' => 2018, 'color' => 'Blue', 'daily_rate' => 50.00, 'status' => 'rented', 'license_plate' => 'XY456YZ'],
            ['manufacturer_id' => 3, 'category_id' => 3, 'brand' => 'BMW', 'model' => 'X5', 'year' => 2022, 'color' => 'Black', 'daily_rate' => 120.00, 'status' => 'available', 'license_plate' => 'MN789OP'],
        ];

        foreach ($cars as $car) {
            if ($carModel->create($car['brand'], $car['model'], $car['year'], $car['color'], $car['daily_rate'], $car['license_plate'], $car['status'])) {
                echo "Car {$car['brand']} {$car['model']} seeded successfully.\n";
            } else {
                echo "Error seeding car: {$car['brand']} {$car['model']}.\n";
            }
        }
    }

    public function run()
    {
        $this->seedUsers();
        $this->seedManufacturers();
        $this->seedCarCategories();
        $this->seedCars();
    }
}
