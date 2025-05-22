<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Inventory System')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>

    <!-- Styles -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
        }

        .top-bar {
            background: #003366;
            color: white;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .layout {
            flex: 1;
            display: flex;
            overflow: hidden;
            min-height: 0; /* Fixes flex overflow issues */
        }

        aside {
            width: 250px;
            background-color: #003366;
            color: white;
            padding: 20px;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        aside.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        aside h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        aside ul {
            list-style: none;
            padding: 0;
        }

        aside ul li {
            margin: 10px 0;
        }

        aside ul li a {
            display: block;
            padding: 10px 14px;
            color: gold;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.2s ease, color 0.2s ease;
            cursor: pointer;
        }

        aside ul li a:hover,
        aside ul li a.active {
            background-color: #FFD100;
            color: #003366;
        }

        main {
            flex: 1;
            padding: 1rem 2rem;
            overflow-y: auto;
            position: relative;
        }

        .toggle-btn, .btn {
            background-color: #FFD100;
            color: #003366;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .toggle-btn:hover, .btn:hover {
            background-color: #e6bf00;
        }

        @media (max-width: 768px) {
            aside {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 10;
                box-shadow: 2px 0 6px rgba(0, 0, 0, 0.3);
            }

            .layout {
                position: relative;
            }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <button class="toggle-btn" onclick="toggleSidebar()" aria-label="Toggle sidebar">☰ Menu</button>
        <div>
            <a href="{{ url('/pos') }}" hx-get="/pos" hx-target="main" hx-push-url="true" class="btn">New Order</a>
        </div>
    </div>

    <div class="layout">
        <aside id="sidebar">
            <h2>Inventory System</h2>
            <ul>
                <li><a href="{{ url('/dashboard') }}" 
                    hx-get="/dashboard" hx-target="main" hx-push-url="true"
                    class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ url('/customers') }}" 
                    hx-get="/customers" hx-target="main" hx-push-url="true"
                    class="{{ request()->is('customers') ? 'active' : '' }}">Customers</a></li>
                <li><a href="{{ url('/inventory') }}" 
                    hx-get="/inventory" hx-target="main" hx-push-url="true"
                    class="{{ request()->is('inventory') ? 'active' : '' }}">Inventory</a></li>
                <li><a href="{{ url('/pos') }}" 
                    hx-get="/pos" hx-target="main" hx-push-url="true"
                    class="{{ request()->is('pos') ? 'active' : '' }}">POS</a></li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn" style="margin-top: 20px;">Logout</button>
            </form>
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        }
    </script>
</body>
</html>
