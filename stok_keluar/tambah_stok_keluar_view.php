<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock Masuk</title>
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
                        <i class="fa-solid fa-user text-xl"></i>
                        <span>John Doe</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full h-full bg-white rounded-xl p-5">
                <?php
                include 'db_connection.php';
                $namaProduk =  mysqli_query($connection, "SELECT id_produk, nama_produk FROM produk");
                $idpelanggan =  mysqli_query($connection, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan");
                $tipeKeluar =  mysqli_query($connection, "SELECT tipe_keluar FROM stok_keluar");
                $idLokasi =  mysqli_query($connection, "SELECT id_lokasi, nama_lokasi FROM lokasi_gudang");
                ?>
                <form class="space-y-2" action="createStokKeluar.php" method="post">
                    <div>
                        <label class="text-sm font-medium block mb-1">Produk Name</label>
                        <select placeholder="pelanggan 1" name="id_produk" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Produk Name</option>
                            <?php foreach ($namaProduk as $produk) : ?>
                                <option value="<?= $produk['id_produk'] ?>"><?= $produk['nama_produk'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">pelanggan Name</label>
                        <select placeholder="pelanggan 1" name="id_pelanggan" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">pelanggan Name</option>
                            <?php foreach ($idpelanggan as $pelanggan) : ?>
                                <option value="<?= $pelanggan['id_pelanggan'] ?>"><?= $pelanggan['nama_pelanggan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Location Name</label>
                        <select placeholder="pelanggan 1" name="id_lokasi" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Location Name</option>
                            <?php foreach ($idLokasi as $lokasi) : ?>
                                <option value="<?= $lokasi['id_lokasi'] ?>"><?= $lokasi['nama_lokasi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Exit Type</label>
                        <select placeholder="pelanggan 1" name="tipe_keluar" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Penjualan">Exit Type</option>
                            <option value="Penjualan">Penjualan</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Lain-lain">Lain - lain</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Stock Amount</label>
                        <input type="text" placeholder="Stock Amount" required name="jumlah_keluar" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Reference Number</label>
                        <input type="text" placeholder="Reference Number" required name="nomor_referensi" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1 ">Details</label>
                        <textarea placeholder="Shipment Details" required name="keterangan"
                            class=" w-full   border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 "></textarea>
                    </div>
                    <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700" type="submit">
                        Add Stock Masuk
                    </button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>