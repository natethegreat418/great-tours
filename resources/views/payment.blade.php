@extends('layouts.booking.master')

@push('breadcrumb')
<a class="nav-link booking-nav-done" href="/booking/details">Details</a>
<a class="nav-link booking-nav-current" href="">Payment</a>
<a class="nav-link disabled" href="">Confirmed</a>
@endpush

@section('content')

<div class="container">
  <div class="row pageheader">
    <h2>Step 2: Payment Details</h2>
  </div>

  @if(session('alert'))
  <div class="alert">
    {{ session('alert') }}
  </div>
  @endif

  <div class="row">
    <h3>Purchase Summary</h3>
  </div>
  <div class="row">
    <p>You are reserving a spot on {{ session('tourname') }}</p>
  </div>
  <div class="row">
    <p>Departing on {{ session('departuredate') }} </p>
  </div>
  <div class="row">
    <p>Total cost: $ {{ session('price') }} </p>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class='card-wrapper'></div>
    </div>
    <div class="row col-md-4">
      <form method="POST" action="/booking/payment">
        {{ csrf_field() }}

        <div class="form-group">
          <label>Credit Card Number</label>
          <input type="text" name="number" pattern=".{19,}" title="Please enter a valid card number" class="form-control" value='' required>
        </div>
        <div class="form-group">
          <label>Full Name on Card</label>
          <input type="text" name="name" pattern=".{3,}" title="Please enter a minimum of 3 characters" class="form-control" value='' required>
        </div>
        <div class="form-group">
          <label>Card Expiration Date</label>
          <input type="month" name="expiry" class="form-control" value='' required>
        </div>
        <input name="bookingid" type="hidden" value="{{ session('incompletebookingid') }}">
        <button type="submit" name='submit' class="btn btn-success">Confirm and Get Traveling!</button>
      </form>
    </div>
  </div>
</div>

@endsection

@push('javascript')
<script type="text/javascript" src={{ URL::asset('js/jquery.card.js') }}></script>
<script>
$(document).ready(function() {
  $('form').card({
    container: '.card-wrapper',
  });
});
</script>
@endpush
