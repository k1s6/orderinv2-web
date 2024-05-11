<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Steak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('asset/css/styles.css')}}" rel="stylesheet">
    <!-- Jika path ke gambar tidak benar, ganti sesuai dengan struktur folder proyekmu -->
    <style>
        /* Tambahan CSS untuk highlight-bar */
        highlight-bar {
            background-color: #e5af10;
            margin: 7px 0;
            width: 152px;
            height: 3px;
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
            background-color: transparent;
            border-radius: 5px;
            color: #0d0d0d;
        }

        .drink-item  {
            flex-grow: 0;
            color: #0d0d0d;
            background-color: transparent;
        }

        .steak-item {
            color: #0d0d0d;
            background-color: #E5AF10;
            border-radius: 5px;
        }

        .snack-item  {
            flex-grow: 0;
            color: #0d0d0d;
            border-radius: 5px;
            background-color: transparent;
        }

        .container-makanan {
            display: flex;
            margin-top: 19px;
            justify-content: space-between;
            gap: 20px;
        }

        .price {
            font-family: Inter, sans-serif;
            font-size: 20px; /* Ubah ukuran font sesuai kebutuhan */
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
            border-width: 0px; /* Atur ketebalan border sesuai keinginan */
        }

        /* Shopping Cart Button CSS */
        .shopping-cart-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #000000; /* Ubah warna latar belakang menjadi hitam */
            color: #ffffff;
            border: none;
            border-radius: 80%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            cursor: pointer;
            z-index: 999; /* Pastikan tombol shopping cart muncul di atas konten lain */
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ffc107;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header class="bg-dark1 py-5" style="background-color: white;">
        <div class="container px-4 px-lg-5 my-5">
        </div>
    </header>
    <h1>
    <div class="d-flex justify-content-center">

        <img src="{{ asset('asset/img/order-delivery 1.jpg') }}" alt="Gambar">
    </div>
    <div class="d-flex justify-content-center">

        <img src="{{ asset('asset/img/Group 3.jpg') }}" alt="Gambar">
        {{-- <img src="{{ asset('asset/img/order-delivery 1.jpg') }}" alt="Gambar"> --}}
    </div>
</h1>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('landingpage') }}"; // Ganti 'homepage' dengan nama rute yang sesuai
        localStorage.clear(); // Menghapus semua data dari penyimpanan lokal
    }, 5000); // 5 detik (dalam milidetik)
</script>
    <body>
</html>
