<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Total Stock</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-full w-full">

    <div class="flex h-full w-full overflow-hidden">
        <?php include '../component/sidebar.php'; ?>

        <div class="ml-64 flex flex-col w-full h-full overflow-y-auto px-5 py-6 ">
            <div class="flex w-full  justify-between mb-6">
                <a href="../stok_saat_ini/total_stok_view.php">
                    <button class="p-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Back
                    </button>
                </a>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-user text-xl"></i>
                        <span>John Doe</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full h-full bg-white rounded-xl p-5">
                <form class="space-y-2">
                    <div>
                        <label class="text-sm font-medium block mb-1">ID Product</label>
                        <input type="text" placeholder="PRD001" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Product Name</label>
                        <input type="text" placeholder="Product 1" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 ">Location</label>
                        <input type="text" placeholder="Location" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 ">Stock Amount</label>
                        <input type="text" placeholder="0" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div class="flex gap-2 justify-between">
                        <div>
                            <label class="text-sm font-medium block mb-1">Date of Entry </label>
                            <input type="number" placeholder="YYYY/MM/DD" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Date of Exit</label>
                            <input type="text" placeholder="YYYY/MM/DD" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
                    <select name="supplier_id" class="w-full p-2 border rounded">
                        <option value="">-- Select Supplier --</option>

                        <?php
                        include 'db_connection.php';
                        $data = mysqli_query($connection, "SELECT * FROM supplier");
                        if (!$data) {
                            die("Query Error: " . mysqli_error($connection));
                        }
                        foreach ($data as $d) :
                        ?>
                            <option value=<? $d['nama_supplier'] ?>> <? $d['nama_supplier'] ?></option>
                        <?php endforeach ?>
                    </select>

                </form>
                <br>
                <div class="flex justify-between items-center mb-4">
                    <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Add Stock
                    </button>
                </div>
            </div>
        </div>

</body>

</html>