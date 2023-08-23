<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Mexico | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #141E46">
        <div class="container">
            <!-- Company Logo -->
            <a class="navbar-brand" href=""><img src="{{ asset('storage/Assets/logo.png') }}" alt="Company Logo" width="70px"></a>
    
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
                <a href="#" class="btn btn-primary mx-2">Transaction Page</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @elseif(Auth::user()->role == 'admin')
                <a href="{{ route('dashboard')  }}" class="btn btn-primary mx-2">Product Catalogue</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
            @endif
        </div>
    </nav>

    <br>
      
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Admin Dashboard</h2>
            <a href="{{ route('addProduct') }}" class="btn btn-success">Add New Product</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <th scope="row">{{$index + 1}}</th>
                    <td><img src="{{asset('storage/ProductIMG/'. $product['product_IMG'])}}" alt="Product Image" class="img-fluid" width="100"></td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->category}}</td>
                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{$product->qtc}}</td>
                    <td>
                        <a href="{{ route('editProduct', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('deleteProduct', ['id' => $product->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
