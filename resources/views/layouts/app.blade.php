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
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
        }

        .layout {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        aside {
            width: 250px;
            background-color: #003366;
            color: white;
            padding: 20px;
            transition: all 0.3s ease;
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
            font-weight: bold;
        }

        main {
            flex: 1;
            padding: 1rem 2rem;
            overflow-y: auto;
            position: relative;
        }

        .top-bar {
            background: #003366;
            color: white;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
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
                z-index: 10;
                height: 100%;
                left: 0;
                top: 0;
                box-shadow: 2px 0 6px rgba(0, 0, 0, 0.3);
            }
        }


      /* START OF CUSTOMER PARTIAL BLADE */

.top-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.top-left {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-shrink: 0;
}



/* Left & Right Buttons Layout */
.button-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-shrink: 0;
}

@media (min-width: 640px) {
    .button-group {
        margin-top: 0;
    }
}

/* Button Styles */
.btn-outline,
.select-outline {
    background-color: white;
    border: 1px solid #d1d5db;
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    color: #374151;
    border-radius: 6px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.2s ease;
}

.btn-outline:hover {
    background-color: #f3f4f6;
}

.btn-primary {
    background-color: #FFD100;
    
    color: #003366;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    font-weight: 600;
    border-radius: 6px;
    border: none;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.2s ease;
}

.btn-primary:hover {
    background-color: #e6bf00;
}

/* Responsive Button Wrapping Fix */
.flex-wrap.gap-2 > * {
    margin-top: 0.25rem;
}

/* Table Container Styling */
.table-container {
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
    padding: 1rem;
}

/* Table Base */
table.clean-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

/* Table Header */
.clean-table thead {
    background-color: #f9fafb;
    text-transform: uppercase;
    font-size: 0.75rem;
    font-weight: 600;
    color: #6b7280;
}

.clean-table th,
.clean-table td {
    padding: 1rem 1.5rem;
    text-align: left;
    white-space: nowrap;
}

/* Table Row Hover */
.clean-table tbody tr {
    border-top: 1px solid #e5e7eb;
    transition: background-color 0.2s;
}

.clean-table tbody tr:hover {
    background-color: #f3f4f6;
    cursor: pointer;
}

/* Status Badges */
.badge {
    padding: 0.25rem 0.5rem;
    border-radius: 0.375rem;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
    text-align: center;
}

.badge.green {
    background-color: #dcfce7;
    color: #15803d;
}

.badge.yellow {
    background-color: #fef9c3;
    color: #92400e;
}

.badge.red {
    background-color: #fee2e2;
    color: #b91c1c;
}

/* END OF CUSTOMER PARTIAL BLADE */

/* START OF CREATE */

.label-text1 {
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    display: block;
    margin-bottom: 0.25rem;
}

.input-outline1 {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    transition: border 0.2s;
}

.input-outline1:focus {
    border-color: #3b82f6;
    outline: none;
}

.form-section1 {
    background: #ffffff;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.btn-primary1 {
    padding: 0.625rem 1.25rem;
    background-color: #FFD100; /* Yellow */
    color: #1f2937; /* Dark gray text for better contrast */
    font-weight: 600;
    border-radius: 0.5rem;

    transition: background-color 0.2s, transform 0.1s;
}

.btn-primary1:hover {
    background-color: #e6bf00; /* Slightly darker on hover */
    transform: translateY(-1px);
}

.btn-secondary1 {
    padding: 0.5rem 1rem;
    background-color: #f3f4f6;
    color: #1f2937;
    border-radius: 0.5rem;
   
}

.btn-secondary1:hover {
    background-color: #e5e7eb;
}

.btn-link1 {
    font-size: 0.875rem;
    color: #6b7280;
    font-weight: 500;
    transition: color 0.2s;
    text-decoration: none;
}

.btn-link1:hover {
    color: #111827;
}

.textarea-outline1 {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    min-height: 100px;
    resize: vertical;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    transition: border 0.2s;
}

/* END OF CREATE */









    </style>
</head>
<body>
    <div class="top-bar">
        <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>
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
