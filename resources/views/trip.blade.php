@extends('layouts.master')

@push('custom_css')
<link rel="stylesheet" href={{ URL::asset("css/itinerary.css") }} >
@endpush

@push('breadcrumb')
@if (isset($tour))
<a class="nav-link" href="/trips/{{ $tour->region_url }}">{{ $tour->region }}</a>
<a class="nav-link" href="/trips/{{ $tour->region_url }}/{{ $tour->url_path }}">{{ $tour->name }}</a>
@endif
@endpush

@section('content')
<div class="container">
  <div class="row pageheader">
    <h1> {{ $tour['name'] }}</h1>
  </div>
  <div class='row'>
    <p>{{ $tour['descr'] }}</p>
  </div>
  <div class='row'>
    <div class="col-md-8">
      <img class="hero" src="/images/{{ $tour->tile_image }}" alt="{{ $tour->img_alt }}">
    </div>
    <div class="col-md-2">
      <h5>When can you travel?</h5>
      <form method="POST" action="/booking">
        {{ csrf_field() }}

        <div class="form-group">
          <input name="tourid" type="hidden" value="{{ $tour['id'] }}">
          @foreach ($departures as $departure)
          <div class="radio">
            <label><input class="departure" type="radio" name="departureid" value="{{ $departure['id'] }}" required>{{ $departure['tour_date'] }}</label>
          </div>
          @endforeach
        </div>
        <button type="submit" name='submit' class="btn btn-success">Book Now</button>
      </form>
    </div>
    <div class="col-md-2">
    @foreach ($departures as $departure)
    ${{ $departure['price'] }} with flights
    @endforeach
  </div>

</div>
<div class="row">
  <h4>You might also like:</h4>
</div>
<div class="row">
  <ul>
    @foreach ($tags as $tag)
    <li>{{ $tag['name'] }}</li>
    @endforeach
  </ul>
</div>
</div>

@push('javascript')

@endpush

@endsection
