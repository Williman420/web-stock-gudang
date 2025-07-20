<!DOCTYPE html>
<html lang="en">
<?php include '../view/auth.php'; ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>customer</title>
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

      <div class="container">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold">Our customer</h2>
          <a href="tambah_pelanggan_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
              Add customer
            </button>
          </a>
        </div>
        <br>
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID customer</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db_connection.php';
              $data = mysqli_query($connection, 'SELECT * FROM pelanggan');

              foreach ($data as $d) :
              ?>
                <tr>
                  <td><?= $d['id_pelanggan'] ?></td>
                  <td><?= $d['nama_pelanggan'] ?></td>
                  <td><?= $d['alamat'] ?></td>
                  <td><?= $d['telepon'] ?></td>
                  <td><?= $d['email'] ?></td>
                  <td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php?id_pelanggan=<?= $d['id_pelanggan'] ?>'" class="w-full bg-blue-700 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td>
                  <td class="p-3"><button onclick="deletePelanggan('<?= $d['id_pelanggan'] ?>')" class="w-full bg-red-700 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td>
                </tr>
              <?php endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    function deletePelanggan(pelangganID) {
      const confirmed = confirm("Apakah Anda yakin ingin menghapus customer ini?");
      if (confirmed) {
        window.location.href = '../pelanggan/delete.php?id_pelanggan=' + pelangganID;
      }
    }
  </script>
</body>

</html>