<aside class="w-64 h-screen fixed top-0 left-0 bg-white shadow-md z-10 border-r">
    <div class="p-6 font-bold text-xl flex items-center gap-2">Dashboard</div>

    <nav class="flex flex-col space-y-2 px-6">
        <!-- todo make an active button and shit idk if active purple and not black-->
        <a href="../view/dashboard.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-gauge"></i>
            <p>Dashboard</p>
        </a>
        <a href="../produk/produk_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-box"></i>
            <p>Product</p>
        </a>
        <a href="../stok_saat_ini/total_stok_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-boxes-stacked"></i>
            <p>Total Stock</p>
        </a>
        <a href="../stokMasuk/stok_masuk_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-truck-ramp-box"></i>
            <p>Stock Masuk</p>
        </a>
        <a href="../stok_keluar/stok_keluar_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-truck-fast"></i>
            <p>Stock Keluar</p>
        </a>
        <a href="../supplier/supplier_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-user"></i>
            <p>Supplier</p>
        </a>
        <a href="../pelanggan/pelanggan_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-users"></i>
            <p>Customer</p>
        </a>
        <a href="../lokasi_gudang/lokasi_gudang_view.php" class=" w-full px-4 py-3 rounded-md flex items-center gap-3 text-black font-semibold hover:bg-gray-100 hover:text-blue-700">
            <i class="fa-solid fa-globe"></i>
            <p>Location</p>
        </a>

    </nav>
</aside>