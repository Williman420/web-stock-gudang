<!DOCTYPE html>
<html lang="en">
 <?php
session_start();
if (!isset($_SESSION['user_id'])) {
header("Location:../view/login.php"); 
exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-screen overflow-hidden">

    <div class="flex h-full overflow-auto"  >
        <!-- Sidebar (fixed width) -->
        <?php include '../component/sidebar.php'; ?>

        <!-- Main Content (scrollable) -->
        <div class="flex-1 ml-64 px-5 py-6">
            <div class="w-full flex justify-between mb-6">
                <a href="produk_view.php">
                    <button class="p-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Back
                    </button>
                </a>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <button id="userButton" class="flex items-center space-x-2 focus:outline-none">
                          <i class="fa-solid fa-user text-xl"></i>
                          <span><?php echo $_SESSION['username']; ?><</span>
                        </button>
                        <div
                        
                            id="dropdownMenu"
                            class="hidden absolute right-4 mt-20 w-20 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <a
                                href="../view/logout.php"
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

            <main class="min-w-fit min-h-full ">
                <div class="flex w-full h-full">
                    <?php
                    include 'db_connection.php';
                    $id = $_GET['kode_produk'];
                    $data = mysqli_query($connection, "SELECT * FROM produk where kode_produk = '$id'");
                    foreach ($data as $d) :
                    ?>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden w-full h-full">
                            <img src="<?php echo $d['gambar_produk']; ?>" alt="Gambar Produk">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-bold"><?= $d['kode_produk'] ?></h3>
                                    <div class="flex items-center gap-1">
                                        <h3 class="text-lg font-semibold">Stock Minimal: <?= $d['stok_minimal'] ?></h3>
                                        <h3 class="text-lg font-semibold"><?= $d['satuan'] ?></h3>
                                    </div>
                                </div>
                                <div class="bg-black h-0.5 w-full"></div>
                                <p class="text-gray-600 text-sm font-semibold"><?= $d['nama_produk'] ?></p>
                                <div class="mt-2 flex justify-between">
                                    <div class="flex-col justify-between items-start gap-1">
                                        <p class="text-gray-600 text-sm"><?= $d['deskripsi'] ?></p>
                                        <h3 class="text-m font-bold text-red-500">Harga beli = <?= $d['harga_beli'] ?></h3>
                                        <h3 class="text-m font-bold text-green-600">Harga jual = <?= $d['harga_beli'] ?></h3>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="edit_produk.php?id_produk=<?= $d['id_produk'] ?>">
                                            <button class="p-5 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                                                Edit
                                            </button>
                                        </a>
                                        <a href="deleteProduk.php?id_produk=<?= $d['id_produk'] ?>">
                                            <button class="p-5 bg-red-600 text-white py-2 rounded hover:bg-red-500">
                                                Delete
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </main>
        </div>
    </div>

</body>

</html>