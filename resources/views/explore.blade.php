@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row pageheader">
    <h1>Explore All Trips</h1>
  </div>

  @if(session('alert'))
  {{ session('alert') }}
  @endif

  @if(isset($incompletebooking))
  <div class="last-action">
    <h6>Did you forget something? Get traveling on <a href="/booking/details">{{ $incompletebooking->tour->name }} {{ $incompletebooking->tour_date }}</a></h6>
  </div>

  @elseif(isset($recentlyquotedtrip))
  <div class="last-action">
    <h6>Learn more about <a href="/trips/{{ $recentlyquotedtrip->tour->region }}/{{ $recentlyquotedtrip->tour->url_path }}">{{ $recentlyquotedtrip->tour->name }}</a></h6>
  </div>
  @endif

  <div class="row">
    @foreach ($returnedtrips as $trip)
    <div class="col-md-6 col-6">
      <div class="trip-tile">
        <a href="/trips/{{ $trip->region }}/{{ $trip->url_path }}"> <img class="img-fluid" src="/images/{{ $trip->tile_image }}" alt="{{ $trip->img_alt }}"> </a>
        <h5>{{ $trip->name }}</h5>
      </div>
    </div>
    @endforeach
  </div>
</div>

@push('javascript')

@endpush

@endsection
