<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Mexico | Admin Dahsboard - Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #141E46">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Company Logo on the left -->
            <a class="navbar-brand" href=""><img src="{{ asset('Assets/logo.png') }}" alt="Company Logo" width="70px"></a>

            <!-- Buttons on the right -->
            <div>
                <a href="{{ route('adminDashboard') }}" class="btn btn-primary mx-2">Admin Panel</a>
                <form action="{{route('logout')}}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    
      
    <div class="container d-flex justify-content-center mt-5">
        <div class="card p-4">
            <h2 class="mb-4">Update Product</h2>
            <form action="{{route('product.update',[$product->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="product_name" value="{{$product->product_name}}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category"required >
                        <option value="Laptop" {{ $product->category === 'Laptop' ? 'selected' : '' }}>Laptop</option>
                        <option value="Phone" {{ $product->category === 'Phone' ? 'selected' : '' }}>Phone</option>
                        <option value="Tablet" {{ $product->category === 'Tablet' ? 'selected' : '' }}>Tablet</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="qtc" value="{{$product->qtc}}">
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="productImage" name="product_IMG">
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
