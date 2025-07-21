<!DOCTYPE html>
<html lang="en">
<?php include '../view/auth.php'; ?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>
<style>
    .container {
        background: #fff;
        border-radius: 8px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        max-width: 1200px;
        margin: auto;
    }

    h2 {
        color: #000000;
        margin-bottom: 20px;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        color: #5a5c69;
    }

    thead {
        background-color: #f8f9fc;
    }

    th,
    td {
        padding: 12px 16px;
        border: 1px solid #e3e6f0;
        text-align: left;
    }

    th {
        font-weight: 600;
        white-space: nowrap;
    }
</style>

<body class="flex min-h-screen bg-gray-100 text-gray-800">

    <!-- Sidebar -->
    <?php include '../component/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-6 space-y-6">

        <!-- Top Bar -->
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

        <!-- Overview Cards -->
        <section class="grid grid-cols-5 gap-3">
            <div class="bg-gradient-to-br from-pink-500 to-indigo-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-address-card text-3xl mb-2"></i>
                <?php
                include 'db_connection.php';
                $query = "SELECT COUNT(id_supplier) as total FROM supplier";
                $result = mysqli_query($connection, $query);
                $r = mysqli_fetch_assoc($result);
                ?>
                <h3 class="text-3xl font-bold"><?= $r['total'] ?></h3>
                <p>Suppliers</p>
            </div>
            <div class="bg-gradient-to-br from-green-400 to-teal-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-truck-ramp-box text-3xl mb-2"></i>
                <?php
                include 'db_connection.php';
                $query = "SELECT SUM(jumlah_masuk) AS total_stok_masuk FROM stok_masuk";
                $result = mysqli_query($connection, $query);
                $r = mysqli_fetch_assoc($result);
                ?>

                <h3 class="text-3xl font-bold"><?= $r['total_stok_masuk'] ?></h3>
                <p>Stock Masuk</p>
            </div>
            <div class="bg-gradient-to-br from-pink-400 to-orange-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-box text-3xl mb-2"></i>
                <?php
                include 'db_connection.php';
                $query = "SELECT SUM(jumlah_stok) AS total_stok FROM stok_saat_ini";
                $result = mysqli_query($connection, $query);
                $r = mysqli_fetch_assoc($result);
                ?>
                <h3 class="text-3xl font-bold"><?= $r['total_stok'] ?></h3>
                <p>Total Stock</p>
            </div>
            <div class="bg-gradient-to-br from-yellow-300 to-green-400 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-truck-fast text-3xl mb-2"></i>
                <?php
                include 'db_connection.php';
                $query = "SELECT SUM(jumlah_keluar) AS total_stok_keluar FROM stok_keluar";
                $result = mysqli_query($connection, $query);
                $r = mysqli_fetch_assoc($result);
                ?>
                <h3 class="text-3xl font-bold"><?= $r['total_stok_keluar'] ?></h3>
                <p>Stock Keluar</p>
            </div>
            <div class="bg-gradient-to-br from-purple-500 to-blue-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-user text-3xl mb-2"></i>
                <?php
                include 'db_connection.php';
                $query = "SELECT COUNT(id_pelanggan) as total_pelanggaan FROM pelanggan";
                $result = mysqli_query($connection, $query);
                $r = mysqli_fetch_assoc($result);
                ?>
                <h3 class="text-3xl font-bold"><?= $r['total_pelanggaan'] ?></h3>
                <p>Customer</p>
            </div>
        </section>

        <!-- Dual Charts -->
        <section class="grid grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold text-xl">Low Product on Stock</h2>
                    <a href="../stok_saat_ini/total_stok_view.php">
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php
                    include 'db_connection.php';
                    $query = "SELECT 
                                s.id_stok,
                                s.jumlah_stok,
                                s.tanggal_diperbarui,
                                s.tanggal_terakhir_masuk,
                                p.kode_produk,
                                p.nama_produk,
                                p.gambar_produk,
                                p.stok_minimal,
                                l.nama_lokasi
                                FROM stok_saat_ini s
                                JOIN produk p ON s.id_produk = p.id_produk
                                JOIN lokasi_gudang l ON s.id_lokasi = l.id_lokasi 
                                WHERE s.jumlah_stok < p.stok_minimal
                                ORDER BY s.jumlah_stok ASC";

                    $data = mysqli_query($connection, $query);
                    foreach ($data as $d) :
                    ?>
                        <div class="bg-white shadow-md rounded-2xl p-4 transform hover:scale-105 transition duration-300">
                            <img src="<?= $d['gambar_produk'] ?>" class="w-full h-40 object-contain">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2"><?= $d['nama_produk'] ?></h3>
                            <div class=" flex items-center justify-between ">
                                <p class="text-sm text-gray-600">Lokasi Gudang</p>
                                <p class="text-sm text-gray-600"><?= $d['nama_lokasi'] ?> </p>
                            </div>
                            <div class=" flex items-center justify-between ">
                                <p class="text-sm text-gray-600">Jumlah Stok</p>
                                <p class="text-sm text-gray-600"> <span class="ml-1 <?= $d['jumlah_stok'] < $d['stok_minimal'] ? 'text-red-600 font-semibold' : 'text-gray-800' ?>">
                                        <?= $d['jumlah_stok'] ?></span></p>
                            </div>
                            <br>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold text-xl">Highest Product on Stock</h2>
                    <a href="../stok_saat_ini/total_stok_view.php">
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php
                    include 'db_connection.php';
                    $query = "SELECT 
                            s.id_stok,
                            s.jumlah_stok,
                            s.tanggal_diperbarui,
                            s.tanggal_terakhir_masuk,
                            p.kode_produk,
                            p.nama_produk,
                            p.gambar_produk,
                            p.stok_minimal,
                            l.nama_lokasi
                            FROM stok_saat_ini s
                            JOIN produk p ON s.id_produk = p.id_produk
                            JOIN lokasi_gudang l ON s.id_lokasi = l.id_lokasi 
                            ORDER BY s.jumlah_stok DESC
                            LIMIT 1";
                    $data = mysqli_query($connection, $query);
                    foreach ($data as $d) :
                    ?>
                        <div class="bg-white shadow-md rounded-2xl p-4 transform hover:scale-105 transition duration-300">
                            <img src="<?= $d['gambar_produk'] ?>" class="w-full h-40 object-contain">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2"><?= $d['nama_produk'] ?></h3>
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-600">Lokasi Gudang</p>
                                <p class="text-sm text-gray-600"><?= $d['nama_lokasi'] ?></p>
                            </div>


                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-600">Jumlah Stok</p>
                                <p class="text-sm <?= $d['jumlah_stok'] < $d['stok_minimal'] ? 'text-red-600 font-semibold' : 'text-gray-800' ?>">
                                    <?= $d['jumlah_stok'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </section>


         <?php

        $query = "SELECT sm.tanggal_masuk, sm.jumlah_masuk, p.nama_produk, p.gambar_produk, s.nama_supplier
          FROM stok_masuk sm
          JOIN produk p ON sm.id_produk = p.id_produk
          JOIN supplier s ON sm.id_supplier = s.id_supplier
          ORDER BY sm.tanggal_masuk DESC
          LIMIT 5";

        $result = mysqli_query($connection, $query);
        ?>

            <div class="w-full bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Recently Added Stock</h2>
                <a href="../stokMasuk/stok_masuk_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="bg-white shadow-md rounded-2xl p-4 transform hover:scale-105 transition duration-300">
                <img src="<?= $row['gambar_produk'] ?>" alt="Product Image" class="w-full h-40 object-contain">
                <h3 class="text-lg font-semibold text-gray-800 mb-2"><?= htmlspecialchars($row['nama_produk']) ?></h3>
                <p class="text-sm text-gray-600"><span class="font-medium"><?= htmlspecialchars($row['nama_supplier']) ?></span></p>
                <p class="text-sm text-gray-600"><span class="font-medium"><?= $row['jumlah_masuk'] ?></span></p>
                <p class="text-sm text-gray-600"><span class="font-medium"><?= $row['tanggal_masuk'] ?></span></p>
            </div>
        <?php endwhile; ?>
    </div>
</div>


        <?php
$query = "SELECT sk.tanggal_keluar, sk.jumlah_keluar, sk.tipe_keluar, p.nama_produk, p.gambar_produk, l.nama_lokasi
          FROM stok_keluar sk
          JOIN produk p ON sk.id_produk = p.id_produk
          JOIN lokasi_gudang l ON sk.id_lokasi = l.id_lokasi
          ORDER BY sk.tanggal_keluar DESC
          LIMIT 5";

$result = mysqli_query($connection, $query);
?>

<div class="w-full bg-white rounded-xl shadow-md p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Outed Stock by Exit Type</h2>
        <a href="../stok_keluar/stok_keluar_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
        </a>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-medium text-gray-700 bg-gray-50">
            <tr>
                <th class="px-6 py-3">Product Image</th>
                <th class="px-6 py-3">Product Name</th>
                <th class="px-6 py-3">Location</th>
                <th class="px-6 py-3">Exit Stock Amount</th>
                <th class="px-6 py-3">Exit Type</th>
                <th class="px-6 py-3">Date of Exit</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <img class="w-20 h-20 object-contain" src="<?= $row['gambar_produk'] ?>" alt="Product Image">
                    </td>
                    <td class="px-6 py-4"><?= htmlspecialchars($row['nama_produk']) ?></td>
                    <td class="px-6 py-4"><?= htmlspecialchars($row['nama_lokasi']) ?></td>
                    <td class="px-6 py-4"><?= $row['jumlah_keluar'] ?></td>
                    <td class="px-6 py-4"><?= $row['tipe_keluar'] ?></td>
                    <td class="px-6 py-4"><?= $row['tanggal_keluar'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


</html>