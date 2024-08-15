@extends("layouts.app")

@section("title", "Welcome to Blog")

@section("content")
<div class="container">
  <h1>Halaman Blog
    <a href="{{ url("/posts/create")}}" class="btn btn-success">New</a>
  </h1>
  @foreach ($posts as $post)
    <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text">{{ $post->content }}</p>
      <p class="card-text"><small class="text-body-secondary">Last updated at
        {{ date("d M Y H:i", strtotime($post->created_at)) }}</small></p>
      <a href="{{url("/posts/$post->id")}}" class="btn btn-primary">Selengkapnya</a>
      <a href="{{url("/posts/$post->id/edit")}}" class="btn btn-warning">Edit</a>
      <form action="{{url("/posts/$post->id")}}" method="POST">
      @method("DELETE")
      @csrf
      <button type="submit" class="btn btn-danger">Hapus</button>
      </form>
    </div>
    </div>
  @endforeach
</div>
@endsection