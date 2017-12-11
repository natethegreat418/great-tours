@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <h1>Welcome to Great Tours</h1>
  </div>

  @if(isset($incompletebooking))
    <div class="last-action">
      <h6>Did you forget something? Get traveling on <a href="/booking/details">{{ $incompletebooking->tour->name }} {{ $incompletebooking->tour_date }}</a></h6>
    </div>
  @elseif(isset($recentlyquotedtrip))
    <div class="last-action">
      <h6>Learn more about <a href="/trips/{{ $recentlyquotedtrip->tour->region }}/{{ $recentlyquotedtrip->tour->name }}">{{ $recentlyquotedtrip->tour->name }}</a></h6>
    </div>
  @endif

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
