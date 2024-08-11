<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('bootstrap-5/css/bootstrap.min.css')}}" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js')}}"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <title>Blog | {{ $post[1] }}</title>
</head>

<body>
  <div class="container">
    <article class="blog-post">
      <h2 class="display-5 link-body-emphasis mb-1"> {{ $post[1] }} </h2>
      <p class="blog-post-meta">{{ date("d M Y H:i", strtotime($post[3])) }} by <a href="#">User</a></p>
      <p>{{ $post[2] }}</p>
    </article>
    <a href="{{ url("/posts")}}">Kembali</a>
  </div>
</body>

</html>