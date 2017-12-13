@extends('layouts.master')

@push('breadcrumb')
  @if (isset($region))
    <a class="nav-link" href="/trips/{{ $region }}">{{ $region }} </a>
  @endif
@endpush

@section('content')
<div class="container">
<div class="row">
<h1> Trips to {{ $region }}</h1>
</div>
  <div class="row">
    @foreach ($returnedtrips as $trip)
    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3">
    <div class="trip-tile">
      <a href="/trips/{{ $trip->region }}/{{ $trip->url_path }}"> <img class="img-fluid" src="/images/{{ $trip->tile_image }}"> </a></li>
      <h5>{{ $trip->name }}</h5>
    </div>
  </div>
    @endforeach
</div>
</div>

@endsection
