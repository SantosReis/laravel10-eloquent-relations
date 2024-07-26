<div class="container">
  <div class="row justify-content-center">
    <div class="col-mb-8">
      @foreach ($addresses as $address)
        <h2>{{ $address->country }}</h2>
        <p>{{ $address->user?->name }}</p>
      @endforeach
    </div>
  </div>
</div>