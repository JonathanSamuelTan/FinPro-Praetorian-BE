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
            <a href="#" class="btn btn-primary mx-2">Login</a>
            <a href="#" class="btn btn-secondary">Register</a>
        </div>
        @elseif (Auth::user()->role == 'user')
            <a href="#" class="btn btn-primary mx-2">Transaction Page</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @elseif(Auth::user()->role == 'admin')
            <a href="#" class="btn btn-primary mx-2">Admin Panel</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
        @endif
    </div>
</nav>