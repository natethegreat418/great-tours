@extends('layouts.master')

@push('breadcrumb')
  @if (isset($region))
    <a class="nav-link" href="/trips/{{ $region_url }}">{{ $region }} </a>
  @endif
@endpush

@section('content')
<div class="container">
  <div class="row pageheader">
    <h1> Trips to {{ $region }}</h1>
  </div>
  <div class="row">
    @foreach ($returnedtrips as $trip)
    <div class="col-md-6 col-6">
      <div class="trip-tile">
        <a href="/trips/{{ $trip->region_url }}/{{ $trip->url_path }}"> <img class="img-fluid" src="/images/{{ $trip->tile_image }}" alt="{{ $trip->img_alt }}"> </a>
        <h5>{{ $trip->name }}</h5>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
