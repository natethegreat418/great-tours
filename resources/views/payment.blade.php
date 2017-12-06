@extends('layouts.booking.master')

<div class="col-md-5">
<h1>Step 2: Provide your payment details</h1>
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
    <button type="submit" name='submit' class="btn btn-success">Confirm and Get Traveling!</button>
  </form>
</div>
