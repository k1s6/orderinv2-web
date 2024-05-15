<!doctype html>
<html lang="en">
<head>
    <title>Keranjang Kuning</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <style>
        nav h5 {
            white-space: nowrap;
            margin-right: 2rem;
        }
        .content-section {
            padding-inline: 1rem;
        }
        .product-info {
            display: flex;
            align-items: center;
        }
        .bg-black {
            background-color: #2F2F2F !important;
        }
        .table .nw {
            white-space: nowrap;
            text-align: end;
        }
        .table tr:last-child td {
            border-bottom: none;
        }
        /* hr {
            border: none;
            background-color: red;
        } */
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-black">
    <div class="container-fluid d-flex-sm justify-content-start">
        <button class="btn btn-link"  style="color: aliceblue; border: none; text-decoration: none;" onclick="window.history.back()">
            <span style="font-size: 24px;">&larr;</span> <!-- Unicode untuk panah ke belakang -->
        </button>            
        <a class="navbar-brand" href="#">
            <img src="{{ asset('asset/icon/icon-cart.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Pesanan Anda
        </a>
    </div>
</nav>
     
<section class="content-section">
    @foreach($foods as $food)
    <table class="table mt-2">
        <tbody id="cart-items">
            <td class="cart-product-quantity" width="120px">
                <div class="input-group quantity">
                    <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                        <button class="image-button-minus" data-id="{{ $food->kode_product }}" data-name="{{ $food->nama_product }}" data-price="{{ $food->harga_product }}">
                            <img loading="lazy" src="https://s6.imgcdn.dev/dYq6y.png" alt="Product Image" class="image" />
                        </button>
                    </div>
                    <input type="text" class="qty-input form-control" maxlength="2" max="10" id="qty_{{ $food->kode_product }}" disabled>
                    <div class="input-group-append increment-btn" style="cursor: pointer">
                        <button class="image-button" data-id="{{ $food->kode_product }}" data-name="{{ $food->nama_product }}" data-price="{{ $food->harga_product }}">
                            <img loading="lazy" src="https://s6.imgcdn.dev/dYFU8.png" alt="Product Image" class="image" />
                        </button>
                    </div>
                </div>
            </td>
        </tbody>
        @endforeach
    </table>

    <hr class="border border-2 border-dark">

    <div class="d-flex justify-content-between">
        <p>Total</p>
        <p id="total-price">Rp.0</p>
    </div>

    <div class="d-flex justify-content-between">
        <p>Nama</p>
        <p id="namaDiCart"></p>

    </div>

    <h5>Catatan (opsional)</h5>

    <textarea class="mt-2" name="test" id="notes" cols="40" rows="10" placeholder="Beri tahu detail catatan anda"></textarea>
</section>

<nav class="navbar fixed-bottom navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="#" id="total-price-footer">Rp.0</a>
        <a class="btn btn-warning" onclick="confirmOrder()">Konfirmasi</a>
    </div>
</nav>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    // Fungsi untuk menambahkan produk ke keranjang
    function addProductToCart(id, name, price) {
        const product = { id, name, price }; // Membuat objek produk
        let cart = JSON.parse(localStorage.getItem('cart')) || []; // Mendapatkan keranjang dari local storage atau membuat keranjang baru jika belum ada
        cart.push(product); // Menambahkan produk ke dalam keranjang
        localStorage.setItem('cart', JSON.stringify(cart)); // Menyimpan keranjang dalam local storage
        loadCartFromLocalStorage(); // Memuat kembali isi keranjang
    }

    // Fungsi untuk mengurangi produk dari keranjang
    function removeProductFromCart(id) {
        let cart = JSON.parse(localStorage.getItem('cart')) || []; // Mendapatkan keranjang dari local storage atau membuat keranjang baru jika belum ada
        const index = cart.findIndex(item => item.id === id); // Temukan indeks produk dalam keranjang
        if (index !== -1) {
            cart.splice(index, 1); // Hapus produk dari keranjang
            localStorage.setItem('cart', JSON.stringify(cart)); // Menyimpan keranjang yang telah diubah dalam local storage
            loadCartFromLocalStorage(); // Memuat kembali isi keranjang
        }
    }

    // Fungsi untuk memuat isi keranjang dari local storage
    function loadCartFromLocalStorage() {
        const storedCart = localStorage.getItem('cart');
        if (storedCart) {
            const cartItems = JSON.parse(storedCart);
            const tbody = document.getElementById('cart-items');
            let totalPrice = 0;
            tbody.innerHTML = ''; // Kosongkan isi tabel sebelum memuat ulang
            cartItems.forEach(item => {
                const productInfo = document.createElement('tr');
                productInfo.innerHTML = `
                    <td>${item.name}</td>
                    <td class="nw">Rp.${item.price}</td>
                    <td>
                        <div class="input-group">
                            <button class="btn btn-outline-secondary btn-minus" type="button" data-id="${item.id}">-</button>
                            <input type="text" class="form-control quantity-input" value="1" readonly>
                            <button class="btn btn-outline-secondary btn-plus" type="button" data-id="${item.id}">+</button>
                        </div>
                    </td>
                    <td class="nw">Rp.${item.price}</td>
                    <td>
                        <button class="btn btn-danger btn-remove" data-id="${item.id}">Hapus</button>
                    </td>
                `;
                tbody.appendChild(productInfo);
                totalPrice += parseInt(item.price);
            });
            document.getElementById('total-price').textContent = `Rp.${totalPrice}`;
            document.getElementById('total-price-footer').textContent = `Rp.${totalPrice}`;
        }
    }

    // Event listener untuk tombol tambah produk
    $(document).on('click', '.btn-plus', function() {
        const productId = $(this).data('id');
        const quantityInput = $(this).siblings('.quantity-input');
        let quantity = parseInt(quantityInput.val()) + 1;
        quantityInput.val(quantity);
    });

    // Event listener untuk tombol kurangi produk
    $(document).on('click', '.btn-minus', function() {
        const quantityInput = $(this).siblings('.quantity-input');
        let quantity = parseInt(quantityInput.val());
        if (quantity > 1) {
            quantityInput.val(quantity - 1);
        }
    });

    // Event listener untuk tombol hapus produk
    $(document).on('click', '.btn-remove', function() {
        const productId = $(this).data('id');
        removeProductFromCart(productId);
    });

    // Fungsi untuk mengonfirmasi pesanan
    function confirmOrder() {
        const notes = document.getElementById('notes').value;
        const isConfirmed = confirm("Apakah kamu yakin untuk konfirmasi pesanan?");
        if (isConfirmed) {
            window.location.href = "{{ route('frontend.berhasil') }}";
        } else {
            alert("Pesanan di batalkan.");
        }
    }

    // Memuat isi keranjang dari local storage saat halaman dimuat
    $(document).ready(function() {
        loadCartFromLocalStorage();
    });
</script>

</body>
</html>
