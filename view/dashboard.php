<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="flex min-h-screen bg-gray-100 text-gray-800">

  <!-- Sidebar -->
  <?php include '../component/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="ml-64 flex-1 p-6 space-y-6">

    <!-- Top Bar -->
    <div class="flex justify-between items-center">
      <div class="flex items-center gap-2">
        <input type="text" placeholder="Search for datas & reports..." class="px-4 py-2 rounded-md border w-96" />
        <button class="bg-blue-600 text-white px-4 py-2 rounded-md"><i class="fa fa-search"></i></button>
      </div>
      <div class="flex items-center gap-6">
        <i class="fa-regular fa-comment-dots text-xl relative">
          <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">1</span>
        </i>
        <i class="fa-regular fa-envelope text-xl relative">
          <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">1</span>
        </i>
        <i class="fa-regular fa-bell text-xl relative">
          <span class="absolute top-0 right-0 text-xs bg-red-500 text-white rounded-full w-5 h-5 flex justify-center items-center">3</span>
        </i>
        <div class="flex items-center gap-2">
          <img src="https://i.pravatar.cc/40" alt="User" class="rounded-full w-10 h-10" />
          <span>John Doe</span>
        </div>
      </div>
    </div>

    <!-- Overview Cards -->
    <section class="grid grid-cols-4 gap-6">
      <div class="bg-gradient-to-br from-pink-500 to-indigo-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
        <i class="fa-solid fa-user text-3xl mb-2"></i>
        <h3 class="text-3xl font-bold">10</h3>
        <p>suppliers</p>
      </div>
      <div class="bg-gradient-to-br from-green-400 to-teal-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
        <i class="fa-solid fa-truck-ramp-box text-3xl mb-2"></i>
        <h3 class="text-3xl font-bold">1,086</h3>
        <p>stock in</p>
      </div>
      <div class="bg-gradient-to-br from-pink-400 to-orange-500 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
        <i class="fa-solid fa-box text-3xl mb-2"></i>
        <h3 class="text-3xl font-bold">3,688</h3>
        <p>total stock</p>
      </div>
      <div class="bg-gradient-to-br from-yellow-300 to-green-400 text-white p-6 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
        <i class="fa-solid fa-dollar-sign text-3xl mb-2"></i>
        <h3 class="text-3xl font-bold">IDR 13,060,386</h3>
        <p>stock sold</p>
      </div>
    </section>

    <!-- Dual Charts -->
    <section class="grid grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
          <h2 class="font-semibold text-xl">Stock Masuk</h2>
          <a href="../stokMasuk/stok_masuk_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
          </a>
        </div>
        <canvas id="chart1" class="w-full h-64"></canvas>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
          <h2 class="font-semibold text-xl">Stock Keluar</h2>
          <a href="../stok_keluar/stok_keluar_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
          </a>
        </div>
        <canvas id="chart2" class="w-full h-64"></canvas>
      </div>
    </section>

    <!-- Total Stock Chart -->
    <div class="w-full bg-white rounded-xl shadow-md p-6">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Total Stock</h2>
        <a href="../stok_saat_ini/total_stok_view.php">
          <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
        </a>
      </div>
      <canvas id="behaviorChart" class="w-full h-[300px]"></canvas>
      <div class="flex flex-wrap gap-6 mt-6 text-sm text-gray-600">
        <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-500"></span> Produk 1</div>
        <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-400"></span> Produk 2</div>
        <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-400"></span> Produk 3</div>
      </div>
    </div>

    <!-- Our Supplier -->
    <section class="mt-8 bg-white rounded-2xl shadow-md p-6 w-full">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Our Supplier</h2>
        <a href="../pelanggan/pelanggan_view.php">
            <button class="p-3 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</button>
        </a>
      </div>

      <div class="flex items-center justify-between py-4 border-t border-gray-200 first:border-t-0">
        <div class="flex items-center space-x-3 w-48">
          <img src="https://flagcdn.com/id.svg" class="w-6 h-6 rounded-sm" />
          <div>
            <div class="text-sm text-gray-500">Supplier name:</div>
            <div class="text-base font-semibold">Supplier 1</div>
          </div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">ID Supplier:</div>
          <div class="text-base font-semibold">SP001</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Address:</div>
          <div class="text-base font-semibold">Bali</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Phone:</div>
          <div class="text-base font-semibold">+123456789</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Email:</div>
          <div class="text-base font-semibold">supplier@supplier.com</div>
        </div>
      </div>

      <div class="flex items-center justify-between py-4 border-t border-gray-200">
        <div class="flex items-center space-x-3 w-48">
          <img src="https://flagcdn.com/id.svg" class="w-6 h-6 rounded-sm" />
          <div>
            <div class="text-sm text-gray-500">Supplier name:</div>
            <div class="text-base font-semibold">Supplier 2</div>
          </div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">ID Supplier:</div>
          <div class="text-base font-semibold">SP002</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Address:</div>
          <div class="text-base font-semibold">Bali</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Phone:</div>
          <div class="text-base font-semibold">+123456789</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Email:</div>
          <div class="text-base font-semibold">supplier@supplier.com</div>
        </div>
      </div>

      <div class="flex items-center justify-between py-4 border-t border-gray-200">
        <div class="flex items-center space-x-3 w-48">
          <img src="https://flagcdn.com/id.svg" class="w-6 h-6 rounded-sm" />
          <div>
            <div class="text-sm text-gray-500">Supplier name:</div>
            <div class="text-base font-semibold">Supplier 3</div>
          </div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">ID Supplier:</div>
          <div class="text-base font-semibold">SP003</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Address:</div>
          <div class="text-base font-semibold">Bali</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Phone:</div>
          <div class="text-base font-semibold">+123456789</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Email:</div>
          <div class="text-base font-semibold">supplier@supplier.com</div>
        </div>
      </div>

      <div class="flex items-center justify-between py-4 border-t border-gray-200">
        <div class="flex items-center space-x-3 w-48">
          <img src="https://flagcdn.com/id.svg" class="w-6 h-6 rounded-sm" />
          <div>
            <div class="text-sm text-gray-500">Supplier name:</div>
            <div class="text-base font-semibold">Supplier 4</div>
          </div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">ID Supplier:</div>
          <div class="text-base font-semibold">SP004</div>
        </div>
         <div class="text-right">
          <div class="text-sm text-gray-500">Address:</div>
          <div class="text-base font-semibold">Bali</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Phone:</div>
          <div class="text-base font-semibold">+123456789</div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">Email:</div>
          <div class="text-base font-semibold">supplier@supplier.com</div>
        </div>
      </div>
    </section>

  </main>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    function renderChart(canvasId, data) {
      const ctx = document.getElementById(canvasId).getContext('2d');
      const gradient = ctx.createLinearGradient(0, 0, 0, 250);
      gradient.addColorStop(0, 'rgba(78, 115, 223, 0.3)');
      gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
            label: 'Sales',
            data: data,
            fill: true,
            backgroundColor: gradient,
            borderColor: '#4e73df',
            tension: 0.4,
            pointRadius: 0,
            borderWidth: 3
          }]
        },
        options: {
          responsive: true,
          plugins: { legend: { display: false } },
          scales: {
            y: { beginAtZero: true, grid: { drawBorder: false, color: '#eee' } },
            x: { grid: { drawBorder: false, color: '#f0f0f0' } }
          }
        }
      });
    }
    renderChart('chart1', [50, 40, 300, 220, 500, 240, 390, 200, 500]);
    renderChart('chart2', [60, 80, 200, 300, 400, 280, 330, 250, 490]);

    const ctx = document.getElementById('behaviorChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUNE', 'JUL', 'AUG'],
        datasets: [
          {
            label: 'Click',
            data: [50, 100, 70, 280, 350, 85, 120, 150],
            backgroundColor: '#e47c44',
            borderColor: '#ec5c24',
            fill: true,
            tension: 0.4,
            stack: 'stack1'
          },
          {
            label: 'Click Second Time',
            data: [20, 60, 150, 220, 120, 90, 85, 350],
            backgroundColor: '#ddc370',
            borderColor: '#f3bb45',
            fill: true,
            tension: 0.4,
            stack: 'stack1'
          },
          {
            label: 'Open',
            data: [100, 140, 115, 250, 95, 70, 110, 170],
            backgroundColor: '#97cad9',
            borderColor: '#68b3c8',
            fill: true,
            tension: 0.4,
            stack: 'stack1'
          }
        ]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { stacked: true, grid: { drawBorder: false, color: '#eee' } },
          y: { stacked: true, beginAtZero: true, grid: { drawBorder: false, color: '#eee' } }
        }
      }
    });
  </script>
</body>

</html>
