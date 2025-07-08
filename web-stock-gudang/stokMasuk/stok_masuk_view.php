<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f8f9fc;
      padding: 0px;
      margin: 0;
    }

    .container {
      background: #fff;
      border-radius: 8px;
      padding: 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
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

    th, td {
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
                            href="login.php"
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
                          <th>ID Stock</th>
                          <th>ID Product</th>
                          <th>ID Location</th>
                          <th>ID Supplier</th>
                          <th>Stock Amount</th>
                          <th>Date of Entry</th>
                          <th>Reference Number</th>
                          <th>Description</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead
                    <tbody>
                      <tr><td>ST001</td><td>PRD001</td><td>L001</td><td>SP001</td><td>33</td><td>2024/11/28</td><td>1</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST001')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST002</td><td>PRD002</td><td>L002</td><td>SP002</td><td>47</td><td>2024/10/09</td><td>2</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST002')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST003</td><td>PRD003</td><td>L003</td><td>SP003</td><td>66</td><td>2023/01/12</td><td>3</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST003')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST004</td><td>PRD004</td><td>L004</td><td>SP004</td><td>41</td><td>2024/10/13</td><td>4</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST004')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST005</td><td>PRD005</td><td>L005</td><td>SP005</td><td>28</td><td>2025/06/07</td><td>5</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST005')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST006</td><td>PRD006</td><td>L006</td><td>SP006</td><td>61</td><td>2024/12/02</td><td>6</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST006')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST007</td><td>PRD007</td><td>L007</td><td>SP007</td><td>38</td><td>2024/05/03</td><td>7</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST007')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST008</td><td>PRD008</td><td>L008</td><td>SP008</td><td>21</td><td>2024/12/12</td><td>8</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST008')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST009</td><td>PRD009</td><td>L009</td><td>SP009</td><td>46</td><td>2025/12/06</td><td>9</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST009')"class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>ST010</td><td>PRD010</td><td>L010</td><td>SP010</td><td>22</td><td>2025/03/29</td><td>10</td><td>Description</td><td class="p-3"><button onclick="window.location.href='../stokMasuk/edit_stok_masuk_view.php'"class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteStock('ST010')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
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
  function deleteStock(stockId) {
    const confirmed = confirm("Apakah Anda yakin ingin menghapus stock ini?");
    if (confirmed) {
      alert("Stock dengan ID " + stockId + " telah dihapus.");
      // window.location.href = `/delete/${stockId}`;
    }
  }
</script>
</body>
</html>