<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 text-gray-800 h-full w-full">

    <div class="flex h-full w-full overflow-hidden">
        <?php include '../component/sidebar.php'; ?>

        <div class="ml-64 flex flex-col w-full h-full overflow-y-auto px-5 py-6 ">
            <div class="flex w-full  justify-between mb-6">
                <a href="../supplier/supplier_view.php">
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
                $id_supplier = $_GET['id_supplier'];
                $data = mysqli_query($connection, "SELECT * FROM supplier WHERE id_supplier = '$id_supplier'");
                foreach ($data as $d): ?>
                    <form class="space-y-2" action="update.php" method="post">
                        <input type="hidden" name="id_supplier" value="<?= $id_supplier ?>">
                        <div>
                            <label class="text-sm font-medium block mb-1">Supplier Name</label>
                            <input type="text" placeholder="Supplier 1" name="nama_supplier"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['nama_supplier'] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Address</label>
                            <input type="text" placeholder="Address" name="alamat"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['alamat'] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Phone</label>
                            <input type="text" placeholder="Phone" name="telepon"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['telepon'] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Email</label>
                            <input type="text" placeholder="Email" name="email"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['email'] ?>" />
                        </div>
                        <div>
                            <label class="text-sm font-medium block mb-1">Contact Person</label>
                            <input type="text" placeholder="Contact Person" name="kontak_person"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="<?= $d['kontak_person'] ?>" />
                        </div>
                        <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700 " type="submit">
                            Save Changes
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

</body>

</html>