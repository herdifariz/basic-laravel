@extends("layouts.app")

@section("title", "Login")

@section("content")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center">Login</h1>
          {{-- return redirect --}}
          @if (session()->has("error_message"))
        <div class="alert alert-danger">{{ session()->get("error_message")}}</div>
      @endif
          {{-- return back --}}
          {{--@if ($errors->any())
          <div class="alert alert-danger">
            {{$errors->first()}}
          </div>
          @endif--}}
          <form action="{{ url("login")}}" method="post" class="form-control">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old("email") }}">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Log In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection