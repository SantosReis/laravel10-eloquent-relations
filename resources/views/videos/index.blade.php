<div class="container">
  <div class="row justify-content-center">
    <div class="col-mb-8">
      @foreach ($videos as $video)
        <h2>{{ $video->country }}</h2>
        <p>{{ $video->user?->name }}</p>
      @endforeach
    </div>
  </div>
</div>