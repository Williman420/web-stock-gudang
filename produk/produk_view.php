<!DOCTYPE html>
<html lang="en">
<?php include '../view/auth.php'; ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

    <div class="flex h-full">
        <!-- Sidebar -->
        <?php include '../component/sidebar.php'; ?>

        <!-- Main content (scrollable only here) -->
        <div class="flex-1 ml-64 p-6 space-y-6 overflow-auto">
            <div class="flex items-center gap-2 justify-end">
                <button id="userButton" class="flex items-center space-x-2 focus:outline-none">
                    <i class="fa-solid fa-user text-xl"></i>
                    <span> <?php echo $_SESSION['username']; ?></span></span>
                </button>
                <div
                    id="dropdownMenu"
                    class="hidden absolute right-5 mt-20 w-20 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                    <a
                        href="../view/login.php"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Logout

                    </a>
                </div>
            </div>

            <script>
                const userButton = document.getElementById('userButton');
                const dropdownMenu = document.getElementById('dropdownMenu');

                userButton.addEventListener('click', () => {
                    dropdownMenu.classList.toggle('hidden');
                });

                // Optional: close dropdown if clicked outside
                window.addEventListener('click', function(e) {
                    if (!userButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            </script>

            <section class="p-3">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Product List</h2>
                    <a href="tambah_produk_view.php">
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Add Product
                        </button>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php
                    include 'db_connection.php';
                    $data = mysqli_query($connection, "SELECT * FROM produk");
                    foreach ($data as $d) :
                    ?>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img src=<?= $d['gambar_produk'] ?> alt="Product Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-bold"><?= $d['kode_produk'] ?></h3>
                                    <div class="flex items-center gap-1">
                                        <h3 class="text-sm font-bold"><?= $d['stok_minimal'] ?></h3>
                                        <h3 class="text-sm font-bold"><?= $d['satuan'] ?></h3>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm"><?= $d['nama_produk'] ?></p>
                                <div class="mt-2 font-semibold">
                                    <div class="flex flex-col items-start gap-1">
                                        <h3 class="text-sm font-bold text-black-600">harga beli = <?= $d['harga_beli'] ?></h3>
                                        <h3 class="text-sm font-bold text-black-600">harga jual = <?= $d['harga_beli'] ?></h3>
                                    </div>
                                </div>
                                <a href="produk_details.php?kode_produk=<?= $d['kode_produk'] ?>">
                                    <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                                        View Details
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        </div>
    </div>

</body>

</html>