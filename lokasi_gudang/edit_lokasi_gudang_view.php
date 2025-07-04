<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-full w-full">

    <div class="flex  h-full w-full overflow-hidden">
        <?php include '../component/sidebar.php'; ?>

        <div class="flex ml-64 flex-col w-full h-full overflow-y-auto px-5 py-6 ">
            <div class="flex w-full  justify-between mb-6">
                <a href="../lokasi_gudang/lokasi_gudang_view.php">
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
                // Include database connection
                include 'db_connection.php';
                $id_lokasi = $_GET['id_lokasi'];
                $data = mysqli_query($connection, "SELECT * FROM lokasi_gudang WHERE id_lokasi= '$id_lokasi'");
                foreach ($data as $d): ?>
                    <form class="space-y-2" action="updateLokasi.php" method="post">
                        <input type="hidden" name="id_lokasi" value="<?= $id_lokasi ?>">
                        <div>
                            <label class="text-sm font-medium block mb-1">Kode Lokasi</label>
                            <input type="text" placeholder="lokasi1" name="kode_lokasi"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['kode_lokasi'] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">lokasiName</label>
                            <input type="text" placeholder="lokasi1" name="nama_lokasi"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['nama_lokasi'] ?>" />
                        </div>

                        <div>
                            <label class="text-sm font-medium block mb-1">Capacity</label>
                            <input type="text" placeholder="capacity" name="kapasitas"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['kapasitas'] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Desciption</label>
                            <input type="text" placeholder="Email" name="deskripsi"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['deskripsi'] ?>" />
                        </div>
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700 " type="submit">
                            Save Changes
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>
            <br>

        </div>
    </div>

</body>

</html>