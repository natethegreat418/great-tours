@extends('layouts.master')

@push('custom_css')
  <link rel="stylesheet" href={{ URL::asset("css/homepage.css") }} >
@endpush

@push('breadcrumb')
  @if (isset($region))
    <li class="nav-item"><a class="nav-link" href="/trips/{{ $region }}">{{ $region }} ></a></li>
  @endif
  @if (isset($trip))
    <li class="nav-item"><a class="nav-link" href="/trips/{{ $region }}/{{ $trip }}">{{ $trip }}<a/></li>
  @endif
@endpush

@section('content')
<div class="container">
<div class="row">
<h1> Trips to {{ $region }}</h1>
</div>
  <div class="row">
    @foreach ($returnedtrips as $trip)
    <div class="col-sm trip-tile">
      <a href="/trips/{{ $trip->region }}/{{ $trip->name }}"> <img class="trip-img" src="/images/{{ $trip->tile_image }}"> </a></li>
      <h5>{{ $trip->name }}</h5>
    </div>
    @endforeach
</div>
</div>

@endsection
