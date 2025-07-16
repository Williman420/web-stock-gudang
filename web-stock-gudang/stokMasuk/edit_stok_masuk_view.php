<!DOCTYPE html>
<html lang="en">
 <?php include '../view/auth.php'; ?>
                            
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stock Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-full w-full">

    <div class="flex h-full w-full overflow-hidden">
        <?php include '../component/sidebar.php'; ?>

        <div class="ml-64 flex flex-col w-full h-full overflow-y-auto px-5 py-6 ">
            <div class="flex w-full  justify-between mb-6">
                <a href="../stokMasuk/stok_masuk_view.php">
                    <button class="p-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Back
                    </button>
                </a>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <button id="userButton" class="flex items-center space-x-2 focus:outline-none">
                          <i class="fa-solid fa-user text-xl"></i>
                          <span> <?php echo $_SESSION['username']; ?></span>
                        </button>
                        <div
                          id="dropdownMenu"
                          class="hidden absolute right-4 mt-20 w-20 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                          <a
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
            
            <div class="flex flex-col w-full h-full bg-white rounded-xl p-5">
                <form class="space-y-2">
                    <div>
                        <label class="text-sm font-medium block mb-1">ID Product</label>
                        <input type="text" placeholder="PRD001" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">ID Supplier</label>
                        <input type="text" placeholder="SP001" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 ">Product Name</label>
                        <input type="text" placeholder="Product 1" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
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
                            <label class="text-sm font-medium block mb-1">Purchase Price</label>
                            <input type="text" placeholder="0" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
            </div>
            <br>
            <div class="flex justify-between items-center mb-4">
                <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save Changes
                 </button>
            </div>
        </div>
    </div>

</body>

</html>