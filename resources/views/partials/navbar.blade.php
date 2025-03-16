<nav class="navbar border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="{{ route('home') }}">BOOKING.PS</a>
        <span class="right-navbar d-flex flex-row justify-content-evenly">
            @if(Auth::check())
            <div class="dropdown">
                <a href="" data-bs-toggle="dropdown" class="dropdown-toggle link-underline link-underline-opacity-0 border p-2 rounded-pill border-light" style="color: white;" aria-expanded="false">
                    <img src="{{ Auth::user()->profile_picture == null ? 'https://www.drupal.org/files/profile_default.png' : asset('uploads/profile_pictures/' . Auth::user()->profile_picture) }}" class="object-fit-cover profile_picture" alt="Profile Picture" width="30" height="30">
                </a>
                <ul class="dropdown-menu font-smaller">
                    <li><a class="dropdown-item" href="{{ route('booking') }}">My Booking</a></li>
                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
            @else
                <a class="btn btn-light btn-sm me-2" href="{{ route('login') }}" role="button">Masuk</a>
                <a class="btn btn-light btn-sm" href="{{ route('register') }}" role="button">Daftar</a>
            @endif
        </span>
    </div>
</nav>