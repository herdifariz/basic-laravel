@extends("layouts.app")

@section("title", "Edit Post")

@section("content")
<div class="container">
  <h1>Edit Post</h1>
  <form action="{{url("/posts/$post->id")}}" method="POST" class="form-control">
    @method("PATCH")
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title}}">
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">Konten</label>
      <textarea class="form-control" id="content" rows="3" name="content">{{ $post->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
  <form action="{{url("/posts/$post->id")}}" method="POST" class="form-control">
    @method("DELETE")
    @csrf
    <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</div>
@endsection