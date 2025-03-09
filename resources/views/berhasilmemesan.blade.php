@extends('app')
@section('title', 'berhasil memesan')

@section('body')
    
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
{{-- <script>
    setTimeout(function() {
        window.location.href = "{{ route('landingpage') }}"; // Ganti 'homepage' dengan nama rute yang sesuai
        localStorage.clear(); // Menghapus semua data dari penyimpanan lokal
    }, 5000); // 5 detik (dalam milidetik)
</script> --}}

@endsection
