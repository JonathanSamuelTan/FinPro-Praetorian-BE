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
       
   <form action="#" method="POST">
        @csrf
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <h1>Invoice No:</h1>
                    <input id="InvoiceNo" type="text" class="form-control" name="InvoiceNo" value="{{$invoiceNO}}" readonly>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h2 class="mb-3">Tujuan Pengiriman</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p>{{ Auth::user()->name }}</p>
                            <p class="no-telp">{{ Auth::user()->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <input id="alamat" type="text" class="form-control mb-2" placeholder="Input Shipment Address" name="address" minlength="10" maxlength="100" required>
                            <input id="ZIP" type="text" class="form-control" placeholder="Input ZIP Code" name="ZIPCode" maxlength="5" minlength="5" pattern="[0-9]{5}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h2 class="mb-3">Produk Dipesan</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp 
                            @foreach ($carts as $c)
                                <tr>
                                    <td> 
                                        <img src="{{asset('storage/ProductIMG/'. $c->product->product_IMG)}}" alt="Product Image" class="img-fluid"  style="max-width: 50px; max-height: 50px;">
                                    </td>
                                    <td>{{$c->product->product_name}}</td>
                                    <td>Rp.{{number_format($c->product->price, 0, ',', '.')}}</td>
                                    <td>{{$c->qtc}}</td>
                                    <td>Rp{{number_format($c->product->price * $c->qtc, 0, ',', '.')}}</td>
                                </tr>
                                @php
                                    $totalPrice += $c->product->price * $c->qtc; 
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="end mt-4 text-end">
                        <h2 id="price">Rp.{{number_format($totalPrice, 0, ',', '.')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-end">
                    <button class="btn btn-primary" type="submit">Print Invoice</button>
                </div>
            </div>
        </div>
    </form>
    <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

