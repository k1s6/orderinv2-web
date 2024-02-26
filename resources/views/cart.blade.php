<!doctype html>
<html lang="en">
  <head>
    <title>Keranjang Kuning</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <style>
        .product-info {
            display: flex;
            align-items: center;
        }
    </style>
</head>
  <body>
    
    <div class="container-fluid">
    
    <h1>Informasi Keranjang</h1>
    
        
        @foreach ($cartItems as $item)
        
            @if(isset($item['products']) && $item['id'] == $idChart)
                @foreach ($item['products'] as $product)
                    <!-- Access the title of the product -->
                    <div class="row col-md-12">

                        <div class="product-info">
                            <div class="mr-3">
                                <p>{{ $product['title'] }}</p>
                            </div>
                            <div class="mr-3 ml-4">
                                <p>{{ $product['price'] }}</p>
                            </div>
                            <div class="mr-4">
                                <p> x {{ $product['quantity'] }}</p>
                            </div>
                            <div class="ml-4">
                                <p> = {{ $product['total'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        @endforeach

        <h1>Total Harga</h1>

        @foreach ($cartItems as $item)
        
            @if($item['id'] == $idChart)
                    <h2>${{ $item['total'] }}</h2>
            @endif
            
        @endforeach

    </div>
    

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>