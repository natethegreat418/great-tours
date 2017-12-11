@extends('layouts.master')

@push('custom_css')
  <link rel="stylesheet" href={{ URL::asset("css/homepage.css") }} >
@endpush

@push('breadcrumb')
  @if (isset($region))
    <a class="nav-link" href="/trips/{{ $region }}">{{ $region }} /</a>
  @endif
  @if (isset($trip))
    <a class="nav-link" href="/trips/{{ $region }}/{{ $trip }}">{{ $trip }}<a/>
  @endif
@endpush

@section('content')
<div class="container">
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
              @foreach ($departures as $departure)
                <div class="radio">
                  <label><input class="departure" type="radio" name="departureid" value="{{ $departure['id'] }}" required>{{ $departure['tour_date'] }}</label>
                </div>
              @endforeach
        </div>
        <button type="submit" name='submit' class="btn btn-success">Book Now</button>
      </form>
    </div>
</div>

@push('javascript')
  <script>
    $(document).ready(function() {
      $(".departure").click(function(){
        console.log({{ $departure['price'] }})
      });
    });
  </script>
@endpush

@endsection
