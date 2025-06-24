<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>viewProduk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

    <div class="flex h-full">
        <!-- Sidebar -->
        <?php include '../component/sidebar.php'; ?>

        <!-- Main content (scrollable only here) -->
        <div class="flex-1 p-6 space-y-6 overflow-auto">
            <div class="w-full h-fit flex justify-between mb-6">
                <div class="flex items-center gap-2">
                    <input type="text" placeholder="Search for datas & reports..." class="px-4 py-2 rounded-md border w-96" />
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-user text-xl"></i>
                        <span>John Doe</span>
                    </div>
                </div>
            </div>

            <section class="p-3">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Product List</h2>
                    <a href="tambah_produk_view.php">
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Tambah Produk +
                        </button>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php
                    include 'db_connect.php';
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
                                        <h3 class="text-sm font-bold text-red-600">harga beli = <?= $d['harga_beli'] ?></h3>
                                        <h3 class="text-sm font-bold text-green-600">harga jual = <?= $d['harga_beli'] ?></h3>
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