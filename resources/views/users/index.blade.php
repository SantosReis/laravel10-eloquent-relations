<div class="container">
  <div class="row justify-content-center">
    <div class="col-mb-8">
      @foreach ($users as $user)
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->address?->country }}</p>
      @endforeach
    </div>
  </div>
</div>