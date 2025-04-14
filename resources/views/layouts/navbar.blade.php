<nav class="navbar border navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('asset/img/orderin.png') }}" alt="Brand Logo" height="30">
        </a>
        <!-- Shopping Cart Button -->
        @if (!request()->routeIs('cart.index'))
        <button class="rounded-circle shopping-cart-btn" id="redirectButton"
            data-url="{{ route('cart.index', ['id' => 1]) }}">
            <i class="bi bi-cart-fill"></i>
            <span class="cart-count visually-hidden">0</span>
        </button>
        @endif
    </div>
</nav>
