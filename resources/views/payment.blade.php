@extends('layouts.booking.master')

<div class="col-md-5">
<h2>Step 2: Payment Details</h2>

<h3>Purchase Details</h3>
<p>{{ session('departuredate') }} </p>
<p>{{ session('price') }} </p>

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
