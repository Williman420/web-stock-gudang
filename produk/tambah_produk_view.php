<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewProduk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-full w-full">

    <div class="flex h-full w-full overflow-hidden">
        <?php include '../component/sidebar.php'; ?>

        <div class="flex flex-col w-full h-full overflow-y-auto px-5 py-6 ">
            <div class="flex w-full  justify-between mb-6">
                <a href="produk_view.php">
                    <button class="p-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Kembali
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
                <div class="flex items-center justify-center">
                    <div class="flex flex-col w-1/2 h-1/2 bg-gray-100 p-5 rounded-lg items-center justify-center">
                        <i class="fa-solid fa-plus"></i>
                        <p>add an Image</p>
                    </div>
                </div>
                <form class="space-y-2">
                    <div>
                        <label class="text-sm font-medium block mb-1">Kode Produk *</label>
                        <input type="text" placeholder="PRD001" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Nama Produk *</label>
                        <input type="text" placeholder="Kertas A4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 ">Deskripsi Produk</label>
                        <textarea placeholder="Describe your product" class=" w-full   border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 "></textarea>
                    </div>
                    <div class="flex gap-2 justify-between">
                        <div>
                            <label class="text-sm font-medium block mb-1">Qty </label>
                            <input type="number" placeholder="Enter amount" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Satuan </label>
                            <input type="text" placeholder="Masukkan Satuan" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 text-red-600">Harga Beli</label>
                        <input type="number" placeholder="Enter amount" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 text-green-600">Harga Jual</label>
                        <input type="number" placeholder="Enter amount" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
            </div>
        </div>
    </div>

</body>

</html>