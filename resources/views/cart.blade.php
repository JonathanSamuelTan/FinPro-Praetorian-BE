<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Mexico | Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #141E46">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Company Logo on the left -->
            <a class="navbar-brand" href=""><img src="{{ asset('storage/Assets/logo.png') }}" alt="Company Logo" width="70px"></a>

            <!-- Buttons on the right -->
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-primary mx-2">Product Catalogue</a>
                <form action="{{route('logout')}}" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>
       
    <div class="container mt-5">
        <h2>Shopping Cart</h2>
        @if (count($cartItems) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->product_name }}</td>
                            <td>Rp. {{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{route('cart.update',[$item->id])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="qtc" value="{{ $item->qtc }}" min="1">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>Rp. {{ number_format($item->product->price * $item->qtc, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{route('cart.delete',[$item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-end">
                <a href="{{route('transaction.show')}}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

