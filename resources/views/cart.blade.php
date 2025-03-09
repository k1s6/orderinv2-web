@extends('app')

@section('title','keranjang')
@section('body')
    
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
    <table class="table mt-2 mb-0">
        <tbody id="cart-items">
            <!-- Product items will be inserted here dynamically -->
        </tbody>
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

    <textarea class="mt-2 form-control border-3" name="test" id="notes" cols="40" rows="10" placeholder="Beri tahu detail catatan anda"></textarea>
</section>

<nav class="navbar fixed-bottom navbar-dark bg-dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="#" id="total-price-footer">Rp.0</a>
        <a class="btn btn-warning" onclick="confirmOrder()">Konfirmasi</a>
    </div>
</nav>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>

    // Ambil nilai nama dari local storage
    var nama = localStorage.getItem('customerName');

    // Tampilkan nilai nama di elemen yang sesuai
    document.getElementById('namaDiCart').innerText = nama;

   // Function to load cart items from local storage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
if (storedCart) {
    const cartItems = JSON.parse(storedCart);
    const tbody = document.getElementById('cart-items');
    let totalPrice = 0;
    const itemMap = new Map();

    cartItems.forEach(item => {
        if (itemMap.has(item.id)) {
            const existingItem = itemMap.get(item.id);
            existingItem.quantity += 1;
            existingItem.price = parseInt(existingItem.price);
            totalPrice += existingItem.price;
        } else {
            itemMap.set(item.id, { ...item, quantity: 1 });
            totalPrice += parseInt(item.price);
        }
    });

    const renderTable = () => {
        tbody.innerHTML = ''; // Clear the existing table rows
        totalPrice = 0; // Reset total price

        itemMap.forEach(item => {
            const productInfo = document.createElement('tr');
            productInfo.innerHTML = `
                <td>${item.name}</td>
                <td class="nw">Rp.${item.price} x ${item.quantity} <button class="edit-pencil" data-id="${item.id}">✏️</button></td>
            `;
            tbody.appendChild(productInfo);
            totalPrice += item.price * item.quantity; // Update total price
        });

        document.getElementById('total-price').textContent = `Rp.${totalPrice}`;
        document.getElementById('total-price-footer').textContent = `Rp.${totalPrice}`;
    };

    const updateLocalStorage = () => {
        const updatedCartItems = [];
        itemMap.forEach((item, id) => {
            for (let i = 0; i < item.quantity; i++) {
                updatedCartItems.push({ id: item.id, name: item.name, price: item.price });
            }
        });
        localStorage.setItem('cart', JSON.stringify(updatedCartItems));
    };

    renderTable(); // Initial render

    tbody.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-pencil')) {
            const itemId = event.target.getAttribute('data-id');
            const item = itemMap.get(itemId);
            const newQuantity = prompt('Masukkan jumlah baru:', item.quantity);
            if (newQuantity !== null && !isNaN(newQuantity) && newQuantity > 0) {
                item.quantity = parseInt(newQuantity); // Update item quantity
                updateLocalStorage(); // Update localStorage
                renderTable(); // Re-render table with updated quantity
            }
        }
    });
}


}
// Function to confirm order
function confirmOrder() {
    // Fetch customer name and cart data from local storage
    const customerName = localStorage.getItem('customerName');
    const cart = JSON.parse(localStorage.getItem('cart'));

    if (!customerName || !cart || cart.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Customer name or cart data is missing.',
        });
        return;
    }

    // Ask for confirmation using SweetAlert2
    Swal.fire({
        title: 'Konfirmasi Pesanan',
        text: "Apakah kamu yakin untuk konfirmasi pesanan?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, konfirmasi!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Prepare transaction data
            let totalAmount = 0;
            const productMap = {};

            cart.forEach(item => {
                if (productMap[item.id]) {
                    productMap[item.id].jumlah += 1;
                    productMap[item.id].total += parseInt(item.price, 10);
                } else {
                    productMap[item.id] = {
                        nama_product: item.name,
                        jumlah: 1,
                        harga: parseInt(item.price, 10),
                        total: parseInt(item.price, 10)
                    };
                }
            });

            const detailTransaksi = Object.values(productMap);
            totalAmount = detailTransaksi.reduce((sum, item) => sum + item.total, 0);

            const transactionData = {
                nama: customerName,
                status: 'diterima',
                jumlah: detailTransaksi.length,
                total: totalAmount,
                catatan: document.getElementById('notes') ? document.getElementById('notes').value : '',
                detail_transaksi: detailTransaksi
            };

            // Send POST request
            $.ajax({
                url: 'api/cart/post',
                method: 'POST',
                data: JSON.stringify(transactionData),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Transaction successfully created.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('frontend.berhasil') }}";
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Transaction creation failed: ' + xhr.responseJSON.message,
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Pesanan dibatalkan',
                text: 'Pesanan tidak jadi dikonfirmasi.',
            });
        }
    });
}

// Load cart items when the page is loaded
window.addEventListener('load', loadCartFromLocalStorage);

</script>

@endsection