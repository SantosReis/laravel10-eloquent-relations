<div class="container">
  <div class="row justify-content-center">
    <div class="col-mb-8">
      @foreach ($tags as $tag)
        <h2>{{ $tag->name }}</h2>
      @endforeach
    </div>
  </div>
</div>