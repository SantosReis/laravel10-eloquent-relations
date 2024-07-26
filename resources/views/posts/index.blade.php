<div class="container">
  <div class="row justify-content-center">
    <div class="col-mb-8">
      @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->user?->name }}</p>
      @endforeach
    </div>
  </div>
</div>