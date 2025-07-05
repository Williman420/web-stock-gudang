<!DOCTYPE html>
<html lang="en">

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
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <input type="text" placeholder="Search for datas & reports..." class="px-4 py-2 rounded-md border w-96" />
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md"><i class="fa fa-search"></i></button>
            </div>
            <div class="flex items-center gap-6">
                <i class="fa-regular fa-comment-dots text-xl relative">
                    <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">1</span>
                </i>
                <i class="fa-regular fa-envelope text-xl relative">
                    <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">1</span>
                </i>
                <i class="fa-regular fa-bell text-xl relative">
                    <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">3</span>
                </i>
                <div class="flex items-center gap-2">
                    <img src="https://i.pravatar.cc/40" alt="User" class="rounded-full w-10 h-10" />
                    <span>John Doe</span>
                </div>
            </div>
        </div>

        <!-- Overview Cards -->
        <section class="grid grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-pink-500 to-indigo-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-user text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">10</h3>
                <p>suppliers</p>
            </div>
            <div class="bg-gradient-to-br from-green-400 to-teal-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-truck-ramp-box text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">1,086</h3>
                <p>stock in</p>
            </div>
            <div class="bg-gradient-to-br from-pink-400 to-orange-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-box text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">3,688</h3>
                <p>total stock</p>
            </div>
            <div class="bg-gradient-to-br from-yellow-300 to-green-400 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <i class="fa-solid fa-dollar-sign text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">IDR 13,060,386</h3>
                <p>stock sold</p>
            </div>
        </section>

        <!-- Dual Charts -->
        <section class="grid grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold text-xl">Low Product On Stock</h2>
                    <a href="../stok_saat_ini/total_stok_view.php">
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
                    </a>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Product</th>
                                <th>Product Name</th>
                                <th>location</th>
                                <th>Stock Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'db_connection.php';
                            $query = " SELECT 
                                  s.id_stok,
                                   s.jumlah_stok,
                                  s.tanggal_diperbarui,
                                   s.tanggal_terakhir_masuk,
                                   p.kode_produk,
                                  p.nama_produk,
                                   p.stok_minimal,
                                  l.nama_lokasi
                               FROM stok_saat_ini s
                               JOIN produk p ON s.id_produk = p.id_produk
                              JOIN lokasi_gudang l ON s.id_lokasi = l.id_lokasi WHERE s.jumlah_stok < p.stok_minimal
                               ORDER BY s.jumlah_stok ASC
                            ";


                            // Run query
                            $data = mysqli_query($connection, $query);


                            foreach ($data as $d) :
                            ?>
                                <tr>
                                    <td><?= $d['kode_produk'] ?></td>
                                    <td><?= $d['nama_produk'] ?></td>
                                    <td><?= $d['nama_lokasi'] ?></td>
                                    <td class="<?= $d['jumlah_stok'] < $d['stok_minimal'] ? 'text-red-600 font-semibold' : 'text-gray-800' ?>">
                                        <?= $d['jumlah_stok'] ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold text-xl">Recent Activities</h2>
                    <a href="../stok_keluar/stok_keluar_view.php">
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
                    </a>
                </div>
                <canvas id="chart2" class="w-full h-64"></canvas>
            </div>
        </section>


        <!-- Our Supplier -->
        <div class="mt-8 bg-white rounded-2xl shadow-md p-6 w-full  overflow-y-auto">
            <div class="flex justify-between items-center mb-4 ">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Our Supplier</h2>
                <a href="../supplier/supplier_view.php">
                    <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
                </a>
            </div>
            <div class="flex items-center justify-between py-4 border-t border-gray-200 first:border-t-0">
                <div class="flex items-center space-x-3 w-48">
                    <i class="fa-solid fa-address-card"></i>
                    <div>
                        <div class="text-sm text-gray-500">Supplier name:</div>
                        <div class="text-base font-semibold">Supplier 1</div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-500">ID Supplier:</div>
                    <div class="text-base font-semibold">SP001</div>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-500">Address:</div>
                    <div class="text-base font-semibold">Bali</div>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-500">Phone:</div>
                    <div class="text-base font-semibold">+123456789</div>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-500">Email:</div>
                    <div class="text-base font-semibold">supplier@supplier.com</div>
                </div>
            </div>


        </div>

    </main>
</body>

</html>