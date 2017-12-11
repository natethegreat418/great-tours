@extends('layouts.booking.master')

@push('breadcrumb')
  <a class="nav-link" href="">Details /</a>
  <a class="nav-link disabled" href="">Payment /</a>
  <a class="nav-link disabled" href="">Confirmed </a>
@endpush

@section('content')

<div class="col-md-5">
  <h2>Step 1: Traveler Details</h2>

  @if(session('alert'))
    {{ session('alert') }}
  @endif

  <form method="POST" action="/booking/details">
    {{ csrf_field() }}

    <div class="form-group">
      <label>Email address (to send you pre-departure information)</label>
      <input type="email" name="email" class="form-control" value='{{ session('email') }}' required>
    </div>
    <div class="form-group">
      <label>Traveler First name as indicated on passport</label>
      <input type="text" name="firstname" pattern=".{2,}" title="Please enter a minimum of 2 characters" class="form-control" value='{{ session('firstname') }}' required>
    </div>
    <div class="form-group">
      <label> Traveler Last name as indicated on passport</label>
      <input type="text" name="lastname" pattern=".{2,}" title="Please enter a minimum of 2 characters" class="form-control" value='{{ session('lastname') }}' required>
    </div>
    <div class="form-group">
      <label>Traveler sex as indicated on passport</label>
      <div class="radio">
        <label><input type="radio" name="sex" value="Male" required>Male</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="sex" value="Female" required>Female</label>
      </div>
    </div>
    <button type="submit" name='submit' class="btn btn-success">Advance to payment</button>
  </form>
</div>

@endsection
