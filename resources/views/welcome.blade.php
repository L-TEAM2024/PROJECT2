<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f4f8;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-sm bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-center mb-6">Welcome To My APP</h2>
        <div class="text-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Home</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition ml-2">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Tailwind CSS JavaScript (optional) -->
    <!-- For advanced features and interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</body>
</html>
