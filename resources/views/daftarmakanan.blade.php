<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Daftar Makanan</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('asset\css\styles.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    .highlight-bar {
        background-color: #e5af10;
        margin: 7px 0;
        width: 152px;
        height: 3px;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }

    .menu {
        border-radius: 9px;
        background-color: #FFFFFF;
        border: 1px solid #A1A1A1;
        display: flex;
        align-items: center;
        justify-content: space-around;
        gap: 19px;
        padding: 4px 8px;
    }

    .item {
        font-family: 'Inter', sans-serif;
        color: #FFFFFF;
        padding: 6px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .food-item {
        background-color: #E5AF10;
        border-radius: 5px;
    }

    .drink-item {
        flex-grow: 0;
        color: #0d0d0d;
        background-color: transparent;
    }

    .steak-item {
        color: #0d0d0d;
        background-color: transparent
    }

    .container-makanan {
        display: flex;
        margin-top: 19px;
        justify-content: center;
        gap: 20px;
        align-items: center;
    }

    .price {
        font-family: Inter, sans-serif;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .image {
        width: 40px;
        height: 40px;
        object-fit: cover;
        object-position: center;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        border: 0;
    }

    .image-button {
        border: none;
        padding: 0;
        background: none;
        cursor: pointer;
        display: inline-block;
    }

    .menu button {
        border-width: 0px;
        /* Atur ketebalan border sesuai keinginan */
    }

    /* CSS untuk Floating Action Button (FAB) */
    .cart-fab {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
    }

    .btn-cart {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #E5AF10;
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-cart:hover {
        background-color: #E5AF10;
    }

    .fa-shopping-cart {
        font-size: 24px;
        margin-left: 1rem;
    }

    .badge {
        position: absolute;
        top: -8px;
        right: -7px;
        font-size: 12px;
        min-width: 20px;
        padding: 4px 8px;
        border-radius: 50%;
        background-color: #dc3545;
        color: #fff;
        text-align: left;
        text-decoration: none;
    }

    #total-quantity-badge {
        font-size: 12px; /* Ukuran font awal */
        text-align: left; /* Posisikan teks ke kiri */
        padding-left: 5px; /* Beri padding di sebelah kiri agar teks tidak terlalu dekat dengan tepi */
        
    }

    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        /* Pastikan header berada di atas konten lain */
    }

    .content-below-header {
        margin-top: 85px;
        /* Sesuaikan dengan tinggi header */
    }

    .my-6 {
        margin-top: 5rem !important;
        margin-bottom: 5rem !important;
    }
    </style>
</head>

<body>
    <!-- Header-->
    <header class="bg-white py-5 fixed-header">
        <div class="container px-4 px-lg-5 my-3">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder text-black">Daftar Menu</h1>
                <nav class="menu">
                    <a href="{{ route('frontend.daftarmanakan') }}"
                        class="item food-item text-decoration-none">Makanan</a>
                    <a href="{{ route('frontend.daftarsnack') }}" class="item drink-item text-decoration-none">Snack</a>
                    <a href="{{ route('frontend.daftarminuman') }}"
                        class="item drink-item text-decoration-none">Minuman</a>
                    <a href="{{ route('frontend.daftarsteak') }}" class="item steak-item text-decoration-none">Steak</a>
                </nav>

            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5 content-below-header">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @php
                $totalQuantity = 0;
                @endphp
                @foreach($foods as $food)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <!-- <img class="card-img-top"
                            src="{{ $food->gambar_product ? asset('img/' . $food->gambar_product) : asset('img/kentanggoreng.jpg') }}"
                            alt="{{ $food->gambar_product ? $food->gambar_product : 'Gambar Default' }}" /> -->
                        @if($food->gambar_product)
                        <img class="card-img-top" src="{{ asset('img/' . $food->gambar_product) }}"
                            alt="{{ $food->gambar_product }}" />
                        @else
                        <img class="card-img-top" src="{{ asset('img/esteh-manis.jpg') }}" alt="anjing gk kenek" />
                        @endif
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $food->nama_product }}</h5>
                                <!-- Product detail-->
                                <p class="text-muted">{{ $food->deskripsi }}</p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <section class="container-makanan">
                                <div class="price" style="center">Rp. {{ $food->harga_product }} </div>

                            </section>
                            <td class="cart-product-quantity" width="120px">
                                <div class="input-group quantity">
                                    <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" class="qty-input form-control" maxlength="2" max="10" value="0">
                                    <div class="input-group-append increment-btn" style="cursor: pointer">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                            </td>
                        </div>
                    </div>
                </div>
                @php
                $totalQuantity += $food->quantity;
                @endphp
                @endforeach

                {{--                     
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('asset/img/21c5ac87bcf3c2c74e8adfbcfeb6b82d.jpg')}}"
                alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">Spagheti Bolognese</h5>
                        <!-- Product detail-->
                        <p class="text-muted">Sajian pasta khas Italia dengan daging sapi cincang.</p>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <section class="container-makanan">
                        <div class="price">Rp. 10.000</div>
                        <button class="image-button">
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/6a1d1063d598f9dd6352816614a3c4a09277f0c6602c62d824cd35c0381dea57?apiKey=360a469a3140447dabe15088e7550a5c&"
                                alt="Product Image" class="image" />
                        </button>
                    </section>
                </div>
            </div>
        </div> --}}

    </section>

    <div class="cart-fab my-6">
        <a href="{{ route('frontend.daftarsteak') }}" class="btn btn-primary btn-cart">
            <i class="fa fa-shopping-cart"></i>
            <span id="total-quantity-badge" class="badge badge-pill badge-danger">{{ $totalQuantity }}</span>
        </a>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {

        function updateTotalQuantity() {
            var totalQuantity = 0;
            // Loop through each product's quantity and update total quantity
            $('.qty-input').each(function() {
                totalQuantity += parseInt($(this).val());
            });
            // Update the total quantity displayed in the badge
            $('#total-quantity-badge').text(totalQuantity);

            var numDigits = totalQuantity.toString().length;
            var fontSize = 12; // Ukuran font awal
            if (numDigits > 1) {
                fontSize -= (numDigits - 1) * 2; // Kurangi 2px untuk setiap digit tambahan
            }
            $('#total-quantity-badge').css('font-size', fontSize + 'px');
        }

        $('.increment-btn').click(function(e) {
            e.preventDefault();
            var inputField = $(this).parents('.quantity').find('.qty-input');
            var value = parseInt(inputField.val(), 10);
            if (value < 10) {
                value++;
                inputField.val(value);
                updateTotalQuantity(); // Update total quantity when increment button is clicked
            }
        });

        $('.decrement-btn').click(function(e) {
            e.preventDefault();
            var inputField = $(this).parents('.quantity').find('.qty-input');
            var value = parseInt(inputField.val(), 10);
            if (value > 0) {
                value--;
                inputField.val(value);
                updateTotalQuantity(); // Update total quantity when decrement button is clicked
            }
        });

        // Add event listener for input field change
        $('.qty-input').change(function() {
            updateTotalQuantity(); // Update total quantity when input field value changes
        });

    });
    </script>


</body>

</html>