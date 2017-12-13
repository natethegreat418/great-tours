@extends('layouts.booking.master')

@push('breadcrumb')
<li class="nav-item"><a class="nav-link" href="{{ URL::previous() }}">Details ></a></li>
<li class="nav-item"><a class="nav-link" href="">Payment ></a></li>
<li class="nav-item"><a class="nav-link disabled" href="">Confirmed ></a></li>
@endpush

@section('content')

<div class="container">
<div class="row">
<h2>Step 2: Payment Details</h2>
</div>

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
  <p>Total cost: {{ session('price') }} </p>
</div>
<div class="row">
  <form method="POST" action="/booking/payment">
    {{ csrf_field() }}

    <div class="form-group">
      <label>Full Name on Card</label>
      <input type="text" name="cardname" pattern=".{3,}" title="Please enter a minimum of 3 characters" class="form-control" value='' required>
    </div>
    <div class="form-group">
      <label>Credit Card Number</label>
      <input type="text" name="cardnumber" class="form-control" value='' required>
    </div>
    <div class="form-group">
      <label>Payment ZipCode</label>
      <input type="text" name="paymentzip" pattern=".{5,}" title="Please enter a valid 5 digit ZipCode" class="form-control" value='' required>
    </div>
    <input name="bookingid" type="hidden" value="{{ session('incompletebookingid') }}">
    <button type="submit" name='submit' class="btn btn-success">Confirm and Get Traveling!</button>
  </form>
</div>
</div>
</div>

@endsection
