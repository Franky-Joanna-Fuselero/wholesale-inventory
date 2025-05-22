<aside class="w-64 bg-blue-900 text-yellow-400 p-4 space-y-6">
    <h2 class="text-white text-xl font-bold">Inventory System</h2>
    <nav class="space-y-2">
        <a href="/dashboard" class="block py-2 px-4 rounded hover:bg-yellow-300 {{ request()->is('dashboard') ? 'bg-yellow-400 text-black font-bold' : '' }}">
            Dashboard
        </a>
        <a href="/customers" class="block py-2 px-4 rounded hover:bg-yellow-300 {{ request()->is('customers*') ? 'bg-yellow-400 text-black font-bold' : '' }}">
            Customers
        </a>
        <a href="/inventory" class="block py-2 px-4 rounded hover:bg-yellow-300 {{ request()->is('inventory*') ? 'bg-yellow-400 text-black font-bold' : '' }}">
            Inventory
        </a>
        <a href="/pos" class="block py-2 px-4 rounded hover:bg-yellow-300 {{ request()->is('pos*') ? 'bg-yellow-400 text-black font-bold' : '' }}">
            POS
        </a>
    </nav>

    <form action="/logout" method="POST">
        @csrf
        <button class="mt-8 bg-yellow-400 text-black px-4 py-2 rounded">Logout</button>
    </form>
</aside>
