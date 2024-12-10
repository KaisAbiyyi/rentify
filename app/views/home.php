<?php
$title = "Rentify - Your Car Rental Solution"; // Judul halaman
ob_start(); // Mulai buffer output
?>
<div class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Hero Section -->
    <section class="bg-slate-900 h-[700px] relative rounded-[32px] text-white py-20">
        <div class="container mx-auto absolute p-16 z-10 bg-gradient-to-t rounded-[32px] from-transparent via-slate-900/50 to-slate-900 inset-0 text-start">
            <h1 class="text-5xl font-bold mb-4 w-2/3">Drive Your <span class="text-slate-400"> Dream Car </span> Without Breaking the Bank</h1>
            <p class="text-lg mb-6 w-2/3">Discover a diverse range of high-quality cars and exceptional services tailored to fit your needs, ensuring a seamless rental experience at the best prices</p>
            <a href="/cars" class="bg-white text-slate-900 font-semibold px-6 py-3 rounded-full hover:bg-gray-200 transition">
                Get Started
            </a>
        </div>
        <div class="bg-white shadow-md rounded-full p-4 flex justify-start absolute -bottom-6 left-1/2 transform -translate-x-1/2 z-20 w-5/6 items-center">
            <form action="/search" class="w-full flex gap-2">
                <input
                    type="search"
                    name="search"
                    id="search"
                    class="border rounded-full text-slate-900 w-5/6 border-slate-400 px-6 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition duration-200"
                    placeholder="Find your dream car...">
                <button
                    type="submit"
                    class="bg-slate-900 flex justify-center font-bold items-center text-white w-1/6 px-6 py-2 rounded-full hover:bg-slate-800 transition">
                    Search
                </button>
            </form>
        </div>
        <img src="/images/lamborghini.jpg" class="absolute h-full w-full rounded-[32px] object-cover inset-0 z-0" alt="">
    </section>



    <!-- Features Section -->
    <section class="container mx-auto my-20">
        <h2 class="text-3xl font-bold mb-10">MANUFACTURERS</h2>
        <div class="grid md:grid-cols-3 gap-8">
           
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-blue-600 text-white py-10">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Rent Your Dream Car?</h2>
            <a href="/register" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-200 transition">
                Get Started
            </a>
        </div>
    </section>
</div>
<?php
$content = ob_get_clean(); // Ambil konten dari buffer
require __DIR__ . '../layouts/main-layout.php'; // Gunakan layout utama
?>