let cart = [];


function addToCart(id, name, price, photo) {
    //                            src = `{{ asset('storage/photos/${photo}') }}`;
    document.getElementById('cart-item-image').src = `${assetBaseUrl}/${photo}`;
    document.getElementById('cart-item-name').innerText = name;
    document.getElementById('cart-item-price').innerText = price;
    document.getElementById('cart-item-quantity').innerText = 1;
    document.getElementById('cart-item-total').innerText = `$${price}`;
    document.getElementById('addCartModal').dataset.itemId = id;
    document.getElementById('addCartModal').dataset.itemName = name;
    document.getElementById('addCartModal').dataset.itemPrice = price;
    document.getElementById('addCartModal').dataset.itemPhoto = photo;


    removeBackdrops(); // 確保沒有多餘的 backdrop 元素
    new bootstrap.Modal(document.getElementById('addCartModal')).show();
}


function increment(quantityId, priceId, totalId) {
    const quantity = document.getElementById(quantityId);
    const price = parseFloat(document.getElementById(priceId).innerText);
    let count = parseInt(quantity.innerText);
    count++;
    quantity.innerText = count;
    document.getElementById(totalId).innerText = `$${(count * price).toFixed(0)}`;
}


function decrement(quantityId, priceId, totalId) {
    const quantity = document.getElementById(quantityId);
    const price = parseFloat(document.getElementById(priceId).innerText);
    let count = parseInt(quantity.innerText);
    if (count > 1) {
        count--;
        quantity.innerText = count;
        document.getElementById(totalId).innerText = `$${(count * price).toFixed(0)}`;
    }
}


function confirmAddToCart() {
    const modal = document.getElementById("addCartModal");
    const id = modal.dataset.itemId;
    const name = modal.dataset.itemName;
    const price = parseFloat(modal.dataset.itemPrice);
    const photo = modal.dataset.itemPhoto;
    const quantity = parseInt(
        document.getElementById("cart-item-quantity").innerText
    );


    const item = {
        id,
        name,
        price,
        photo,
        quantity,
    };


    const existingItemIndex = cart.findIndex((cartItem) => cartItem.id == id);
    if (existingItemIndex >= 0) {
        cart[existingItemIndex].quantity += quantity;
    } else {
        cart.push(item);
    }


    updateCartIcon();
    saveCartToLocalStorage();
    // bootstrap.Modal.getInstance(modal).hide();
    //  new bootstrap.Modal(document.getElementById("addCartModal")).hide();
    // removeBackdrops(); // 確保隱藏後移除 backdrop
    var modalElement = document.getElementById("addCartModal");
    var modalInstance = new bootstrap.Modal(modalElement);
    modalInstance.hide();
    modalElement.classList.remove("show");
    modalElement.style.display = "none"; // 隐藏 modal
    document.body.classList.remove("modal-open"); // 移除 modal 打开时 body 上的类
    document.querySelector(".modal-backdrop").remove(); // 移除背景
}


function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}


function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCartIcon();
    }
}


// 在頁面加載時調用
document.addEventListener('DOMContentLoaded', (event) => {
    loadCartFromLocalStorage();
});


function incrementItem(index) {
    cart[index].quantity++;
    showCart();
    updateCartIcon();
    saveCartToLocalStorage();
}


function decrementItem(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity--;
        showCart();
        updateCartIcon();
        saveCartToLocalStorage();
    }
}


function removeItem(index) {
    cart.splice(index, 1);
    showCart();
    updateCartIcon();
    saveCartToLocalStorage();
}


function updateCartIcon() {
    const cartIcon = document.querySelector('.icon-shopping');
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    if (!cartIcon.querySelector('.cart-badge')) {
        const badge = document.createElement('span');
        badge.classList.add('cart-badge', 'position-absolute', 'top-0', 'start-100', 'translate-middle', 'badge', 'rounded-pill', 'bg-danger', 'cart');
        badge.innerText = totalItems;
        cartIcon.appendChild(badge);
    } else {
        cartIcon.querySelector('.cart-badge').innerText = totalItems;
    }
    saveCartToLocalStorage();
}




function showCart() {
    removeBackdrops(); // 確保沒有多餘的 backdrop 元素
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    const cartContents = document.getElementById('cart-contents');
    const cartTotal = document.getElementById('cart-total');
    cartContents.innerHTML = '';
    let total = 0;


    cart.forEach((item, index) => {
        const itemRow = document.createElement('div');
        itemRow.classList.add('d-flex', 'align-items-center', 'justify-content-center', 'mb-3');
        // // <img src="{{ asset('storage/photos/${item.photo}') }}"
        itemRow.innerHTML = `
            <div class="d-flex align-items-center">
               <img src="${assetBaseUrlShowCart}/${item.photo}" style="width: 20%;" class="mr-5">
                <div class="mr-5">
                    <div>${item.name}</div>
                    <div>$${item.price} x 
                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="decrementItem(${index})">-</button>
                        <span class="number-span fs-20">${item.quantity}</span>
                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="incrementItem(${index})">+</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-button" onclick="removeItem(${index})">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="fw-bold">$${(item.price * item.quantity).toFixed(0)}</div>
        `;
        cartContents.appendChild(itemRow);
        total += item.price * item.quantity;
    });


    cartTotal.innerText = `總計: $${total.toFixed(0)}`;
    cartModal.show();
}


function removeBackdrops() {
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
}


function closeModal() {
    var modalElement = document.getElementById("addCartModal");
    var modalInstance = new bootstrap.Modal(modalElement);
    modalInstance.hide();
    modalElement.classList.remove("show");
    modalElement.style.display = "none"; // 隐藏 modal
    document.body.classList.remove("modal-open"); // 移除 modal 打开时 body 上的类
    document.querySelector(".modal-backdrop").remove(); // 移除背景
}


function closeCartModal() {
    var modalElement = document.getElementById("cartModal");
    var modalInstance = new bootstrap.Modal(modalElement);
    modalInstance.hide();
    modalElement.classList.remove("show");
    modalElement.style.display = "none"; // 隐藏 modal
    document.body.classList.remove("modal-open"); // 移除 modal 打开时 body 上的类
    document.querySelector(".modal-backdrop").remove(); // 移除背景
}

