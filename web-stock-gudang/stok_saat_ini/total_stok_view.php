<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Total Stock</title>
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

           <div class="container">
              <h2 class="text-2xl font-semibold">Total Stock</h2>
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
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                    </thead
                    <tbody>
                      <tr><td>PRD001</td><td>Product 1</td><td>Tokyo</td><td>33</td><td>2024/11/28</td><td></td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD002</td><td>Product 2</td><td>London</td><td>47</td><td>2024/10/09</td><td></td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD003</td><td>Product 3</td><td>San Francisco</td><td>66</td><td>2023/01/12</td><td></td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD004</td><td>Product 4</td><td>London</td><td>41</td><td>2024/10/13</td><td></td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD005</td><td>Product 5</td><td>San Francisco</td><td>28</td><td>2025/06/07</td><td>2025/11/21</td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD006</td><td>Product 6</td><td>New York</td><td>61</td><td>2024/12/02</td><td></td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD007</td><td>Product 7</td><td>London</td><td>38</td><td>2024/05/03</td><td></td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD008</td><td>Product 8</td><td>New York</td><td>21</td><td>2024/12/12</td><td>2025/05/27</td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD009</td><td>Product 9</td><td>New York</td><td>46</td><td>2025/12/06</td><td>2025/12/28</td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
                      <tr><td>PRD010</td><td>Product 10</td><td>Edinburgh</td><td>22</td><td>2025/03/29</td><td>2025/7/5</td><td class="p-3"><button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 flex justify-center items-center"><i class="fa fa-pencil"></i></button></td><td class="p-3"><button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 flex justify-center items-center"><i class="fa fa-trash"></i></button></td></tr>
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