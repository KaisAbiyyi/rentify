<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Component Preview</title>
    <style>
    </style>
</head>

<body>

    <div class="container">
        <h1>Component Preview</h1>

        <!-- Navbar Component -->
        <div class="component-section">
            <h2>Navbar Component</h2>
            <?php require '../app/views/components/navbar.php'; ?>
        </div>

        <!-- Sidebar Component -->
        <div class="component-section">
            <h2>Sidebar Component</h2>
            <?php require '../app/views/components/sidebar.php'; ?>
        </div>

        <!-- Card Component -->
        <div class="component-section">
            <h2>Card Component</h2>
            <?php require '../app/views/components/card.php'; ?>
        </div>

        <!-- Table Component -->
        <div class="component-section">
            <h2>Table Component</h2>
            <?php require '../app/views/components/table.php'; ?>
        </div>

        <!-- Form Component -->
        <div class="component-section">
            <h2>Form Component</h2>
            <?php require '../app/views/components/form.php'; ?>
        </div>

        <!-- Alert Component -->
        <div class="component-section">
            <h2>Alert Component</h2>
            <?php require '../app/views/components/alert.php'; ?>
        </div>

        <!-- Modal Component -->
        <div class="component-section">
            <h2>Modal Component</h2>
            <?php require '../app/views/components/modal.php'; ?>
        </div>
    </div>

</body>

</html>