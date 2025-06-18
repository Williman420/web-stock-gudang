<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewProduk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

    <div class="flex h-full">
        <!-- Sidebar (fixed width) -->
        <?php include '../component/sidebar.php'; ?>

        <!-- Main Content (scrollable) -->
        <div class="flex-1 overflow-y-auto px-5 py-6">
            <div class="w-full flex justify-between mb-6">
                <a href="produk_view.php">
                    <button class="p-5 bg-red-600 text-white py-2 rounded hover:bg-red-700">
                        Kembali
                    </button>
                </a>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-user text-xl"></i>
                        <span>John Doe</span>
                    </div>
                </div>
            </div>

            <main class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold mb-4">Product Detail</h1>
                <p class="text-gray-600 mb-6">Here is your product description and details.</p>

                <!-- Long fake content for scroll test -->
                <?php for ($i = 1; $i <= 100; $i++): ?>
                    <p class="mb-2">Feature line <?= $i ?></p>
                <?php endfor; ?>
            </main>
        </div>
    </div>

</body>

</html>
