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

        <div class="flex ml-64 flex-col w-full h-full overflow-y-auto px-5 py-6 ">
            <div class="flex w-full  justify-between mb-6">
                <a href="produk_view.php">
                    <button class="p-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Kembali
                    </button>
                </a>
                <div class="flex items-center gap-6">
                   
                </div>
            </div>
            <?php
            include 'db_connection.php';
            $id_produk = $_GET['id_produk'];
            $data = mysqli_query($connection, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <form class="space-y-2" action="updateProduk.php" method="post" enctype="multipart/form-data">
                    <div class="flex flex-col w-full h-full bg-white rounded-xl p-5">
                        <div class="flex items-center justify-center">
                            <label
                                class="cursor-pointer flex flex-col w-1/2 h-1/2 bg-gray-100 p-5 rounded-lg items-center justify-center">
                                <?php if (!empty($d['gambar_produk'])): ?>

                                    <img src="<?php echo $d['gambar_produk']; ?>" alt="Gambar Produk">

                                <?php endif; ?>
                                <input type="file" class="hidden" name="gambar_produk" />
                            </label>
                        </div>
                        <div>
                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                            <label class="text-sm font-medium block mb-1">Kode Produk *</label>
                            <input type="text" placeholder="PRD001" name="kode_produk"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $d["kode_produk"] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Nama Produk *</label>
                            <input type="text" placeholder="Kertas A4" name="nama_produk"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $d["nama_produk"] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1 ">Deskripsi Produk</label>
                            <textarea placeholder="Describe your product" name="deskripsi"
                                class=" w-full   border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 "><?php echo $d["deskripsi"] ?></textarea>
                        </div>
                        <div class="flex gap-2 justify-between">
                            <div>
                                <label class="text-sm font-medium block mb-1">Stok Minimal </label>
                                <input type="number" placeholder="Enter amount" name="stok_minimal"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $d["stok_minimal"] ?>" />
                            </div>
                            <div>
                                <label class="text-sm font-medium block mb-1">Satuan </label>
                                <input type="text" placeholder="Masukkan Satuan" name="satuan"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $d["satuan"] ?>" />
                            </div>
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1 text-red-600">Harga Beli</label>
                            <input type="number" placeholder="Enter amount" name="harga_beli"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $d["harga_beli"] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1 text-green-600">Harga Jual</label>
                            <input type="number" placeholder="Enter amount" name="harga_jual"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $d["harga_jual"] ?>" ? />
                        </div>

                        <div class="flex justify-end w-full h-fit ">
                            <button class="p-5 bg-blue-600 text-white py-2 mt-5 rounded hover:bg-blue-700" type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>

</body>

</html>