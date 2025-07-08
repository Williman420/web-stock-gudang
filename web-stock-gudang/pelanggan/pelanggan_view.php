<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer</title>
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
                <h2 class="text-2xl font-semibold">Our Customer</h2>
                <a href="tambah_pelanggan_view.php">
                  <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Add Customer
                  </button>
                </a>
              </div>
              <br>
              <div class="table-container">
                <table>
                  <thead>
                      <tr>
                          <th>ID Customer</th>
                          <th>Customer Name</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead
                    <tbody>
                      <tr><td>CS001</td><td>Customer 1</td><td>Tokyo</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS001')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS002</td><td>Customer 2</td><td>London</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS002')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS003</td><td>Customer 3</td><td>San Francisco</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS003')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS004</td><td>Customer 4</td><td>London</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS004')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS005</td><td>Customer 5</td><td>San Francisco</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS005')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS006</td><td>Customer 6</td><td>New York</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS006')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS007</td><td>Customer 7</td><td>London</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('SCS007')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS008</td><td>Customer 8</td><td>New York</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS008')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS009</td><td>Customer 9</td><td>New York</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('CS009')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>CS010</td><td>Customer 10</td><td>Edinburgh</td><td>+123456789</td><td>customer@customer.com</td><td class="p-3"><button onclick="window.location.href='../pelanggan/edit_pelanggan_view.php'" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button onclick="deleteCustomer('SCS010')" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
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
  function deleteCustomer(customerId) {
    const confirmed = confirm("Apakah Anda yakin ingin menghapus customer ini?");
    if (confirmed) {
      alert("Customer dengan ID " + customerId + " telah dihapus.");
      // window.location.href = `/delete/${customerId}`;
    }
  }
</script>
</body>
</html>