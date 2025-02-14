<header class="p-3 text-bg-dark mb-3">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"></a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ url("posts") }}" class="nav-link px-2 text-white">Home</a></li>
      </ul>

      <div class="text-end">
        @if (Auth::check())
      <a href="{{ url("logout") }}" type="button" class="btn btn-outline-light me-2">Logout</a>
    @else
    <a href="{{ url("register") }}" type="button" class="btn btn-outline-light me-2">Register</a>
    <a href="{{ url("login") }}" type="button" class="btn btn-outline-light me-2">Login</a>
  @endif
        {{--<button type="button" class="btn btn-warning">Sign-up</button>--}}
      </div>
    </div>
  </div>
</header>