<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Mexico | Catalogue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #141E46">
        <div class="container">
            <!-- Company Logo -->
            <a class="navbar-brand" href=""><img src="{{ asset('Assets/logo.png') }}" alt="Company Logo" width="70px"></a>
    
            <!-- Search Bar and Button -->
            <form class="d-flex mx-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
    
           {{-- if not register --}}
           @if (Auth::guest())
            <!-- Login & Register Buttons -->
            <div class="ml-auto">
                <a href="{{ route('login')  }}" class="btn btn-primary mx-2">Login</a>
                <a href="{{ route('register')  }}" class="btn btn-secondary">Register</a>
            </div>
            @elseif (Auth::user()->role == 'user')
                <a href="{{route('cart.show')}}" class="btn btn-primary mx-2">Cart</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @elseif(Auth::user()->role == 'admin')
                <a href="{{ route('adminDashboard')  }}" class="btn btn-primary mx-2">Admin Panel</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
            @endif
        </div>
    </nav>

    {{-- display success message from controller and give x button --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>
      <div class="row mx-3 justify-content-center">
          @foreach($products as $product)
          <div class="col-sm-5">
            <div class="card m-4">
                <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="{{asset('storage/ProductIMG/'. $product['product_IMG'])}}" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{$product->product_name}}</h5>
                            <p class="card-text">{{$product->category}}</p>
                            <p class="card-text">Price: Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="card-text">Stock: {{$product->qtc}}</p>
                            
                            @if ((Auth::guest() ||  Auth::user()->role == 'user') && $product->qtc > 0 )
                                <form action="{{route('cart.create',[$product->id])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="qtc" min="1" max="{{ $product->qtc }}" value="1">
                                        <button class="btn btn-primary" type="submit">Add to Cart</button>
                                    </div>
                                </form>
                            @else
                                <button class="btn btn-danger" disabled>Sold Out</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>            
          </div>
          @endforeach
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
