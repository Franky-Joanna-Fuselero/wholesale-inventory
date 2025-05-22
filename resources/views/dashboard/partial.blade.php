<div style="padding: 20px;">
    <h1 style="font-size: 1.8rem; font-weight: bold; color: #003366;">📊 Welcome to the Dashboard</h1>
    <p style="color: #555;">Here is your quick overview of current business activity.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-top: 20px;">
        
        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Categories</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #007BFF;">{{ $totalCategories }}</p>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Items</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #28a745;">{{ $totalItems }}</p>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Item Variants</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #6f42c1;">{{ $totalVariants }}</p>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Estimated Inventory Quantity</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #6610f2;">{{ $totalInventoryQuantity }}</p>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Registered Customers</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #fd7e14;">{{ $totalCustomers }}</p>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Orders</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #dc3545;">{{ $totalOrders }}</p>
        </div>
    </div>
</div>
