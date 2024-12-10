<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Rentify'; ?></title>

    <!-- Favicon (Icon Tab) -->
    <link rel="icon" type="image/png" href="/public/images/logo.png">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        const navbar = document.getElementById("navbar");
        const navbarTitle = document.getElementById("navbar-title");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                // Saat scroll
                navbar.classList.add("bg-blue-600", "text-white", "shadow-lg");
                navbar.classList.remove("bg-white", "bg-opacity-70", "text-gray-800");
            } else {
                // Saat di posisi awal
                navbar.classList.remove("bg-blue-600", "text-white", "shadow-lg");
                navbar.classList.add("bg-white", "bg-opacity-70", "text-gray-800");
            }
        });
    </script>
</head>

<body class="bg-gray-100">
    <?php require __DIR__ . '/../components/navbar.php'; ?>

    <!-- Main Content -->
    <main class="container mx-auto p-8">
        <?php echo $content ?? ''; ?>
    </main>

    <?php require __DIR__ . '/../components/footer.php'; ?>
</body>

</html>