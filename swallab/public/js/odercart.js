console.log('ordercart.js loaded');

document.addEventListener('DOMContentLoaded', function() {
    loadOrderCart();
});

function loadOrderCart() {
    const cartContents = document.getElementById('cart-container');
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        const cart = JSON.parse(storedCart);
        cartContents.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const itemRow = document.createElement('div');
            itemRow.classList.add('d-flex', 'align-items-center', 'justify-content-between', 'mb-3');
            // <img src="{{ asset('storage/photos/${item.photo}') }}"
            itemRow.innerHTML = `
                <div class="d-flex align-items-center">
                
                    <img src="${assetBaseUrlShowCart}/${item.photo}" style="width: 50px; height: auto;" class="me-2">
                    <div>
                        <div>${item.name}</div>
                        <div>$${item.price} x ${item.quantity}</div>
                    </div>
                </div>
                <div class="fw-bold">$${(item.price * item.quantity).toFixed(0)}</div>
            `;
            cartContents.appendChild(itemRow);
            total += item.price * item.quantity;
        });

        const totalRow = document.createElement('div');
        totalRow.classList.add('fw-bold', 'mt-3');
        totalRow.innerText = `總計: $${total.toFixed(0)}`;
        cartContents.appendChild(totalRow);
    } else {
        cartContents.innerHTML = '<p>購物車為空</p>';
    }
}
