<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
    <link href="{{asset('asset/css/styles2.css')}}" rel="stylesheet" />
    <!-- Font inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
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
    </style>
</head>

<body>
    @yield('body')
</body>