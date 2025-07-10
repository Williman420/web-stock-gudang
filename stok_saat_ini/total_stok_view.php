<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD:stok_saat_ini/total_stok_view.php

=======
>>>>>>> 1612d3249b602bd08771e5eff8799dbcea511304:web-stock-gudang/stok_saat_ini/total_stok_view.php
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Total Stock</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f8f9fc;
      padding: 0px;
      margin: 0;
    }

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

    td {
      padding: 12px 16px;
      border: 1px solid #e3e6f0;
      text-align: left;
    }

    th {
      font-weight: 600;
      white-space: nowrap;
    }

    .pagination {
      margin-top: 20px;
      text-align: right;
    }

    .pagination a {
      padding: 6px 12px;
      margin: 0 2px;
      border: 1px solid #ddd;
      border-radius: 4px;
      text-decoration: none;
      color: #4e73df;
      font-size: 14px;
    }

    .pagination a.active {
      background-color: #4e73df;
      color: #fff;
    }
  </style>
</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

  <div class="flex h-full">
    <!-- Sidebar -->
    <?php include '../component/sidebar.php'; ?>

    <!-- Main content (scrollable only here) -->
    <div class="ml-64 flex-1 p-6 space-y-6 overflow-auto">
      <div class="w-full h-fit flex justify-between mb-6">
        <div class="flex items-center gap-2">
          <input type="text" placeholder="Search for datas & reports..." class="px-4 py-2 rounded-md border w-96" />
          <button class="bg-blue-600 text-white px-4 py-2 rounded-md">
            <i class="fa fa-search"></i>
          </button>
        </div>
        <div class="flex items-center gap-6">
          <div class="flex items-center gap-2">
            <button id="userButton" class="flex items-center space-x-2 focus:outline-none">
              <i class="fa-solid fa-user text-xl"></i>
              <span>Admin</span>
            </button>
            <div
              id="dropdownMenu"
              class="hidden absolute right-5 mt-20 w-20 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                <a
                  <?php
                  session_start();
                  if (!isset($_SESSION['user_id'])) {
                  header("Location:../view/login.php"); 
                  exit;
                  }
                  ?>
                  href="../view/login.php"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                  Logout
                </a>
            </div>
          </div>
        </div>
      </div>

      <script>
              const userButton = document.getElementById('userButton');
              const dropdownMenu = document.getElementById('dropdownMenu');

              userButton.addEventListener('click', () => {
                  dropdownMenu.classList.toggle('hidden');
                });

              // Optional: close dropdown if clicked outside
              window.addEventListener('click', function (e) {
                  if (!userButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                      dropdownMenu.classList.add('hidden');
                    }
                });
            </script>

      <div class="container">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold">Total Stock</h2>

        </div>
        <br>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID Product</th>
                <th>Product Name</th>
                <th>Location</th>
                <th>Stock Amount</th>
                <th>Date of Entry</th>
                <th>Date of Exit</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connection.php';
              $query = "
    SELECT 
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
    JOIN lokasi_gudang l ON s.id_lokasi = l.id_lokasi
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
                  </td>
                  <td><?= date('Y/m/d', strtotime($d['tanggal_terakhir_masuk'])) ?></td>
                  <td><?= date('Y/m/d', strtotime($d['tanggal_diperbarui'])) ?></td>

                </tr>
              <?php endforeach ?>
            </tbody>

          </table>
        </div>

        <div class="pagination">
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">Next</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>