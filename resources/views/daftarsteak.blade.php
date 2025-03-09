@extends('app')

@section('title', 'Daftar Makanan')
@section('body')

<!-- Header-->
<header class="bg-dark bg-opacity-25 py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder text-black mb-3">Daftar Makanan</h1>
            <div class="card d-inline-block w-100 rounded-4">
                <div class="card-body d-flex justify-content-around p-2 ">
                    <a href="#" class="item food-item text-decoration-none" data-category="makanan">Makanan</a>
                    <a href="#" class="item drink-item text-decoration-none" data-category="snack">Snack</a>
                    <a href="#" class="item drink-item text-decoration-none" data-category="minuman">Minuman</a>
                    <a href="#" class="item steak-item text-decoration-none" data-category="steak">Steak</a>
                </div>
            </div>
            <input type="text" id="searchInput" placeholder="Cari makanan berdasarkan nama atau harga..." class="form-control mt-4">
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-5" id="foodSection">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="foodList">
            <!-- Data makanan akan dimuat di sini -->
            @foreach($foods as $food)
                <div class="col mb-5 food-item" data-category="{{ $food->jenis_product }}">
                    <div class="card h-100">
                        <img class="card-img-top" src="asset/img/{{ $food->gambar_product }}" alt="Foto Makanan" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $food->nama_product }}</h5>
                                <p class="text-muted">{{ $food->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <section class="container-makanan">
                                <div class="price">Rp. {{ $food->harga_product }}</div>
                                @if($food->stock_product === 'habis')
                                    <div class="out-of-stock text-danger bg-light p-2 rounded">Stok Habis</div>
                                @endif
                            </section>
                            <td class="cart-product-quantity d-inline" width="">
                                @if($food->stock_product === 'tersedia')
                                    <div class="input-group align-items-center">
                                        <button class="btn btn-warning" type="button" id="buttonMin" data-id="{{ $food->kode_product }}" data-name="{{ $food->nama_product }}" data-price="{{ $food->harga_product }}">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="text" class="qty-input form-control text-center" maxlength="2" max="10" id="qty_{{ $food->kode_product }}" disabled>
                                        <button class="btn btn-warning" type="button" id="buttonPlus" data-id="{{ $food->kode_product }}" data-name="{{ $food->nama_product }}" data-price="{{ $food->harga_product }}">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                @endif
                            </td>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m -0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>

<!-- Shopping Cart Button -->
<button class="shopping-cart-btn" id="redirectButton" data-url="{{ route('cart.index', ['id' => 1]) }}">
    <i class="bi bi-cart-fill"></i>
    <span class="cart-count visually-hidden">0</span>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener untuk tab
        document.querySelectorAll('.item').forEach(item => {
            item.addEventListener('click', function(event) {
                event.preventDefault();
                const category = this.getAttribute('data-category');
                filterFoods(category);
            });
        });

        // Fungsi untuk memfilter makanan berdasarkan kategori
        function filterFoods(category) {
            const foodItems = document.querySelectorAll('.food-item');
            foodItems.forEach(food => {
                if (food.getAttribute('data-category') === category || category === 'semua') {
                    food.style.display = 'block'; // Tampilkan item
                } else {
                    food.style.display = 'none'; // Sembunyikan item
                }
            });
        }
    });
</script>

<script src="{{ asset('asset/js/keranjang.js') }}"></script>
@endsection