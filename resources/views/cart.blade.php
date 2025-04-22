@extends('layouts.app')

@section('title','keranjang')
@section('body')

@include('layouts.navbar')

<style>
    .table-list {
        border-collapse: collapse; /* Ensure no spacing between table cells */
    }
    .table-list td, table th, table tbody {
        border: none !important; /* Remove all borders */
    }
</style>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-list">
            <!-- Removed thead -->
            <tbody id="cart-items">
                <!-- Product items will be inserted here dynamically -->
            </tbody>
        </table>
    </div>

    <div class="border-top border-2 border-dark my-3"></div>

    <h5 class="fw-bold">Detail Pesanan</h5>

    <div class="table-responsive">
        <table class="table table-bordered rounded-3 table-list">
            <tbody>
                <tr>
                    <td class="fw-normal">Nama</td>
                    <td class="text-end" id="namaDiCart"></td>
                </tr>
                <tr>
                    <td class="fw-bold">Total Item</td>
                    <td class="text-end fw-bold" id="total-items">0</td>
                </tr>
                <tr>
                    <td class="fw-bold">Total Harga</td>
                    <td class="text-end fw-bold" id="total-price">Rp.0</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-5 pb-3">
        <label for="notes" class="form-label fw-bold">Catatan (opsional)</label>
        <textarea class="form-control" id="notes" rows="4" placeholder="Beri tahu detail catatan anda"></textarea>
    </div>
</div>

<nav class="navbar fixed-bottom ">
    <div class="container-fluid ">
        {{-- <span class="navbar-text text-light" id="total-price-footer">Rp.0</span> --}}
        <button class="btn btn-lg btn-warning w-100" onclick="confirmOrder()">Konfirmasi</button>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>

    // Ambil nilai nama dari local storage
    var nama = localStorage.getItem('customerName');

    // Tampilkan nilai nama di elemen yang sesuai
    document.getElementById('namaDiCart').innerText = nama;

// Declare itemMap globally
let itemMap = new Map();

   // Function to load cart items from local storage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
if (storedCart) {
    const cartItems = JSON.parse(storedCart);
    const tbody = document.getElementById('cart-items');
    let totalPrice = 0;

    // Clear and populate itemMap
    itemMap.clear();
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
        totalItems = 0;

        itemMap.forEach(item => {
            const productInfo = document.createElement('tr');
            productInfo.innerHTML = `
            <td><img src="${item.image}" alt="${item.name}" class="img-fluid" style="max-width: 50px;"></td>
                    <td>
                        ${item.name}<br>
                        <button class="btn btn-sm btn-danger mt-1 delete-item" data-id="${item.id}">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </td>
                    <td style="width:15%;"> <!-- Set fixed width for the third column -->
                        <div class="input-group align-items-center">
                            <input type="text" class="qty-input form-control text-center" maxlength="2" max="10" id="qty_${item.id}" value="${item.quantity}" disabled>
                            <button class="btn btn-warning edit-pencil" type="button" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                        </td>
                    <td class="text-end">Rp.${item.price * item.quantity}</td>
                    `;
            tbody.appendChild(productInfo);

            // Add a row for the note input
            const noteRow = document.createElement('tr');
            noteRow.innerHTML = `
                <td colspan="4">
                    <textarea class="form-control item-note" data-id="${item.id}" placeholder="Catatan untuk item ini">${item.note || ''}</textarea>
                    <hr class="mt-2 mb-2 border-dark"> <!-- Separator -->
                </td>
            `;
            tbody.appendChild(noteRow);

            totalPrice += item.price * item.quantity; // Update total price
            totalItems += item.quantity; // Update total items
        });

        document.getElementById('total-price').textContent = `Rp.${totalPrice}`;
        document.getElementById('total-items').textContent = `${totalItems}`;
    };

    const updateLocalStorage = () => {
        const updatedCartItems = [];
        itemMap.forEach((item, id) => {
            const noteElement = document.querySelector(`.item-note[data-id="${id}"]`);
            const note = noteElement ? noteElement.value : '';
            for (let i = 0; i < item.quantity; i++) {
                updatedCartItems.push({ id: item.id, name: item.name, price: item.price, note });
            }
        });
        localStorage.setItem('cart', JSON.stringify(updatedCartItems));
    };

    renderTable(); // Initial render

    tbody.addEventListener('click', function(event) {
        if (event.target.closest('.edit-pencil')) {
            const button = event.target.closest('.edit-pencil');
            const itemId = button.getAttribute('data-id');
            const item = itemMap.get(itemId);

            Swal.fire({
                title: `Edit Jumlah untuk ${item.name}`,
                input: 'number',
                inputLabel: 'Masukkan jumlah baru:',
                inputValue: item.quantity,
                inputAttributes: {
                    min: 1,
                    max: 10,
                    step: 1
                },
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const newQuantity = parseInt(result.value, 10);
                    if (!isNaN(newQuantity) && newQuantity > 0) {
                        item.quantity = newQuantity; // Update item quantity
                        updateLocalStorage(); // Update localStorage
                        renderTable(); // Re-render table with updated quantity
                        // Swal.fire('Berhasil!', 'Jumlah item berhasil diperbarui.', 'success');
                    } else {
                        Swal.fire('Error!', 'Jumlah tidak valid.', 'error');
                    }
                }
            });
        }

        if (event.target.closest('.delete-item')) {
            const button = event.target.closest('.delete-item');
            const itemId = button.getAttribute('data-id');

            Swal.fire({
                title: 'Hapus Item',
                text: 'Apakah kamu yakin ingin menghapus item ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    itemMap.delete(itemId); // Remove the item from the map
                    updateLocalStorage(); // Update localStorage
                    renderTable(); // Re-render the table
                    Swal.fire('Berhasil!', 'Item berhasil dihapus.', 'success');
                }
            });
        }
    });

    // Update notes in localStorage when they are modified
    tbody.addEventListener('input', function(event) {
        if (event.target.classList.contains('item-note')) {
            const itemId = event.target.getAttribute('data-id');
            const item = itemMap.get(itemId);
            if (item) {
                item.note = event.target.value; // Update the note for the item
                updateLocalStorage(); // Save the updated note to localStorage
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
                        kode_product: item.id,
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
                detail_transaksi: detailTransaksi.map(item => ({
                    ...item,
                    catatan: itemMap.get(item.kode_product)?.note || '' // Include item-specific notes
                }))
            };
            // Send POST request
            $.ajax({
                url: '{{ url('api/cart/post')}}',
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
                        text: 'Pesanan berhasil di proses silahkan bayar dikasir', // Display API response message
                        confirmButtonText: 'OK'
                    }).then(() => {
                        localStorage.removeItem('cart'); // Clear cart data from localStorage
                        localStorage.removeItem('customerName'); // Clear customerName from localStorage
                        window.location.href = "{{ route('frontend.berhasil') }}";
                    });
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Transaction creation failed.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage += `\nDetail: ${xhr.responseJSON.message}`;
                    }
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        const errors = Object.values(xhr.responseJSON.errors).flat().join('\n');
                        errorMessage += `\nErrors:\n${errors}`;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: errorMessage,
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