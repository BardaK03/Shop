<nav class="bg-gray-800 p-4 shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo și link-uri principale -->
        <div class="flex items-center space-x-6">
            <a href="{{ route('products.index') }}" class="text-white text-xl font-semibold hover:text-gray-300">Produse</a>
            <a href="{{ route('cart.index') }}" class="text-white text-xl font-semibold hover:text-gray-300">Coș</a>
            <a href="{{ route('sales.history') }}" class="text-white text-xl font-semibold hover:text-gray-300">Istoric Vânzări</a>
        </div>

        <!-- Dropdown pentru utilizatori logați sau link-uri pentru login/register -->
        <div class="flex items-center space-x-4">
            @auth
                <div class="relative">
                    <button class="text-white font-semibold hover:text-gray-300 focus:outline-none">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profilul meu</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconectare</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-white text-lg font-semibold hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="text-white text-lg font-semibold hover:text-gray-300">Register</a>
            @endauth
        </div>
    </div>
</nav>
