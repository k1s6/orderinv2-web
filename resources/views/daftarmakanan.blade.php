@extends('layouts.app')

@section('title', 'Daftar Makanan')
@section('body')

    <!-- Header-->

    @include('layouts.navbar')
    <div class="mt-5">

        @if ($bestSeller ?? false)
        <div class="text-center">
            <h3 class="fw-bolder text-black mb-3 text-uppercase">Menu best seller</>
        </div>
            <section>
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @php
                            $totalQuantity = 0;
                        @endphp
                        @foreach ($bestSeller as $food)
                            <div class="col mb-5" data-category="{{ $food->jenis_product }}" id="foodItem">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <div class="card-body p-3">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h6 class="fw-bolder">{{ $food->nama_product }}</h6>
                                            <!-- Product detail-->
                                            {{-- <p class="text-muted">{{ $food->deskripsi }}</p> --}}
                                        </div>
                                    </div>

                                    <img class="card-img px-3 pt-2 " src="asset/img/{{ $food->gambar_product }}"
                                        alt="Foto Makanan" loading="lazy" width="50px"/>
                                    <!-- Product details-->
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <section class="container-makanan">
                                            <div class="price">Rp. {{ $food->harga_product }}</div>
                                            @if ($food->stock_product == 'habis')
                                                <div class="out-of-stock text-danger bg-light p-2 rounded">Stok Habis</div>
                                            @endif
                                        </section>
                                        <td class="cart-product-quantity d-inline" width="">
                                            @if ($food->stock_product == 'tersedia')
                                                <div class="input-group align-items-center">
                                                    <button class="btn  btn-warning" type="button" id="buttonMin"
                                                        data-id="{{ $food->kode_product }}"
                                                        data-name="{{ $food->nama_product }}"
                                                        data-price="{{ $food->harga_product }}">
                                                        <i class="bi bi-dash"></i>
                                                    </button>
                                                    <input type="text" class="qty-input form-control text-center"
                                                        maxlength="2" max="10" id="qty_{{ $food->kode_product }}"
                                                        disabled>
                                                    <button class="btn btn-warning" type="button" id="buttonPlus"
                                                        data-id="{{ $food->kode_product }}"
                                                        data-name="{{ $food->nama_product }}"
                                                        data-price="{{ $food->harga_product }}">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </div>
                                </div>
                            </div>
                            @php
                                $totalQuantity += $food->quantity;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <header class="container-fluid">
            <div class="text-center text-white">
                <h3 class="fw-bolder text-black mb-3 text-uppercase" id="categoryTitle">Daftar List</h3>
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <input type="text" id="searchInput" placeholder="Cari makanan berdasarkan nama atau harga..."
                                class="form-control mt-4 px-4 py-2" style="max-width: 100%;">
                        </div>
                        <div class="col-md-4">
                            <select id="categorySelect" class="form-select mt-4 px-4 py-2" style="">
                                <option value="">Semua Kategori</option>
                                <option value="makanan">Makanan</option>
                                <option value="snack">Snack</option>
                                <option value="minuman">Minuman</option>
                                <option value="steak">Steak</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-3 px-lg-5 mt-2">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @php
                        $totalQuantity = 0;
                    @endphp
                    @foreach ($foods as $food)
                        <div class="col mb-5" data-category="{{ $food->jenis_product }}" id="foodItem">
                            <div class="card h-100">
                                <!-- Product image-->
                                <div class="card-body p-3">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h6 class="fw-bolder">{{ $food->nama_product }}</h6>
                                        <!-- Product detail-->
                                        {{-- <p class="text-muted">{{ $food->deskripsi }}</p> --}}
                                    </div>
                                </div>

                                <img class="card-img-top px-3 pt-2" src="asset/img/{{ $food->gambar_product }}"
                                    alt="Foto Makanan" loading="lazy" />
                                <!-- Product details-->
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <section class="container-makanan">
                                        <div class="price">Rp. {{ $food->harga_product }}</div>
                                        @if ($food->stock_product == 'habis')
                                            <div class="out-of-stock text-danger bg-light p-2 rounded">Stok Habis</div>
                                        @endif
                                    </section>
                                    <td class="cart-product-quantity d-inline" width="">
                                        @if ($food->stock_product == 'tersedia')
                                            <div class="input-group align-items-center">
                                                <button class="btn  btn-warning" type="button" id="buttonMin"
                                                    data-id="{{ $food->kode_product }}"
                                                    data-name="{{ $food->nama_product }}"
                                                    data-price="{{ $food->harga_product }}">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="text" class="qty-input form-control text-center"
                                                    maxlength="2" max="10" id="qty_{{ $food->kode_product }}"
                                                    disabled>
                                                <button class="btn btn-warning" type="button" id="buttonPlus"
                                                    data-id="{{ $food->kode_product }}"
                                                    data-name="{{ $food->nama_product }}"
                                                    data-price="{{ $food->harga_product }}">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </div>
                            </div>
                        </div>
                        @php
                            $totalQuantity += $food->quantity;
                        @endphp
                    @endforeach
                </div>
            </div>
        </section>

    </div>
    <!-- Footer-->
    {{-- <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer> --}}

    <script src="{{ asset('asset/js/daftarmakanan.js') }}"></script>
    <script src="{{ asset('asset/js/keranjang.js') }}"></script>
@endsection
