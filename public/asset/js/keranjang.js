// Deklarasi variabel untuk menyimpan data keranjang
let cart = [];

// Fungsi untuk menyimpan isi keranjang dalam local storage
function saveCartToLocalStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Fungsi untuk memuat isi keranjang dari local storage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        cart = JSON.parse(storedCart); // Mengubah string JSON menjadi objek JavaScript
        updateCartCount(cart.length); // Memperbarui tampilan jumlah produk dalam keranjang
    }
}

// Fungsi untuk memuat data keranjang dari local storage saat halaman dimuat
function initializeCart() {
    loadCartFromLocalStorage(); // Memuat isi keranjang dari local storage
}

// Fungsi untuk memperbarui tampilan jumlah produk dalam keranjang
function updateCartCount(count) {
    const cartCountElement = document.querySelector('.cart-count');
    if (!cartCountElement) {
        console.warn("Element with class 'cart-count' not found in the DOM.");
        return; // Exit the function if the element is not found
    }
    cartCountElement.textContent = count;
    if (count > 0) {
        cartCountElement.classList.remove('visually-hidden');
    } else {
        cartCountElement.classList.add('visually-hidden');
    }
}

// Fungsi untuk menambahkan produk ke keranjang
function addProductToCart(id, name, price) {
    const product = { id, name, price }; // Membuat objek produk
    cart.push(product); // Menambahkan produk ke dalam keranjang
    updateCartCount(cart.length); // Memperbarui tampilan jumlah produk dalam keranjang
    saveCartToLocalStorage(); // Menyimpan keranjang dalam local storage
}

// Fungsi untuk menghapus produk dari keranjang
function popProductFromCart(id) {
    const index = cart.findIndex(item => item.id === id);
    if (index !== -1) {
        cart.splice(index, 1);
        updateCartCount(cart.length);
        saveCartToLocalStorage();
    } else {
        console.log("Product not found in the cart");
    }
}

// Event listener for redirectButton
const redirectButton = document.getElementById('redirectButton');
if (redirectButton) {
    redirectButton.addEventListener('click', function() {
        const url = this.getAttribute('data-url');
        window.location.href = url;
    });
} else {
    console.warn("Element with ID 'redirectButton' not found in the DOM.");
}

// Event listener untuk memanggil fungsi initializeCart saat halaman dimuat
window.addEventListener('load', function() {
    initializeCart();

    // Fungsi untuk memperbarui semua elemen input dengan ID yang sama
    function updateAllQtyInputs(productId, newValue) {
        const qtyInputs = document.querySelectorAll(`.qty-input[id="qty_${productId}"]`);
        qtyInputs.forEach(input => {
            input.value = newValue;
        });
    }

    // Event listener untuk menambahkan produk ke keranjang
    document.querySelectorAll('.btn-warning[id^="buttonPlus"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tombol (jika ada)
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            const qtyInput = document.querySelector(`#qty_${productId}`);

            if (qtyInput) {
                // Increment the value of the quantity input field
                let currentValue = parseInt(qtyInput.value) || 0; // Get the current value or default to 0 if NaN
                let incrementedValue = currentValue + 1; // Increment the value
                updateAllQtyInputs(productId, incrementedValue); // Update all inputs with the same ID
            }
            addProductToCart(productId, productName, productPrice); // Memanggil fungsi addProductToCart
        });
    });

    // Event listener untuk mengurangi produk dari keranjang
    document.querySelectorAll('.btn-warning[id^="buttonMin"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const productId = this.getAttribute('data-id');
            popProductFromCart(productId);
            const qtyInput = document.querySelector(`#qty_${productId}`);

            if (qtyInput) {
                // Decrement the value of the quantity input field only if it's greater than 0
                let currentValue = parseInt(qtyInput.value) || 0; // Get the current value or default to 0 if NaN
                if (currentValue > 0) { // Check if the current value is greater than 0
                    let decrementedValue = currentValue - 1; // Decrement the value
                    updateAllQtyInputs(productId, decrementedValue); // Update all inputs with the same ID
                }
            }
        });
    });

    // Load cart data from local storage
    const cart2 = JSON.parse(localStorage.getItem('cart')) || [];

    // Count occurrences of each product code in the cart
    const productCounts = {};
    cart2.forEach(item => {
        productCounts[item.id] = (productCounts[item.id] || 0) + 1;
    });

    // Set initial quantity values for each product
    const qtyInputs = document.querySelectorAll('.qty-input');
    qtyInputs.forEach(input => {
        const productId = input.id.split('_')[1];
        input.value = productCounts[productId] || 0;
    });

    // Fungsi untuk memfilter produk berdasarkan input pencarian
    function filterProducts() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const productCards = document.querySelectorAll('.col.mb-5');

        productCards.forEach(card => {
            const productName = card.querySelector('.fw-bolder').textContent.toLowerCase();
            const productPrice = card.querySelector('.price').textContent.toLowerCase();

            if (productName.includes(searchInput) || productPrice.includes(searchInput)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Event listener untuk input pencarian
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', filterProducts);
});

// Attach functions to the global window object to ensure accessibility
window.loadCartFromLocalStorage = loadCartFromLocalStorage;
window.setupQuantityControls = setupQuantityControls;
