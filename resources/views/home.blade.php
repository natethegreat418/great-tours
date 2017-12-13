@extends('layouts.master')

@push('custom_css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css"/>
@endpush

@section('content')
<div class="container">
  <div class="row pageheader">
    <h1>Welcome to Great Tours</h1>
  </div>

  @if(isset($incompletebooking))
  <div class="last-action">
    <h6>Did you forget something? Get traveling on <a href="/booking/details">{{ $incompletebooking->tour->name }} {{ $incompletebooking->tour_date }}</a></h6>
    <h6>Or forget this <a href="/booking/forget">pending reservation</a>
  </div>
  @elseif(isset($recentlyquotedtrip))
  <div class="last-action">
    <h6>You recently quoted <a href="/trips/{{ $recentlyquotedtrip->tour->region }}/{{ $recentlyquotedtrip->tour->url_path }}">{{ $recentlyquotedtrip->tour->name }}</a></h6>
  </div>
  @endif

  @foreach ($displaytours as $group)
    <div class="row">
      <h4> {{ $group->name }} Trips</h4>
    </div>
      <div class="row collection">
        <div class="owl-carousel owl-theme">
              @foreach ($group->tours as $tour)
              <div class="trip">
                <a class="tripimg" href="/trips/{{ $tour->region }}/{{ $tour->url_path }}"> <img class="carousel-img" src="/images/{{ $tour->tile_image }}" alt="{{ $tour->img_alt }}"></a>
                <h5>{{ $tour->name }}</h5>
              </div>
              @endforeach
        </div>
      </div>
  @endforeach
</div>

  @push('javascript')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop: true,
        lazyLoad: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      });
    });
</script>

@endpush

@endsection
