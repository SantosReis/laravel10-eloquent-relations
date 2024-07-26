<div class="container">
  <div class="row justify-content-center">
    <div class="col-mb-8">
      @foreach ($tags as $tag)
        <h2>{{ $tag->name }}</h2>
        <ul>
          @foreach ($tag->posts as $post)
            <li>{{ $post->title }}</li>
          @endforeach
        </ul>
      @endforeach
    </div>
  </div>
</div>