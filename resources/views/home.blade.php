@extends('frontend/layouts.template')

@section('content')
    
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Halaman Home</h1>
                <p class="lead">Halaman ini merupakan halaman Home</p>
                <p>Nama : {{ $nama }}</p>
                <p>Mata Pelajaran</p>
                <ul>
                    @foreach ($pelajaran as $p)
                    <li>{{ $p }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

@endsection