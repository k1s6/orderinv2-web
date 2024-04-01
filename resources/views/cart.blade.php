<!doctype html>
<html lang="en">
  <head>
    <title>Keranjang Kuning</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <style>
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
        /* hr {
            border: none;
            background-color: red;
        } */
    </style>
</head>
  <body>

    <nav class="navbar navbar-dark bg-black">
        <div class="container-fluid d-flex-sm justify-content-start">
            <h5 style="color: aliceblue">
                <span style="font-size: 24px;">&larr;</span> <!-- Unicode untuk panah ke belakang -->
            </h5>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('asset/icon/icon-cart.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Pesanan Anda
            </a>
        </div>
    </nav>
    
        
    <section class="content-section">

    
    <table class="table mt-2">
        <tbody>
            @foreach ($cartItems as $item)
                @if(isset($item['products']) && $item['id'] == $idChart)
                    @foreach ($item['products'] as $product)
                        <tr>
                            <td>{{ $product['title'] }}</td>
                            <td class="nw">${{ $product['price'] }} x {{ $product['quantity'] }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
    
    
    
    <hr class="border border-2 border-dark">
    @foreach ($cartItems as $item)
    @if($item['id'] == $idChart)
    <div class="d-flex justify-content-between">
        <p>Total</p>
        ${{ $item['total'] }}
    </div>
    @endif
    @endforeach
    
    <div class="d-flex justify-content-between">
        <p>Nama</p>
        <p>Pramudya</p>
    </div>

        <h5>Catatan (opsional)</h5>
    
        <textarea class="mt-2" name="test" id="" cols="40" rows="10" placeholder="Beri tahu detail catatan anda"></textarea>


    </section>

    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-between">
          <a class="navbar-brand" href="#">$10.000</a>
          <div class="btn btn-warning">Konfirmasi</div>
        </div>
      </nav>

    {{-- </div> --}}
    

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>