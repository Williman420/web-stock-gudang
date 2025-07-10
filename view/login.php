<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $q = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $r = mysqli_query($connection, $q);

  if ($r && mysqli_num_rows($r) === 1) {
    $user = mysqli_fetch_assoc($r);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-sm">
    <!-- Heading -->
    <h2 class="text-2xl font-bold text-center text-gray-900">Sign in to your account</h2>
    <p class="text-center text-sm text-gray-600 mt-1">
      Don't have an account?
      <a href="../view/signup.php" class="text-indigo-600 font-medium hover:underline">Sign up →</a>
    </p>

    <!-- Error Message -->
    <?php if (isset($error)): ?>
      <p class="text-sm text-center text-red-600 mt-4"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" class="mt-6 space-y-4">
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input
          type="text"
          id="username"
          name="username"
          placeholder="Username"
          required
          class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="••••••••"
          required
          class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        />
      </div>

      <!-- Remember Me -->
      <div class="flex items-center justify-between text-sm mt-1">
        <label class="flex items-center space-x-2">
          <input type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" />
          <span class="text-gray-700">Remember me</span>
        </label>
      </div>

      <!-- Submit Button -->
      <button
        type="submit"
        class="w-full bg-black text-white py-2 rounded-md font-semibold text-sm hover:bg-gray-900 mt-2"
      >
        Sign in
      </button>
    </form>
  </div>
</body>
</html>
