<section class="pos-container">
    <!-- LEFT PANE -->
    <section class="left-pane">
        <div class="form-grid">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first_name" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last_name" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group full-width">
            <label for="address">Delivery Address</label>
            <input type="text" id="address" name="address" placeholder="Complete Address">
        </div>

        <div class="form-grid">
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" placeholder="e.g., 0917xxxxxxx">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="customer@email.com">
            </div>
        </div>

        <!-- HTMX Auto-Fill Target -->
        <div id="customer-info" class="form-section">
            @include('pos.partials.customer-info')
        </div>

        <div class="item-list">
            <h3>Available Items</h3>
            @include('pos.partials.item-list', ['items' => $items])
        </div>
    </section>

    <!-- RIGHT PANE -->
    <section class="right-pane">
        <div class="receipt">
            <h2>Receipt</h2>
            <div id="receipt">
                <!-- HTMX will render receipt rows here -->
            </div>
        </div>

        <div class="quantity-calculator">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1">
        </div>

        <div class="action-buttons">
            <button onclick="addItem()">Add Item</button>
            <button onclick="pay()">Pay</button>
            <button onclick="voidItem()">Void Item</button>
            <button onclick="updateItem()">Update</button>
        </div>
    </section>
</section>
