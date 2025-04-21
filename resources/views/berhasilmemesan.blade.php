@extends('layouts.app')
@section('title', 'berhasil memesan')

@section('body')


    <body style="background-image: url('asset/img/bggambar.jpg'); background-size: cover;">

        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="card bg-white bg-opacity-75 px-5  rounded-4" style="backdrop-filter: blur(5px);">
                <div class="body-card text-center px-4  py-3 text-capitalize">
                    <img src="{{asset('asset/img/orderin.png')}}" alt="Oedrin logo" loading="lazy" width="200px" class="mb-3">
                    <br>
                    <img src="{{asset('asset/img/Checkmark.png')}}" alt="Checkmark" loading="lazy" width="100px" class="mb-3">
                    <h5>berhasil</h5>
                    <p class="mb-0">Pesanan berhasil di proses</p>
                    <p>silahkan bayar dikasir</p>
                </div>
            </div>
        </div>
    @endsection
