
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
        <style>
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
        .drink-item  {          flex-grow: 0;
            color: #0d0d0d;
            background-color: transparent;
        }
        .steak-item {
            color: #0d0d0d;
            background-color:transparent
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

        </style>
    </head>
    <body>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder text-black">Daftar Menu</h1>
                    <nav class="menu">
                        <a href="{{ route('frontend.daftarmanakan') }}" class="item food-item text-decoration-none">Makanan</a>
                        <a href="#" class="item drink-item text-decoration-none">Snack</a>
                        <a href="{{ route('frontend.daftarminuman') }}" class="item drink-item text-decoration-none">Minuman</a>
                        <a href="#" class="item steak-item text-decoration-none">Steak</a>
                    </nav>
                    
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    @foreach($foods as $food)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('asset/img/21c5ac87bcf3c2c74e8adfbcfeb6b82d.jpg')}}" alt="..." />
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
                                    <div class="price">{{ $food->harga_product }}</div>
                                    <button class="image-button">
                                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/6a1d1063d598f9dd6352816614a3c4a09277f0c6602c62d824cd35c0381dea57?apiKey=360a469a3140447dabe15088e7550a5c&" alt="Product Image" class="image" />
                                    </button>                                
                                </section>                                   
                            </div>
                        </div>
                    </div>
                @endforeach
                
                    {{--                     
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('asset/img/21c5ac87bcf3c2c74e8adfbcfeb6b82d.jpg')}}" alt="..." />
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
                                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/6a1d1063d598f9dd6352816614a3c4a09277f0c6602c62d824cd35c0381dea57?apiKey=360a469a3140447dabe15088e7550a5c&" alt="Product Image" class="image" />
                                    </button>                                </section>                            
                            </div>
                        </div>
                    </div> --}}
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
