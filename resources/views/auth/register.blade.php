@extends("layouts.app")

@section("title", "Register")

@section("content")
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center">Register</h1>
          <form action="{{ url("register")}}" method="post" class="form-control">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
              @if ($errors->has("name"))
          <span class="text-danger">{{$errors->first("name")}}</span>
        @endif
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
              @if ($errors->has("email"))
          <span class="text-danger">{{$errors->first("email")}}</span>
        @endif
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              @if ($errors->has("password"))
          <span class="text-danger">{{$errors->first("password")}}</span>
        @endif
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection