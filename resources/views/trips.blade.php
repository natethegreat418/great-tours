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
    @if(isset($tour))
    <div class="row">
      <h1> {{ $tour['name'] }}</h1>
    </div>
    <div class='row'>
      <p>{{ $tour['descr'] }}
    </div>
    <div class='row'>
      <form method="POST" action="/booking">
        {{ csrf_field() }}

        <div class="form-group">
            <label>When can you travel?</label>
            <input name="tourid" type="hidden" value="{{ $tour['id'] }}">
            <select size="{{ $numberdepartures }}" class="form-control" name="departureid" required>
              @foreach ($departures as $departure)
                <option value="{{ $departure['id'] }}">{{ $departure['tour_date'] }}</option>
              @endforeach
            </select>
        </div>
      <button type="submit" name='submit' class="btn btn-success">Book Now</button>
      </form>
    </div>

    @else
    <div class="row">
    <h1> Trips to {{ $region }}</h1>
  </div>
      <div class="row">
        <ul>
          @foreach ($returnedtrips as $trip)
          <li class="trip-item"><a href="/trips/{{ $trip->region }}/{{ $trip->name }}"> <img class="trip-img" src="{{ $trip->tile_image }}"> </a></li>
          @endforeach
        </ul>
    </div>
    @endif
</div>

@push('javascript')

@endpush

@endsection
