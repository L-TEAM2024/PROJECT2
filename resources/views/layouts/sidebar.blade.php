<!-- Sidebar -->
<div id="sidebar" class="lg:w-64 w-full bg-gray-800 text-white h-full fixed lg:static flex flex-col justify-between shadow-lg transform transition-transform duration-300 -translate-x-full lg:translate-x-0">
    <!-- Sidebar Content -->
    <div class="p-4 flex-grow">
        <h4 class="text-2xl font-bold mb-6">{{ __('Dashboard') }}</h4>
        <ul class="space-y-3">
            <li>
                <a class="block py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors duration-300" href="{{ route('users.index') }}">
                    Users
                </a>
            </li>
            <li>
                <a class="block py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors duration-300" href="{{ route('products.index') }}">
                    Products
                </a>
            </li>
            <li>
                <a class="block py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors duration-300" href="{{ route('categories.index') }}">
                    Categories
                </a>
            </li>
            <li>
                <a class="block py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors duration-300" href="{{ route('products.selling') }}">
                    Selling
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout Button -->
    <div class="p-4">
        <a class="block py-3 px-4 text-red-500 font-semibold rounded-lg bg-gray-800 hover:bg-red-600 hover:text-white transition-colors duration-300" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</div>

<!-- Mobile Toggle Button -->
<div class="lg:hidden fixed top-15 left-2 p-2">
    <button id="sidebar-toggle" class="text-white bg-gray-800 p-2 rounded-lg focus:outline-none hover:bg-gray-700 transition-colors duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>
</div>
