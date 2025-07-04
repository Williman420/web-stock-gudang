<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stock keluar</title>
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

      <div class="container">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold">Stock keluar</h2>
          <a href="tambah_stok_keluar_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
              Add Stock keluar
            </button>
          </a>
        </div>
        <br>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID Stock keluar</th>
                <th>Kode Product</th>
                <th>Nama Pelanggan</th>
                <th>Product Name</th>
                <th>location</th>
                <th>Jumlah Keluar</th>
                <th>Tipe Keluar</th>
                <th>Keterangan</th>
                <th>Tanggal Keluar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "db_connection.php";
              $query = "SELECT
    p.kode_produk,
    pl.nama_pelanggan,
    p.nama_produk,
    l.nama_lokasi,
    sk.jumlah_keluar,
    sk.keterangan,
    sk.tipe_keluar,
    DATE_FORMAT(sk.tanggal_keluar, '%Y/%m/%d') AS date_of_exit,
    sk.id_stok_keluar
FROM
    produk p
 JOIN stok_keluar sk ON
    p.id_produk = sk.id_produk
 JOIN pelanggan pl ON
    sk.id_pelanggan = pl.id_pelanggan
     JOIN lokasi_gudang l ON 
    sk.id_lokasi = l.id_lokasi";
              $data = mysqli_query($connection, $query);
              foreach ($data as $d) :
              ?>
                <tr>
                  <td> <?= $d['id_stok_keluar'] ?> </td>
                  <td> <?= $d['kode_produk'] ?> </td>
                  <td> <?= $d['nama_pelanggan'] ?> </td>
                  <td> <?= $d['nama_produk'] ?> </td>
                  <td> <?= $d['nama_lokasi'] ?> </td>
                  <td> <?= $d['jumlah_keluar'] ?> </td>
                  <td> <?= $d['tipe_keluar'] ?> </td>
                  <td> <?= $d['keterangan'] ?> </td>
                  <td> <?= $d['date_of_exit'] ?> </td>
                  
                </tr>
              <?php endforeach; ?>
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