<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-sm">
      
      <!-- Heading -->
      <h2 class="text-2xl font-bold text-center text-gray-900">Create an account</h2>
      <p class="text-center text-sm text-gray-600 mt-1 mb-6">
        Already have an account?
        <a href="../view/login.php" class="text-indigo-600 font-medium hover:underline">Sign in →</a>
      </p>

      <!-- Sign In Form -->
      <form action="login.php" method="POST" class="space-y-4">
        <!-- Username -->
        <div>
          <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Username"
            required
            class="mt-1 block w-full rounded-md border border-gray-300 bg-blue-50 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          />
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Email"
            required
            class="mt-1 block w-full rounded-md border border-gray-300 bg-blue-50 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
            class="mt-1 block w-full rounded-md border border-gray-300 bg-blue-50 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          />
        </div>

        <!-- Confirm password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Confirm password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            required
            class="mt-1 block w-full rounded-md border border-gray-300 bg-blue-50 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          />
        </div>

        <!-- Terms and Condition -->
        <div class="flex items-center justify-between text-sm mt-1">
          <label class="flex items-center space-x-2">
            <input type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" />
            <span class="text-gray-700">I accept the <span class="text-indigo-600 font-medium">Terms and Conditions</span></span>
          </label>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="w-full bg-black text-white py-2 rounded-md font-medium text-sm hover:bg-gray-900 mt-2"
        >
          Sign up
        </button>
      </form>
    </div>
  </body>
</html>
