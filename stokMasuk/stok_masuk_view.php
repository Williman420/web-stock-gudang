
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location:../view/login.php");
  exit;
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stock Masuk</title>
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

        window.addEventListener('click', function(e) {
          if (!userButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
          }
        });
      </script>

      <div class="container">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold">Stock Masuk</h2>
          <a href="tambah_stok_masuk_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
              Add Stock Masuk
            </button>
          </a>
        </div>
        <br>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Kode Product</th>
                <th>ID Supplier</th>
                <th>Product Name</th>
                <th>location</th>
                <th>Stock Amount</th>
                <th>Reference Code</th>
                <th>Stock Input Details</th>
                <th>Date of Entry</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "db_connection.php";
              $query = "SELECT
    p.kode_produk,
    s.nama_supplier,
    p.nama_produk,
    l.nama_lokasi,
    sm.jumlah_masuk,
    sm.keterangan,
    sm.nomor_referensi,
    DATE_FORMAT(sm.tanggal_masuk, '%Y/%m/%d') AS date_of_entry,
    sm.id_stok_masuk
FROM
    produk p
 JOIN stok_masuk sm ON
    p.id_produk = sm.id_produk
 JOIN supplier s ON
    sm.id_supplier = s.id_supplier
     JOIN lokasi_gudang l ON 
    sm.id_lokasi = l.id_lokasi";
              $data = mysqli_query($connection, $query);
              foreach ($data as $d) :
              ?>
                <tr>
                  <td> <?= $d['id_stok_masuk'] ?> </td>
                  <td> <?= $d['kode_produk'] ?> </td>
                  <td> <?= $d['nama_supplier'] ?> </td>
                  <td> <?= $d['nama_produk'] ?> </td>
                  <td> <?= $d['nama_lokasi'] ?> </td>
                  <td> <?= $d['jumlah_masuk'] ?> </td>
                  <td> <?= $d['nomor_referensi'] ?> </td>
                  <td> <?= $d['keterangan'] ?> </td>
                  <td> <?= $d['date_of_entry'] ?> </td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>

        
      </div>
    </div>
  </div>
  <script>
    function deleteProduct(productId) {
      const confirmed = confirm("Apakah Anda yakin ingin menghapus stock ini?");
      if (confirmed) {
        alert("Produk dengan ID " + productId + " telah dihapus.");
        // window.location.href = `/delete/${productId}`;
      }
    }
  </script>
</body>

</html>