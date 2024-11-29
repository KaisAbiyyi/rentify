# Rental Car Application

This is a PHP-based car rental application that follows the MVC (Model-View-Controller) architecture. It is designed to provide functionality for managing vehicles, rentals, payments, and maintenance while ensuring a clean, structured, and scalable codebase.

## Features

- **User Authentication**: Login and registration for customers and admin.
- **Role Management**: Separate functionalities for customers and admin.
- **Vehicle Management**: Admin can add, update, or remove vehicles and track their status (available, rented, maintenance).
- **Rental Management**: Users can rent vehicles and view their rental history.
- **Payment Processing**: Secure payment handling with different statuses (pending, completed).
- **Maintenance Tracking**: Admin can log and manage vehicle maintenance records.
- **Responsive Design**: Designed to work seamlessly across different devices.

## Technologies Used

- **PHP Native**: Core development without a framework, adhering to the MVC pattern.
- **PDO**: Database operations with prepared statements for security and performance.
- **HTML/CSS/JS**: Frontend development with responsive design in mind.
- **Composer**: Dependency management (if needed).
- **MySQL**: Relational database for storing application data.
- **Laragon**: Local development environment.

## Project Structure

```
/project_root
├── /app
│   ├── /Controllers
│   ├── /Models
│   ├── /Views
│   ├── /Services
├── /config
├── /core
├── /public
│   ├── /css
│   ├── /js
│   ├── /images
├── .env
├── composer.json
├── README.md
```

### Key Directories

- **`/app`**: Contains the application logic (Controllers, Models, Views).
- **`/config`**: Configuration files for database and routing.
- **`/core`**: Core classes like `App` (router) and `Database`.
- **`/public`**: Public-facing assets like CSS, JS, and images.

## Installation (Using Laragon)

Follow these steps to set up the project with **Laragon**, a lightweight development environment for PHP.

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/rental-car-application.git
```

### 2. Move the Project to Laragon's `www` Directory

1. Locate the Laragon installation directory on your system (e.g., `C:\laragon\www`).
2. Move the cloned project folder (`rental-car-application`) into the `www` directory.

### 3. Start Laragon

1. Open Laragon.
2. Start the **Apache** (or Nginx) and **MySQL** services.

### 4. Set Up the Database

1. Access the Laragon database manager by clicking **Menu > Database > phpMyAdmin** (or your preferred tool).
2. Create a new database (e.g., `rental_car`).
3. Import the provided SQL schema into the database:
   - Go to **phpMyAdmin** > Select your database > **Import** > Choose the SQL file > Click **Go**.

### 5. Configure the `.env` File

1. Inside the project directory, create a `.env` file.
2. Add the following environment-specific variables to configure the database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rental_car
DB_USERNAME=root
DB_PASSWORD=
```

3. Modify `DB_USERNAME` and `DB_PASSWORD` if your Laragon database setup requires it.

### 6. Run the Application

1. Open your browser.
2. Visit `http://rental-car.test` (if you have enabled **Pretty URLs** in Laragon).

   - If **Pretty URLs** are not enabled, visit:
     ```
     http://localhost/rental-car-application/public
     ```

### 7. Optional: Enable Pretty URLs in Laragon

1. Go to **Menu > Quick Settings > Pretty URLs**.
2. Restart Laragon.
3. Visit your project at `http://rental-car.test`.

---

## Usage

- **Admin**: Manage vehicles, users, rentals, payments, and maintenance logs.
- **Customers**: Rent vehicles, make payments, and view rental history.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

## Contact

For questions or support, please contact [kaisabiyy2@gmail.com].