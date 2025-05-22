document.addEventListener('DOMContentLoaded', function () {
    const itemSelect = document.getElementById('item-select');
    const itemInput = document.getElementById('selected-item');
    const priceInput = document.getElementById('selected-price');

    function updateFields() {
        const selected = itemSelect.options[itemSelect.selectedIndex];
        itemInput.value = selected.value;
        priceInput.value = selected.dataset.price;
    }

    itemSelect.addEventListener('change', updateFields);
    updateFields(); // init on load
});

function voidItem() {
    document.getElementById('receipt').innerHTML = '<p>Receipt cleared.</p>';
}

function pay() {
    alert("Payment Successful!");
    voidItem();
}
