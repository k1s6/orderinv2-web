<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="theme-color" content="#000000" />
    <title>
        @yield('title')
    </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('asset/css/styles2.css') }}" rel="stylesheet" />
    <!-- Font inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
    {{-- awesome font --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        @media (max-width: 767.98px) {

            .footer .container .row .col-lg-6.h-100.text-center.text-lg-start.my-auto,
            .footer .container .row .col-lg-6.h-100.text-center.text-lg-end.my-auto {
                text-align: center;
                margin-top: 20px;
            }
        }

        .text-center.text-white {
            font-family: 'Inter', sans-serif;
        }

        /* Custom CSS */
        highlight-bar {
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
            font-size: 20px;
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

        .image-button,
        .image-button-minus {
            border: none;
            padding: 0;
            background: none;
            cursor: pointer;
            display: inline-block;
        }

        .menu button {
            border-width: 0px;
        }

        /* Shopping Cart Button CSS */
        .shopping-cart-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #000000;
            /* Ubah warna latar belakang menjadi hitam */
            color: white;
            border: none;
            border-radius: 80%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            cursor: pointer;
            z-index: 999;
            /* Pastikan tombol shopping cart muncul di atas konten lain */
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

        .fade-in {
            transition: 100ms ease-in;
        }
    </style>
</head>

<body>
    @yield('body')

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font awesome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Font inter -->
    <script src="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"></script>
    <!-- Custom JS -->
    {{-- <script src="{{ asset('asset/js/script.js') }}"></script> --}}
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
