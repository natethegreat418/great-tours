@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <h1>Welcome to Great Tours</h1>
  </div>
  <div class="row">
      @foreach ($returnedtrips as $trip)
      <div class="col-sm trip-tile">
        <a href="/trips/{{ $trip->region }}/{{ $trip->name }}"> <img class="trip-img" src="/images/{{ $trip->tile_image }}"> </a>
        <h5>{{ $trip->name }}</h5>
        @foreach ($trip->tags as $tag)
          <h6>{{ $tag->name }}</h6>
        @endforeach
      </div>
      @endforeach
  </div>
</div>


@push('javascript')

@endpush

@endsection
