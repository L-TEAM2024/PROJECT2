<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

        <form method="POST" action="/login">
            <!-- Add CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="email" value="" required autocomplete="email" autofocus>
                <!-- Error message for email -->
                <p class="mt-2 text-sm text-red-600"></p>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="password" required autocomplete="current-password">
                <!-- Error message for password -->
                <p class="mt-2 text-sm text-red-600"></p>
            </div>

            <div class="flex items-center mb-4">
                <input class="mr-2 h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" type="checkbox" name="remember" id="remember">
                <label class="block text-sm font-medium text-gray-700" for="remember">Remember Me</label>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Login
                </button>
                <a class="text-indigo-600 hover:text-indigo-700 text-sm" href="/password/request">Forgot Your Password?</a>
            </div>
        </form>
    </div>
</body>
</html>
