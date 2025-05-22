<div style="padding: 20px;">
    <h1 style="font-size: 1.8rem; font-weight: bold; color: #003366;">📦 Inventory Overview</h1>
    <p style="color: #555;">Manage your inventory categories, items, and variants.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-top: 20px;">
        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Categories</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #007BFF;">{{ $categoryCount }}</p>
            <a href="{{ route('categories.index') }}"
               hx-get="{{ route('categories.index') }}"
               hx-target="main"
               hx-push-url="true"
               class="btn"
               style="margin-top: 10px; display: inline-block;">Manage</a>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Items</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #28a745;">{{ $itemCount }}</p>
            <a href="{{ route('items.index') }}"
               hx-get="{{ route('items.index') }}"
               hx-target="main"
               hx-push-url="true"
               class="btn"
               style="margin-top: 10px; display: inline-block;">Manage</a>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Variants</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #6f42c1;">{{ $variantCount }}</p>
            <a href="{{ route('variants.index') }}"
               hx-get="{{ route('variants.index') }}"
               hx-target="main"
               hx-push-url="true"
               class="btn"
               style="margin-top: 10px; display: inline-block;">Manage</a>
        </div>

        <div style="background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <h2 style="font-size: 0.9rem; color: #666;">Total Stock</h2>
            <p style="font-size: 2rem; font-weight: bold; color: #6610f2;">{{ $totalStock }}</p>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <h2 style="font-size: 1.2rem; font-weight: bold; color: #003366;">➕ Quick Actions</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
            <a href="{{ route('categories.create') }}"
               hx-get="{{ route('categories.create') }}"
               hx-target="main"
               hx-push-url="true"
               class="btn">➕ Add Category</a>

            <a href="{{ route('items.create') }}"
               hx-get="{{ route('items.create') }}"
               hx-target="main"
               hx-push-url="true"
               class="btn">➕ Add Item</a>

            <a href="{{ route('variants.create') }}"
               hx-get="{{ route('variants.create') }}"
               hx-target="main"
               hx-push-url="true"
               class="btn">➕ Add Variant</a>
        </div>
    </div>
</div>
