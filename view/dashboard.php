<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>kontol Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex min-h-screen bg-gray-100 text-gray-800">

    <!-- Sidebar -->
    <?php
    include '../component/sidebar.php'; ?>

    <!-- Main Content --> 
    <main class="flex-1 p-6 space-y-6">

        <!-- Top Bar -->
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <input type="text" placeholder="Search for datas & reports..." class="px-4 py-2 rounded-md border w-96" />
                <button class="bg-blue-600 text-white px-4 py-2 rounded-md"><i class="fa fa-search"></i></button>
            </div>
            <div class="flex items-center gap-6">
                <i class="fa-regular fa-comment-dots text-xl relative"><span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">1</span></i>
                <i class="fa-regular fa-envelope text-xl relative"><span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">1</span></i>
                <i class="fa-regular fa-bell text-xl relative"><span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">3</span></i>
                <div class="flex items-center gap-2">
                    <img src="https://i.pravatar.cc/40" alt="User" class="rounded-full w-10 h-10" />
                    <span>Mas Nimas</span>
                </div>
            </div>
        </div>

        <!-- Overview Cards -->
        <section class="grid grid-cols-4 gap-6">
            <div class="bg-gradient-to-br from-pink-500 to-indigo-500 text-white p-6 rounded-lg shadow-md">
                <i class="fa-solid fa-user text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">10</h3>
                <p>members online</p>
            </div>
            <div class="bg-gradient-to-br from-green-400 to-teal-500 text-white p-6 rounded-lg shadow-md">
                <i class="fa-solid fa-cart-shopping text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">1,303,678</h3>
                <p>items sold</p>
            </div>
            <div class="bg-gradient-to-br from-pink-400 to-orange-500 text-white p-6 rounded-lg shadow-md">
                <i class="fa-solid fa-calendar-days text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">109,909</h3>
                <p>this week</p>
            </div>
            <div class="bg-gradient-to-br from-yellow-300 to-green-400 text-white p-6 rounded-lg shadow-md">
                <i class="fa-solid fa-dollar-sign text-3xl mb-2"></i>
                <h3 class="text-3xl font-bold">$1,909,789</h3>
                <p>total earnings</p>
            </div>
        </section>

        <!-- Charts Placeholder -->
        <section class="grid grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="font-semibold text-xl mb-4">Recent Reports</h2>
                <p class="text-gray-500">[Chart Placeholder]</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="font-semibold text-xl mb-4">Char By %</h2>
                <p class="text-gray-500">[Pie Chart Placeholder]</p>
            </div>
        </section>
    </main>

</body>

</html>