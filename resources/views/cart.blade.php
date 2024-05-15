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
    <table class="table mt-2">
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

    <textarea class="mt-2" name="test" id="notes" cols="40" rows="10" placeholder="Beri tahu detail catatan anda"></textarea>
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
    var nama = localStorage.getItem('nama');

    // Tampilkan nilai nama di elemen yang sesuai
    document.getElementById('namaDiCart').innerText = nama;

   // Function to load cart items from local storage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        const cartItems = JSON.parse(storedCart);
        const tbody = document.getElementById('cart-items');
        let totalPrice = 0;
        // Create a map to store items with their IDs as keys
        const itemMap = new Map();
        cartItems.forEach(item => {
            if (itemMap.has(item.id)) {
                // If item with same ID already exists, update quantity and price
                const existingItem = itemMap.get(item.id);
                existingItem.quantity += 1; // Increment quantity
                existingItem.price = parseInt(existingItem.price); // Convert price to integer
                totalPrice += existingItem.price; // Add price to total price
            } else {
                // If item with this ID doesn't exist, add it to the map
                itemMap.set(item.id, { ...item, quantity: 1 }); // Set quantity to 1
                totalPrice += parseInt(item.price); // Add price to total price
            }
        });
        // Iterate through the item map to create table rows
        itemMap.forEach(item => {
            const productInfo = document.createElement('tr');
            productInfo.innerHTML = `
                <td>${item.name}</td>
                <td class="nw">Rp.${item.price} x ${item.quantity}</td>
            `;
            tbody.appendChild(productInfo);
        });
        // Display total price
        document.getElementById('total-price').textContent = `Rp.${totalPrice}`;
        document.getElementById('total-price-footer').textContent = `Rp.${totalPrice}`;
    }
}

// Function to confirm order
function confirmOrder() {
            const notes = document.getElementById('notes').value;
            // Ask for confirmation
            const isConfirmed = confirm("Apakah kamu yakin untuk konfirmasi pesanan?");
            if (isConfirmed) {
                // Redirect to the success page
                window.location.href = "{{ route('frontend.berhasil') }}";
            } else {
                alert("Pesanan di batalkan.");
            }
        }// Load cart items when the page is loaded
window.addEventListener('load', loadCartFromLocalStorage);

</script>
</body>
</html>


